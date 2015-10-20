<?php
/**
 * Title: Core Initializer
 *
 * Description: Initializes the core. Adds all required files.
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category Cyber Chimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

if ( ! function_exists( 'cyberchimps_core_setup_theme' ) ):

require_once( dirname( __FILE__ ) . '/inc/api-class.php' );
require_once( dirname( __FILE__ ) . '/inc/upgrader-class.php' );

// Setup the theme
function cyberchimps_core_setup_theme() {

	// Set directory path
	$directory	 = get_template_directory();

	// Load core functions file
	require_once( $directory . '/cyberchimps/functions.php' );
	
	// Load core hooks file
	require_once( $directory . '/cyberchimps/inc/hooks.php' );
	
	// Load element files before meta and options
	require_once( $directory . '/elements/init.php' );
	
	// Load santize before options-init and options core
	require_once ( $directory . '/cyberchimps/options/options-sanitize.php' );
	
	// Load core options file
	require_once( $directory . '/cyberchimps/options/options-init.php' );

	// Load default core settings
	require_once( $directory . '/cyberchimps/options/options-core.php' );
	
	// Load Meta Box Class
	require_once( $directory . '/cyberchimps/inc/meta-box-class.php' );
	
	// Load Meta Boxes Functions
	require_once( $directory . '/cyberchimps/inc/meta-box.php' );
	
	// Load core hooks file
	require_once( $directory . '/cyberchimps/inc/cc-custom-background.php' );
	
	//Load features
	require_once( $directory . '/elements/setup/features.php' );

	// Core Translations can be filed in the /inc/languages/ directory
	load_theme_textdomain( 'cyberchimps', $directory . '/inc/languages' );
	
	// Add support for the Aside Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );
	
	// add theme support for backgrounds
	$defaults = array(
	'default-color'		=> apply_filters( 'default_background_color', '' ),
	'wp-head-callback'  => 'cyberchimps_custom_background_cb'
);
	add_theme_support( 'custom-background', $defaults );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cyberchimps' ),
	) );
	
	//set up defaults
	$option_defaults = cyberchimps_get_default_values();
	if( ! get_option( 'cyberchimps_options' ) && isset( $_GET['activated'] ) ) {
		update_option( 'cyberchimps_options', $option_defaults );
	}
	//if not then theme switch reset modal to true so that new values can be saved in the database
	elseif( get_option( 'cyberchimps_options' ) && isset( $_GET['activated'] ) ) {
		$options = get_option( 'cyberchimps_options' );
		$options['cyberchimps_skin_color'] = 'default';
		$options['header_section_order'] = $option_defaults['header_section_order'];
		$options['theme_backgrounds'] = $option_defaults['theme_backgrounds'];
		$options['modal_welcome_note_display'] = true;
		update_option( 'cyberchimps_options', $options );
	}
}
endif; // cyberchimps_core_setup_theme
add_action( 'after_setup_theme', 'cyberchimps_core_setup_theme' );

function cyberchimps_custom_background_cb() {
	// $background is the saved custom image, or the default image.
	$background = get_background_image();

	// $color is the saved custom color.
	// A default has to be specified in style.css. It will not be printed here.
	$color = get_theme_mod( 'background_color' );
	
	// CyberChimps background image
	$cc_background = get_theme_mod( 'cyberchimps_background' );

	if ( ! $background && ! $color && ! $cc_background )
		return;

	$style = $color ? "background-color: #$color;" : '';

	if ( $background ) {
		$image = " background-image: url('$background');";

		$repeat = get_theme_mod( 'background_repeat', 'repeat' );
		if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
			$repeat = 'repeat';
		$repeat = " background-repeat: $repeat;";

		$position = get_theme_mod( 'background_position_x', 'left' );
		if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
			$position = 'left';
		$position = " background-position: top $position;";

		$attachment = get_theme_mod( 'background_attachment', 'scroll' );
		if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
			$attachment = 'scroll';
		$attachment = " background-attachment: $attachment;";

		$style .= $image . $repeat . $position . $attachment;
	}
	if ( ! $background && ! $color && $cc_background != 'none' ) {
		$img_url = get_template_directory_uri().'/cyberchimps/lib/images/backgrounds/'.$cc_background.'.jpg';
		$image = "background-image: url( '$img_url' );";
		$style .= $image; ?>
		<style type="text/css">
			body { <?php echo trim( $style ); ?> }
		</style>
<?php
	}
	else {
?>
<style type="text/css" id="custom-background-css">
	body.custom-background { <?php echo trim( $style ); ?> }
</style>
<?php
	}
	}

// Register our sidebars and widgetized areas.
function cyberchimps_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar Left', 'cyberchimps' ),
		'id' => 'sidebar-left',
		'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	
	register_sidebar( array(
		'name' => __( 'Sidebar Right', 'cyberchimps' ),
		'id' => 'sidebar-right',
		'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	
	register_sidebar( array(
		'name' => __( 'Footer Widgets', 'cyberchimps' ),
		'id' => 'cyberchimps-footer-widgets',
		'before_widget' => '<aside id="%1$s" class="widget-container span3 %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'cyberchimps_widgets_init' );

function cyberchimps_load_hooks() {

	// Set the path to hooks directory.
	$hooks_path = get_template_directory() . "/cyberchimps/hooks/";
	
	require_once( $hooks_path . 'wp-head-hooks.php' );
	require_once( $hooks_path . 'header-hooks.php' );
	require_once( $hooks_path . 'blog-hooks.php' );
	require_once( $hooks_path . 'page-hooks.php' );
	require_once( $hooks_path . 'footer-hooks.php' );
}
add_action('after_setup_theme', 'cyberchimps_load_hooks');

//after install redirect user to options page
if ( is_admin() && isset($_GET['activated'] ) && $pagenow =="themes.php" ) {
	wp_redirect( 'themes.php?page=cyberchimps-theme-options' );	
}