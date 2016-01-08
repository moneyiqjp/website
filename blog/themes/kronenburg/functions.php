<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 12/13/2015
 * Time: 11:23 AM
 */


/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

    register_sidebar( array(
        'name'          => 'Single Post Right sidebar',
        'id'            => 'single_post_right',
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="sidebar-widget-title">',
        'after_title'   => '</h2><hr>',
    ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

// Add Shortcode
function generate_cardelement( $atts ) {
    // Attributes
    $params = shortcode_atts(
            array(
                'persona' => '',
                'card' => '',
            ), $atts );

    $parameter = strlen($params['persona'])>0?$params['persona'] : $params['card'];




    return
        "<div class='card-pane $parameter'>"
        . "    <div class='card-data-container'>"
        . "        <div class='card-image'><div class=\"card-image-placeholder card-image-rotate\"></div></div>"
        . "        <div class='card-stats-container'>"
        . "            <div class='card-article js-card-name'></div>"
        . "            <div class='card-message js-card-msg'>おすすめのカード！</div>"
        . "            <div class=\"card-stats-blog\">標準還元率<div class='number-highlight-main js-rate'></div></div>"
        . "            <div class='arrow-blog'><img src='/img/arrow-blog.png' alt='ポイントへの換算' /></div>"
        . "            <div class=\"card-stats-blog\">1年間で貯まるポイント<div class='number-highlight-main js-points'></div></div>"
        . "            <div class='arrow-blog'><img src='/img/arrow-blog.png' alt='特典への換算' /></div>"
        . "            <div class=\"card-stats-blog\">還元金額<div class=\"number-highlight-main js-rewards\"></div></div>"
        . "            <div>"
        . "                <a href='#' class=\"js-affiliate-link\" target=\"_blank\">"
        . "                     <div class=\"action-btn animated smooth-transition button-blog\" onclick=\"sendGglEvent('link', 'click', 'ref-blog')\">"
        . "                           サイトにアクセス"
        . "                        </div>"
        . "                </a>"
        . "                <a href='#' class=\"js-list-link\" target=\"_blank\">"
        . "                     <div class=\"action-btn animated smooth-transition button-blog\">詳細を見る</div>"
        . "                </a>"
        . "            </div>"
        . "        </div>"
        . "    </div>"
        . "    <div class='clearfix'></div>"
        . "</div>"
        ;

}
add_shortcode( 'cardelement', 'generate_cardelement' );

/*
function register_menus() {
    register_nav_menus(
        array(
            'navbar-links' => 'NavBar'
        ));
}

add_action( 'init', 'register_menus' );
*/
add_theme_support( 'post-thumbnails' );
add_image_size( 'post-preview', 370, 222 );
add_image_size( 'post-feature-small', 800, 480 );
add_image_size( 'post-feature', 1000, 600, true );
add_image_size( 'post-feature-large', 1200, 720, true );

?>