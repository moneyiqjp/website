<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="utf-8">
    <title>MoneyIQ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/vendor/jquery-ui-1.11.4/jquery-ui.min.css">
    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- Le styles -->
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <!-- Le fav and touch icons
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    -->
    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
</head>

<body>

<div class="header-container">
    <div class="title-menu">
        <header class="wrapper clearfix">
            <div class="title"><div class="headline"><?php bloginfo('name'); ?></div>
                <span><?php bloginfo('description'); ?></span>
            </div>
            <nav>
                <ul>
                <?php
                    $menu_name = 'internal-links';
                    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
                        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                        $menu_items = wp_get_nav_menu_items($menu->term_id);
                        foreach ( (array) $menu_items as $key => $menu_item ) {
                            echo '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
                        }
                    }
                ?>
                </ul>
            </nav>
        </header>
    </div>
    <div class="logo">
        <a class="brand" href="<?php echo site_url(); ?>">
            <img src="<?php bloginfo('template_directory'); ?>/img/logo_white.png" alt="MoneyIQ">
        </a>
    </div>
</div>

<!--
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <?php wp_list_pages(array('title_li' => '', 'exclude' => 4)); ?>
                </ul>
            </div>
        </div>
    </div>
</div>
-->

<div class="container">
