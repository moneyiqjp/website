<?php

/**
 * Copyright 2013 Go Daddy Operating Company, LLC. All Rights Reserved.
 */

// Make sure it's wordpress
if ( !defined( 'ABSPATH' ) )
	die( 'Forbidden' );

/**
 * Talk to the API ... see what features, site types, etc. are available
 */
class Chimps_API {
	
	/**
	 * API URL
	 * @var string
	 */
	protected $api_url = '';
	
	/**
	 * Constructor
	 * @param string $url
	 */
	public function __construct( $url = '' ) {
		$this->api_url = $url;
	}

	/**
	 * Check for an update to this plugin
	 * @param string $version
	 * @return array|WP_Error
	 */
	public function get_update( $theme ) {
		return $this->make_call( 'updates/theme/' . $theme );
	}

	/**
	 * Get the arguments to pass into wp_remote_get or wp_remote_post
	 * @global string $wp_version
	 * @global mixed $wpdb
	 * @return array
	 */
	protected function get_args() {
		global $wp_version, $wpdb;
		$skin = '';
		$key = '';
		if ( function_exists( 'cyberchimps_get_option' ) ) {
			$skin = cyberchimps_get_option( 'cyberchimps_skin_color', '' );
			$admin = cyberchimps_get_option( 'admin', array() );
			if ( isset( $admin['key'] ) ) {
				$key = $admin['key'];
			}
		}
		return array(
			'headers'   => array(
				'X-Plugin-Api-Key'        => $key,
				'X-Plugin-Theme'          => wp_get_theme()->get_stylesheet(),
				'X-Plugin-Theme-Version'  => wp_get_theme()->get( 'Version' ),
				'X-Plugin-Theme-Skin'     => $skin,
				'X-Plugin-URL'            => get_home_url(),
				'X-Plugin-WP-Version'     => $wp_version,
				'X-Plugin-MySQL-Version'  => $wpdb->db_version(),
				'X-Plugin-PHP-Version'    => PHP_VERSION,
				'X-Plugin-Locale'         => get_locale(),
				'X-Plugin-WP-Lang'        => ( defined( 'WP_LANG' ) ? WP_LANG : 'en_US' ),
			)
		);
	}

	/**
	 * Talk to the API endpoint
	 * @global string$this->api_url
	 * @param string $method
	 * @param array $args
	 * @param string $verb
	 * @return array|WP_Error
	 */
	protected function make_call( $method, $args = array(), $verb = 'GET' ) {
		$max_retries = 1;
		$retries     = 0;
		if ( !in_array( $verb, array( 'GET', 'POST' ) ) ) {
			return new WP_Error( 'cyberchimps_api_bad_verb', sprintf( __( 'Unknown verb: %s. Try GET or POST', 'cyberchimps' ), $verb ) );
		}
		while ( $retries <= $max_retries ) {
			$retries++;
			if ( 'GET' === $verb ) {
				$url = $this->api_url . $method;
				if ( !empty( $args ) ) {
					$url .= '?' . build_query( $args );
				}
				add_filter( 'https_ssl_verify', '__return_false' );
				$result = wp_remote_get( $url, $this->get_args() );
				remove_filter( 'https_ssl_verify', '__return_false' );
			} elseif ( 'POST' === $verb ) {
				$_args = $this->get_args();
				$_args['body'] = $args;
				add_filter( 'https_ssl_verify', '__return_false' );
				$result = wp_remote_post( $this->api_url . $method, $_args );
				remove_filter( 'https_ssl_verify', '__return_false' );
			}
			if ( is_wp_error( $result ) ) {
				break;
			} elseif ( self::_is_retryable_error( $result ) ) {	
				
				// The service is in a known maintenance condition, give a sec to recover
				sleep( apply_filters( 'cyberchimps_api_retry_delay', 1 ) );
				continue;
			} else {
				break;
			}
		}
		
		if ( !is_wp_error( $result ) && '200' != $result['response']['code'] ) {
			return new WP_Error( 'cyberchimps_api_bad_status', sprintf( __( 'API returned bad status: %d: %s', 'cyberchimps' ), $result['response']['code'], $result['response']['message'] ) );
		}

		return $result;
	}
	
	/**
	 * Check if the result of a wp_remote_* call is an error and should be retried
	 * @param array $result
	 * @return bool
	 */
	protected static function _is_retryable_error( $result ) {
		if ( is_wp_error( $result ) ) {
			return false;
		}
		if ( !isset( $result['response'] ) || !isset( $result['response']['code'] ) || 503 != $result['response']['code'] ) {
			return false;
		}
		$json = json_decode( $result['body'], true );
		if ( isset( $json['status'] ) && 503 == $json['status'] && isset( $json['type'] ) && 'error' == $json['type'] && isset( $json['code'] ) && 'RetryRequest' == $json['code'] ) {
			return true;
		}
		return false;
	}
}
