<!DOCTYPE html>
<html lang="jp">
<head>
    <title>MoneyIQ Smart Life Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
    <?php if( is_single() ): ?>
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/main_reduced.css">
    <?php endif; ?>
</head>
<body <?php body_class( $class ); ?> >

<div class="container light">
    <div class="row">

        <div class="col-sm-4">
            <a class="" href="<?php bloginfo('url'); ?>">
                <img alt="MoneyIQ Logo" src="<?php bloginfo('template_directory'); ?>/img/moneyiq_web.png"/>
            </a>
        </div>
        <div class="col-sm-8">
            <nav class="navbar" style="margin-top: 50px; margin-bottom: 0; margin-right: 0; padding-right:0">
                <div class="container-fluid"  style="padding-right: 0">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#blog-navbar-collapse-1" aria-expanded="false">
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
                                    <li><a href="#">最強クレジットカード2016年</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">最強 ANAマイレージカード</a></li>
                                    <li><a href="#">最強 JALマイレージカード</a></li>
                                    <li><a href="#">最強 ゴールドクレジットカード</a></li>
                                    <li><a href="#">最強ポイント付きクレジットカード</a></li>
                                    <li><a href="#">最強 キャッシュバッククレジットカード</a></li>
                                </ul>
                            </li>
                            <li><a href="#">
                                    <i class="fa fa-slack"></i>
                                    レビュー
                                </a></li>
                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" id="dropdown2" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-sort-amount-desc"></i>
                                    目的別ランキング<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">ANA</a></li>
                                    <li><a href="#">空マイラー</a></li>
                                    <li><a href="#">陸マイラー</a></li>
                                    <li><a href="#">年会費無料</a></li>
                                    <li><a href="#">JAL</a></li>
                                    <li><a href="#">フライトで貯まる</a></li>
                                    <li><a href="#">ショッピングで貯まる</a></li>
                                    <li><a href="#">年会費無料</a></li>
                                    <li><a href="#">ゴールドカード</a></li>
                                    <li><a href="#">マイレージ</a></li>
                                    <li><a href="#">旅行</a></li>
                                    <li><a href="#">年会費が１万円以下</a></li>
                                    <li><a href="#">キャッシュバック</a></li>
                                    <li><a href="#">銀行振り込み型</a></li>
                                    <li><a href="#">請求に充当</a></li>
                                    <li><a href="#">電子マネー充当</a></li>
                                </ul>
                            </li>
                            <li><a href="#">
                                    <i class="fa fa-database"></i>
                                    データブログ
                                </a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div><!-- /column -->
    </div><!-- /row -->
    <!--
    <div class="jumbotron miqheader">
        <div class="row">
            <div class="col-sm-6">
                <a href="<?php echo site_url(); ?>">
                    <h1>Smart Life.</h1>
                </a>
            </div>
            <div class="col-sm-6  hidden-xs hidden-sm text-right">
                <a href="<?php echo site_url(); ?>">
                    <h1 class="pull-right">Smart Money.</h1>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 miqhero">
                <a href="<?php echo site_url(); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/img/logo_white.png" class="img-responsive center-block">
                </a>
            </div>
        </div>
    </div>
        -->
</div>