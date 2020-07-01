<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">


</head>

<body>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top fadeInDown header-2 data-wow-delay="0.5s">
            <div class="top-bar smoothie hidden-xs">
                <div class="container">
                    <div class="clearfix">
                        <ul class="list-inline social-links wow pull-left">
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>

                        <div class="pull-right text-right">
                            <ul class="list-inline">
                                <li>
                                    <div><i class="fa fa-envelope-o"></i> contact@iperusatcreation.com</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->

                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand smoothie logo" href="index.php"><img src="assets/img/logo_reverse.png" alt="logo"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="main-navigation">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown" role="menu">
                            <a href="?"><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Accueil","Home");
                            echo $description[$langue]; ?></a>
                        </li>
                        <li class="dropdown" role="menu">
                            <a href="portfolio/index.php"><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Portfolio","Portfolio");
                            echo $description[$langue]; ?></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="?page=image"><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Etude photographique","Photographic study");
                            echo $description[$langue]; ?></a></li>
                                <li><a href="?page=video"><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Art vidéo","Video art");
                            echo $description[$langue]; ?></a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="blog/index.php"><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Blog","Blog");
                            echo $description[$langue]; ?></a>
                        </li>
                        <li class="dropdown">
                            <a href="?page=about"><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("A propos","About");
                            echo $description[$langue]; ?></a>
                        </li>
                        <li class="dropdown">
                            <a href="?page=contact"><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Contact","Get contact");
                            echo $description[$langue]; ?></a>
                        </li>
                        
                        
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll hidden">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" style="background-color:grey">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand smoothie logo logo-light" href="index.php"><img src="assets/img/logo.png" alt="logo"></a>
                    <a class="navbar-brand smoothie logo logo-dark" href="index.php"><img src="assets/img/logo_reverse.png" alt="logo"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="main-navigation">
                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        

</body>

</html>
