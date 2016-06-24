<?php

    if(isset($_GET["item"])) {
        $title = $_GET["item"];
    } else  {
        $title="CreditCardOverview";
    }
    $item = strtolower($title);
    $hassubmenu = isset($_GET["sub"]);
    if($hassubmenu) {
        $submenu = $_GET["sub"];
        $id = $_GET["id"];
    }

    if(isset($_GET["id"])) {
        $id = $_GET["id"];
    }
    $basename = basename(__FILE__);

?>

<html>
<head>
    <meta charset="utf-8">
    <title>MoneyIQ <?php echo $title ?></title>
    <?php include 'included_header_libs.php';?>
    <link rel="stylesheet" type="text/css"  href="media/css/datatables_bootstrap.css"/>
    <script type="text/javascript" src="media/js/dataTablesUtils.js"></script>
    <script type="text/javascript" src="scripts/<?php echo $item ?>.js" language="javascript" class="init"></script>
</head>

<body class="admin">
<div class="container">
<nav class="navbar navbar-default">
    <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-admin" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $basename?>">
                <img alt="Brand" src="images/moneyIQ_logo.png">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-admin">
            <ul class="nav navbar-nav">
                <!--
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Overview <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $basename?>?item=CreditCardOverview">Credit Cards</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=PointProgramOverview">Point Programs</a></li>
                    </ul>
                </li>
                -->
                <li><a href="<?php echo $basename?>?item=CreditCardOverview">Credit Cards</a></li>
                <li><a href="<?php echo $basename?>?item=PointProgramOverview">Point Programs</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Static Data <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $basename?>?item=Feature">Features</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=Issuer">Issuers</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=Affiliate">Affiliates</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=Insurance">Insurances</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=StoreCategory">Store Categories</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=Store">Stores</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=Unit">Units</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=RewardStatic">Reward</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=RestrictionStatic">Restriction</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Rewards <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $basename?>?item=RewardStatic">Static data</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=RewardEditable">Editable</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=RewardGenerated">Generated</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Persona <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $basename?>?item=PersonaOverview">Overview</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=RestrictionOverview">Restrictions</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=Scene">Scenes</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=SceneMapping">Scene Mapping</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Restrictions <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $basename?>?item=RestrictionStatic">Attributes</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=RestrictionOverview">Overview</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Mileage <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $basename?>?item=Trips">Trip</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=Zone">Zone</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=Season">Season</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=mileage">Mileage</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $basename?>?item=flightcost">FlightCost</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Other <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="testing_backend.php">Backend status</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="http://moneyiq.jp/admin/imageUploader.php">Image Upload</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href=""<?php echo $_SERVER["REQUEST_URI"]; ?>"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->

        <?php if($hassubmenu) {include("pages/menu" . $submenu. ".php");} ?>

    </div><!-- /.container-fluid -->
</nav>

    <?php include("pages/$item.php"); ?>
</div>

<br>
<br>
<br>

</body>
</html>