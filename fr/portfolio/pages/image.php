
<!DOCTYPE html>
<html lang="fr">

<head>

   
    <title>Pérusat Création - Portfolio</title>

   
</head>
<!-- Navigation -->

<?php 

$images = get_picture();

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
                            <h2 class="section-heading" style="margin-bottom:100px">ETUDE PHOTOGRAPHIQUE</h2>
                        </div>
                    </div>
                </div>
            </div>
</section>

        <section class="white-bg" style="margin-top:100px">
            <div class="section-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center mb50">
                            <ul class="portfolio-filter mb30 list-inline wow">
                                <li><a class="btn btn-primary active" href="#" data-filter="*">Tout</a></li>
                                <li><a class="btn btn-primary" href="#" data-filter=".photography">Photos</a></li>
                                <li><a class="btn btn-primary" href="#" data-filter=".portrait">Portrait</a></li>
                                <li><a class="btn btn-primary" href="#" data-filter=".paysage">Paysage</a></li>
                                <li><a class="btn btn-primary" href="#" data-filter=".paysage">Exposition</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div>
                    
                        <ul class="portfolio-items nopadding-lr isotope list-unstyled">
                        <?php foreach($images as $image){ ?>
                        
                            <li class="col-sm-6 col-xs-6 portfolio-item nopadding-lr portrait isotope-item hover-item">
                                <img src="img/posts/<?= $image->image?>" class="img-responsive smoothie" alt="" width="50px" height="50px">
                                <div class="overlay-item-caption smoothie"></div>
                                <div class="hover-item-caption smoothie">
                                    <div class="vertical-center smoothie">
                                        <h3 class="smoothie mb30"><a href="single-portfolio-fullscreen.html" title="view project"><?=$image->title?></a></h3>
                                        <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(116).jpg" title="View Gallery" class="btn btn-primary lb-link smoothie">Zoom</a>
                                        <a href="index.php?page=post&id=<?= $image->id ?>" class="smoothie btn btn-primary">Visionner</a>
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


</body>
</html>

