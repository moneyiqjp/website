<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 12/13/2015
 * Time: 11:23 AM
 */

function register_menus() {
    register_nav_menus(
        array(
            'navbar-links' => 'NavBar'
        ));
}

add_action( 'init', 'register_menus' );

add_theme_support( 'post-thumbnails' );
add_image_size( 'post-preview', 370, 222 );
add_image_size( 'post-feature-small', 800, 480 );
add_image_size( 'post-feature', 1000, 600, true );
add_image_size( 'post-feature-large', 1200, 720, true );

?>