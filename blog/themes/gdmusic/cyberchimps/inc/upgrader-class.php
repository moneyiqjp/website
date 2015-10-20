<?php

/**
 * Copyright 2013 Go Daddy Operating Company, LLC. All Rights Reserved.
 */

// Make sure it's wordpress
if ( !defined( 'ABSPATH' ) )
	die( 'Forbidden' );

$_chimps_upgrade_url = 'https://wpqs.secureserver.net/v1/';
$_chimps_api = new Chimps_API( $_chimps_upgrade_url );
$_chimps_upgrader = new Chimps_Upgrader();
$_chimps_upgrader->set_api( $_chimps_api );

/**
 * Upgrade plugins from a third party system
 */
class Chimps_Upgrader {

	/**
	 * Plugin data, fetched from an external API
	 * @var mixed
	 */
	protected $_api_data = null;

	/**
	 * Class Constructor
	 */
	public function __construct() {

		// Add hooks
		add_filter( 'pre_set_site_transient_update_themes', array( $this, 'api_check' ) );
	}
	
	/**
	 * Initialize, fetch current plugin data and new plugin data
	 * @return void
	 */
	public function init() {
		$this->_api_data = $this->get_api_data();
	}

	/**
	 * Set the API communicator
	 * @param Chimps_API $api
	 */
	public function set_api( $api ) {
		$this->_api = $api;
	}

	/**
	 * Get latest plugin data from API
	 * Cached in a transient for 6 hours
	 * @return mixed
	 */
	protected function get_api_data() {
		$api_data = get_site_transient( 'cyberchimps_theme_update_api_data' );
		if ( empty( $api_data ) ) {
			foreach ( wp_get_themes() as $theme ) {
				$response = $this->_api->get_update( $theme->get_stylesheet() );
				if ( is_wp_error( $response ) ) {
					$api_data[$theme->get_stylesheet()] = array();
				} else {
					$api_data[$theme->get_stylesheet()] = json_decode( $response['body'], true );
				}
			}
			set_site_transient( 'cyberchimps_theme_update_api_data', $api_data, 60 * 60 * 6 );
		}
		return $api_data;
	}
	
	/**
	 * Hook into the plugin update check
	 * @param mixed $transient
	 * @return mixed
	 */
	public function api_check( $transient ) {
		if ( !isset( $this->_api_data ) ) {
			$this->init();
		}
		foreach ( (array) $this->_api_data as $k => $v ) {
			if ( isset( $this->_api_data[$k] ) && isset( $this->_api_data[$k]['new_version'] ) && 1 === version_compare( $this->_api_data[$k]['new_version'], wp_get_theme( $k )->get('Version') ) ) {
				$transient->response[ $k ] = $v;
			}
		}
		return $transient;
	}
}
