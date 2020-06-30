<?php 
$videos = get_videos();

$images = get_portfolios();

$get_image = get_image();


?>


<!DOCTYPE html>
<html lang="fr">

<head>

   
    <title>Pérusat Création - Portfolio</title>

   
</head>
<!-- Navigation -->

<div class="preloader">
            <div class="preloader-img">
                <span class="loading-animation animate-flicker"><img src="../assets/img/loading.GIF" alt="loading"/></span>
            </div>
        </div>

        <section class="dark-wrapper opaqued parallax" data-parallax="scroll" data-image-src="../assets/img/bg/bg2.jpg" data-speed="0.7">
            <div class="section-inner pad-top-200">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mt30 wow text-center">
                            <h2 class="section-heading" style="margin-bottom:100px">PORTFOLIO</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div style="float:right;">
					<a href="?page=portfolio" target="_self"><img src="images/drapeau-francais.png" class="drapeau" /></a>
					<a href="?page=portfolio&lang=en" target="_self"><img src="fr/pages/images/drapeau-anglais.png" class="drapeau" /></a>
				</div>

        <section class="white-bg">
            <div class="section-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center mb50">
                            <ul class="portfolio-filter mb30 list-inline wow">
                                <li><a class="btn btn-primary active" href="#" data-filter="*">
                                <?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Toutes les oeuvres","All works");
                            echo $description[$langue]; ?></a></li>


                                <li><a class="btn btn-primary" href="#" data-filter=".photo">
                                <?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Etude Photographique","Photographic Study");
                            echo $description[$langue]; ?></a></li>


                                <li><a class="btn btn-primary" href="#" data-filter=".video"><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Art Video","Video Art");
                            echo $description[$langue]; ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container" style="margin-bottom:100px">
                    <div>
                        <?php
                            
                        
                        
                        
                        ?>
                        <ul class="portfolio-items nopadding-lr isotope list-unstyled">
                            <?php 
                                foreach($images as $image){
                            
                            ?>
                            <li class="col-sm-4 col-xs-12 portfolio-item nopadding-lr photo isotope-item">
                                <div class="hover-item">
                                    <img src="img/posts/<?= resizedName($image->image, 300, 300)?>" class="img-responsive smoothie" alt="">
                                    <div class="overlay-item-caption smoothie"></div>
                                    <div class="hover-item-caption smoothie">
                                        <div class="vertical-center smoothie">
                                            <h3 class="smoothie mb30"><a href="?page=post_image&id=<?= $image->id ?>" title="view project"><?= $image->title ?></a></h3>
                                            <a href="img/posts/<?= $image->image ?>" title="Zoomer" class="btn btn-primary lb-link smoothie">Visionner</a>
                                            <a href="?page=post_image&id=<?= $image->id ?>" class="smoothie btn btn-primary">En savoir plus</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php 
                                }
                                
                                foreach($videos as $video){
                            
                            
                        
                        ?>

                            <li class="col-sm-4 col-xs-12 portfolio-item nopadding-lr video isotope-item">
                                <div class="hover-item">
                                <figure class="media"><oembed url="<?= $video->image?>"></oembed></figure>
                                    <div class="overlay-item-caption smoothie"></div>
                                    <div class="hover-item-caption smoothie">
                                        <div class="vertical-center smoothie">
                                            <h3 class="smoothie mb30"><a href="?page=post_video&id=<?= $video->id ?>" title="view project"><?= $video->title ?></a></h3>
                                            <a href="?page=post_video&id=<?= $video->id ?>" class="smoothie btn btn-primary">En savoir plus</a>
                                            <a href="<?= $video->image?>" class="smoothie btn btn-primary">Visionner la vidéo</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php 
                             }
                        
                        
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="../assets/js/init.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script charset="utf-8" src="//cdn.iframe.ly/embed.js?api_key=9867fe0fb5b91b3ddca9ba"></script>
    <script>
        document.querySelectorAll( 'oembed[url]' ).forEach( element => {
            iframely.load( element, element.attributes.url.value );
        } );
    </script>


</body>
</html>

