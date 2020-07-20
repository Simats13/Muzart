
<!DOCTYPE html>
<html lang="fr">

<head>

   
    <title>Pérusat Création - Portfolio</title>

   
</head>
<!-- Navigation -->

<?php 

$videos = get_video();

?>

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
                            <h2 class="section-heading" style="margin-bottom:100px"><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("ETUDE PHOTOGRAPHIQUE","PHOTOGRAPHIC STUDY");
                            echo $description[$langue]; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
</section>

<div style="float:right;">
					<a href="?page=photo" target="_self"><img src="images/drapeau-francais.png" class="drapeau" /></a>
					<a href="?page=photo&lang=en" target="_self"><img src="fr/pages/images/drapeau-anglais.png" class="drapeau" /></a>
				</div>

        <section class="white-bg" style="margin-top:100px">
            <div class="section-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center mb50">
                            <ul class="portfolio-filter mb30 list-inline wow">
                                <li><a class="btn btn-primary active" href="#" data-filter="*"><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Tout","All");
                            echo $description[$langue]; ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div>
                    
                        <ul class="portfolio-items nopadding-lr isotope list-unstyled">
                        <?php foreach($videos as $video){ ?>
                        
                            <li class="col-sm-6 col-xs-6 portfolio-item nopadding-lr  isotope-item hover-item">
                            <figure class="media"><oembed url="<?= $video->image?>"></oembed></figure>
                                <div class="overlay-item-caption smoothie"></div>
                                <div class="hover-item-caption smoothie">
                                    <div class="vertical-center smoothie">
                                        <h3 class="smoothie mb30"><a href="?page=post_video&id=<?= $video->id ?>" title="view project"><?=$video->title?></a></h3>
                                        <a href="<?= $video->image?>" title="View Gallery" class="btn btn-primary lb-link smoothie">Visionner</a>
                                        <a href="?page=post_video&id=<?= $video->id ?>" class="smoothie btn btn-primary"><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Visionner","See");
                            echo $description[$langue]; ?></a>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        </ul>
                        
                    </div>
                </div>
                
            </div>
        </section>

        </br>
        </br>

       

    </div>

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="../assets/js/init.js"></script>
    <script charset="utf-8" src="//cdn.iframe.ly/embed.js?api_key=9867fe0fb5b91b3ddca9ba"></script>
    <script>
        document.querySelectorAll( 'oembed[url]' ).forEach( element => {
            iframely.load( element, element.attributes.url.value );
        } );
    </script>


</body>
</html>
