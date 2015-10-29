<?php

function wpbootstrap_scripts_with_jquery()
{
    // Register the script like this for a theme:
    wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

function register_menus() {
    register_nav_menus(
        array(
            'internal-links' => 'InternalLinks'
        ));
}


/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

    register_sidebar( array(
        'name'          => 'Home right sidebar',
        'id'            => 'home_right_1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );


add_action( 'init', 'register_menus' );

add_theme_support( 'post-thumbnails' );
add_image_size( 'post-preview', 350, 250 );
add_image_size( 'post-feature-small', 800, 570 );
add_image_size( 'post-feature', 1200, 855 );

?>