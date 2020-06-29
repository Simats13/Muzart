<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
-
    <title>Pérusat Création</title>

    

</head>
<?php 

$videos = get_video();

?>
<body>
    <div class="preloader">
                <div class="preloader-img">
                    <span class="loading-animation animate-flicker"><img src="assets/img/loading.GIF" alt="loading"/></span>
                </div>
    </div>
    <section class="dark-wrapper opaqued parallax" data-parallax="scroll" data-image-src="assets/img/bg/bg2.jpg" data-speed="0.7">
                <div class="section-inner pad-top-200">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 mt30 wow text-center">
                                <h2 class="section-heading" style="margin-bottom:100px"><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Art vidéo","Video art");
                            echo $description[$langue]; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
    </section>

<div class="section-inner" style="margin-top:100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb50">
                <ul class="portfolio-filter mb30 list-inline wow">
                    <li><a class="btn btn-primary" href="?page=portfolio" data-filter=".portfolio"><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Tout","All");
                            echo $description[$langue]; ?></a></li>
                    <li><a class="btn btn-primary active" href="?page=video" data-filter=".video"><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Vidéos","Videos");
                            echo $description[$langue]; ?></a></li>
                </ul>
            </div>
        </div>
</div>
<div style="float:right;">
					<a href="?page=video" target="_self"><img src="images/drapeau-francais.png" class="drapeau" /></a>
					<a href="?page=video&lang=en" target="_self"><img src="page/images/drapeau-anglais.png" class="drapeau" /></a>
				</div>
    <div class="container-fluid pb-video-container">
        <div class="col-md-10 col-md-offset-1">
            <div class="row pb-row">
                <div class="col-md-3 pb-video">
                    <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/K68UrdUOr2Y?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
                    <label class="form-control label-warning text-center">Descriptif</label>
                </div>
                <div class="col-md-3 pb-video">
                    <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/K68UrdUOr2Y?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
                    <label class="form-control label-warning text-center">Descriptif</label>
                </div>
                <div class="col-md-3 pb-video">
                    <iframe class="pb-video-frame " width="100%" height="230" src="https://www.youtube.com/embed/K68UrdUOr2Y?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
                    <label class="form-control label-warning text-center">Descriptif</label>
                </div>
                <div class="col-md-3 pb-video">
                    <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/K68UrdUOr2Y?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
                    <label class="form-control label-warning text-center">Descriptif</label>
                </div>
            </div>
            <div class="row pb-row">
                <div class="col-md-3 pb-video">
                    <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/K68UrdUOr2Y?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
                    <label class="form-control label-warning text-center">Descriptif</label>
                </div>
                <div class="col-md-3 pb-video">
                    <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/K68UrdUOr2Y?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
                    <label class="form-control label-warning text-center">Descriptif</label>
                </div>
                <div class="col-md-3 pb-video">
                    <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/K68UrdUOr2Y?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
                    <label class="form-control label-warning text-center">Descriptif</label>
                </div>
                <div class="col-md-3 pb-video">
                    <iframe class="pb-video-frame" width="100%" height="230" src="https://www.youtube.com/embed/K68UrdUOr2Y?list=RDzuAcaBkcYGE?ecver=1" frameborder="0" allowfullscreen></iframe>
                    <label class="form-control label-warning text-center">Descriptif</label>
                </div>
            </div>
        </div>
    </div>
    
    <style>
    
        .pb-video {
            border: 1px solid #e6e6e6;
            padding: 5px;
        }
    
        .pb-video-frame {
            transition: width 2s, height 2s;
        }
    
            .pb-video-frame:hover {
                height: 300px;
            }
    
        .pb-row {
            margin-bottom: 10px;
        }
    </style>


    </div>

    <br>

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="../assets/js/init.js"></script>          

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



</body>

</html>
