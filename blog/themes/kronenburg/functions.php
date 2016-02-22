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
            'internal-links' => 'InternalLinks'
        ));
}
add_action( 'init', 'register_menus' );

function the_content_shortcodefilter($content) {
    $block = join("|",array("result", "resultbox", "merit", "demerit", "item"));
    $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
    $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
    return $rep;
}
add_filter("the_content", "the_content_shortcodefilter");


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
function result_shortcode( $atts, $content = null ) {
    return '<div class="kb-result">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'result', 'result_shortcode' );
/*
function resultbox_shortcode( $atts, $content = null ) {
    // Attributes
    $params = shortcode_atts(
        array(
            'title' => '',
            'type' => '',
            'width' => 98
        ), $atts );

    $header = $params['title'];

     //$width =  strlen($params['width'])>0?'style="width:' . $params['width'] .'%;float:left;"':"";

    $width =  $params['width']<=50?'halfsize':"fullsize";
    $typeclass = "";
    switch(strtolower($params['type'])) {
        case "merit":
            $typeclass="kb-merit";
            break;
        case "demerit":
            $typeclass="kb-merit";
            break;
        default:
            $typeclass="kb-general";
    }

    return '<div class="kb-merit-block ' . $typeclass . " " . $width . '" ' . $width .'>'
    . '<div class="kb-merit-header">' . $header . '</div>'
    . '<div class="kb-merit-content"><ul class="fa-ul">' . do_shortcode($content) . '</ul></div>'
    .'</div>';
}
add_shortcode( 'resultbox', 'resultbox_shortcode' );
*/

function generic_meritbox( $atts, $content = null ) {
    // Attributes
    $params = shortcode_atts(
        array(
            'title' => '',
            'type' => '',
            'width' => ''
        ), $atts );


    return '<div class="kb-merit-block ' . $params['type'] . " " . $params['width'] . '">'
    . '<div class="kb-merit-header">' . $params['title'] . '</div>'
    . '<div class="kb-merit-content">' . do_shortcode($content) . '</div>'
    .'</div>';
}
function merit_shortcode( $atts, $content = null ) {
    $atts['title']="メリット";
    $atts['width']="halfsize";
    $atts['type']="kb-merit";
    return generic_meritbox( $atts, $content );
}
add_shortcode( 'merit', 'merit_shortcode' );

function demerit_shortcode( $atts, $content = null ) {
    $atts['title']="デメリット";
    $atts['width']="halfsize";
    $atts['type']="kb-demerit";
    return generic_meritbox( $atts, $content );
}
add_shortcode( 'demerit', 'demerit_shortcode' );

function item_shortcode( $atts, $content = null ) {
    $atts['width']="fullsize";
    $atts['type']="kb-general";
    return generic_meritbox( $atts, $content );
}
add_shortcode( 'item', 'item_shortcode' );

function intro_shortcode( $atts, $content = null ) {

    return '<p class="introduction">' . do_shortcode($content) . '</p>';
}
add_shortcode( 'intro', 'intro_shortcode' );

function inlinetable_shortcode( $atts, $content = null ) {
    // Attributes
    $params = shortcode_atts(
        array(
            'title' => ''
        ), $atts );

    $header = $params['title'];
    return '<div class="row kb-inline-table-row">'
            . '<div class="col-sm-4 kb-inline-table-header">' . $header . '</div>'
            . '<div class="col-sm-8 kb-inline-table-content">' . $content . '</div>'
            .'</div>';
}
add_shortcode( 'inlinetable', 'inlinetable_shortcode' );

function quote_shortcode( $atts, $content = null ) {
    // Attributes
    $params = shortcode_atts(
        array(
            'author' => ''
        ), $atts );

    $author = "";
    if(strlen($params['author'])>0) {
        $author= '<div class="blockquote-author">' . $params['author'] . '</div>';
    };
    return '<div class="blockquote">'
    . '<div class="blockquote-content">' . do_shortcode($content) . '</div>' . $author
    .'</div>';
}
add_shortcode( 'quote', 'quote_shortcode' );

function generate_cardelement( $atts ) {
    // Attributes
    $params = shortcode_atts(
        array(
            'persona' => '',
            'card-id' => '',
        ), $atts );

    $parameter = $params['persona'];
    $parameter .= strlen($params['card-id'])>0? " card-id-" . $params['card-id']:"";

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
        . "                           お申し込みはこちら"
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


function my_scripts_method() {
    wp_enqueue_script('flexslider', 'http://www.moneyiq.jp/js/main.js', array('jquery'), null, true);
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method', 20 );

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
add_image_size( 'post-preview', 630, 420, true );
add_image_size( 'post-feature-small', 800, 480 );
add_image_size( 'post-feature', 1000, 600, true );
add_image_size( 'post-feature-large', 1200, 720, true );

function wpbeginner_numeric_posts_nav() {
    if( is_singular() )
        return;
    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation center-block"><ul>' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );

    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );

    echo '</ul></div>' . "\n";

}


?>