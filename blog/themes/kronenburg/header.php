<!DOCTYPE html>
<html lang="jp">
<head>
    <title>MoneyIQ Smart Life Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <?php //wp_enqueue_script("jquery"); ?>
    <?php  wp_head();  ?>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
    <?php if( is_single() ): ?>
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/main_reduced.css">
    <?php endif; ?>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','//connect.facebook.net/en_US/fbevents.js');

        fbq('init', '556517157831098');
        fbq('track', "PageView");</script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=556517157831098&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->
</head>
</head>
<body <?php body_class( $class ); ?> >

<div class="container-fluid light blog-page-header">
    <!--
    <div class="row">
        <div class="col-sm-3">
            <a class="" href="<?php bloginfo('url'); ?>">
                <img alt="MoneyIQ Logo" src="<?php bloginfo('template_directory'); ?>/img/moneyiq_web.png" width="216px" height="75" />
            </a>
        </div>
        <div class="col-sm-9">
        -->
            <nav class="navbar mainbar">
                <div class="container-fluid"  style="padding-right: 0">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
                            <img alt="MoneyIQ Logo" src="<?php bloginfo('template_directory'); ?>/img/moneyiq_web.png" width="144px" height="50px" />
                        </a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#blog-navbar-main" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-right" id="blog-navbar-main" style="padding-right: 0">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" id="dropdown1" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-thumbs-o-up"></i>
                                    おすすめ
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    $args = array( 'posts_per_page' => 5, "cat" => 7 );
                                    $lastposts = get_posts( $args );
                                    $start = true;
                                    foreach ( $lastposts as $post ) :  setup_postdata( $post );
                                    ?>
                                    <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
                                    <?php endforeach; wp_reset_postdata(); ?>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" id="dropdown1" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-slack"></i>
                                    レビュー
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    $args = array( 'posts_per_page' => 5, "cat" => 13, 'order'=> 'ASC', 'orderby' => 'title' );
                                    $lastposts = get_posts( $args );
                                    foreach ( $lastposts as $post ) :  setup_postdata( $post ); ?>
                                        <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
                                    <?php endforeach; wp_reset_postdata(); ?>
                                </ul>
                            </li>
                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" id="dropdown2" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-sort-amount-desc"></i>
                                    目的別ランキング<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">

                                <?php
                                    $locations = get_nav_menu_locations();
                                    $menu_name = 'internal-links';
                                    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                                    $menu_items = wp_get_nav_menu_items($menu->term_id);
                                    foreach ( (array) $menu_items as $key => $menu_item ): ?>
                                            <li><a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a></li>
                                <?php endforeach; ?>
                                </ul>
                            </li>
                            <li class="navbar-inverse "><a href="http://www.moneyiq.jp">
                                    <i class="fa fa-credit-card"></i>
                                    カード検索
                                </a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        <!--</div> /column -->
    <!--</div> /row -->
</div>
