 
<!DOCTYPE html>
<html lang="fr">


<head>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/ico/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/ico/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/ico/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" href="assets/img/ico/apple-touch-icon-57x57.png">

    <title>Pérusat Création</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/plugins.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/pe-icons.css" rel="stylesheet">

</head>

 <section class="dark-wrapper opaqued parallax" data-parallax="scroll" data-image-src="assets/img/bg/bg2.jpg" data-speed="0.7">
            <div class="section-inner pad-top-200">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mt30 wow text-center">
                            <h2 class="section-heading" style="margin-bottom:100px">A PROPOS</h2>
                        </div>
                    </div>
                </div>
            </div>
</section>

        <section class="white-bg">
           
        <div style="float:right;">
					<a href="?page=about" target="_self"><img src="images/drapeau-francais.png" class="drapeau" /></a>
					<a href="?page=about.php?lang=en" target="_self"><img src="page/images/drapeau-anglais.png" class="drapeau" /></a>
				</div>
				</div>
<!--Description Isabelle Pérusat + photo d'elle-->
        <section id="welcome" style="margin-top:50px;margin-left:20px">
            <div class="section-inner nopaddingbottom">

                
                    <div class="row">
                        <div class="col-md-6">
                            <p class="lead"> 
                                <?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Isabelle Pérusat née à Montpellier, commence la musique à 5 ans , passe un vingtaine d'années à Paris , pianiste , compositrice , chanteuse , parcours classique , orientation pop music , photographe , création scénique , vidéo , cette artiste complète à plus d'une corde à son arc .
                                Dans les années 90 , elle travaille avec le groupe «Eurythmics» en collaborant avec eux à la sortie d'un album .
                                Isabelle fait du travail de recherche sur l'art vibratoire ( unir les émotions au travers de la musique ).","Isabelle Pérusat born in Montpellier, begins music at 5 years old, spends twenty years in Paris, pianist, composer, singer, classical career, pop music orientation, photographer, stage creation, video, this artist completes more than a string to her bow.
                                In the 90s , she worked with the band «Eurythmics» by collaborating with them on the release of an album .
                                Isabelle does research work on vibratory art (unite emotions through music).");
                            echo $description[$langue]; ?> 
                            </p>
                            <p class="mt30"><a href="#contact" class="btn btn-primary btn-theme page-scroll">Contactez-moi</a></p>
                        </div>

                        <div class="col-md-6">
                            <img src="assets/Photo/isabelle.png" class="img-responsive alignright wow fadeIn" data-wow-delay="0.5s" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </section>
<!-- Oeuvres populaires-->
        <section class="white-bg" style="margin-top:50px;margin-bottom:50px">
            <div class="section-inner nopadding-bottom">
                
                    <div class="row">
                        <div class="col-sm-9 match-height">
                            <div class="row">
                                <div class="col-xs-12">
                                    <ul class="owl-carousel-paged testimonial-owl wow fadeIn list-unstyled" data-items="3" data-items-tablet="[768,2]" data-items-mobile="[479,1]">
                                        <li>
                                            <div class="row hover-item">
                                                <div class="col-xs-12">
                                                    <img src="assets/img/ensemble.png" class="img-responsive smoothie" alt="">
                                                </div>
                                                <div class="col-xs-12 hover-item-caption smoothie">
                                                    <div class="vertical-center">
                                                        <h3 class="smoothie"><a href="single-portfolio.html" title="view project">Juste après le silence</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row hover-item">
                                                <div class="col-xs-12">
                                                    <img src="assets/img/ensemble.png" class="img-responsive smoothie" alt="">
                                                </div>
                                                <div class="col-xs-12 hover-item-caption smoothie">
                                                    <div class="vertical-center">
                                                        <h3 class="smoothie"><a href="single-portfolio.html" title="view project">Ensemble</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row hover-item">
                                                <div class="col-xs-12">
                                                    <img src="assets/img/piano.PNG" class="img-responsive smoothie" alt="">
                                                </div>
                                                <div class="col-xs-12 hover-item-caption smoothie">
                                                    <div class="vertical-center">
                                                        <h3 class="smoothie"><a href="single-portfolio.html" title="view project">Black And White Paradise</a></h3>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row hover-item">
                                                <div class="col-xs-12">
                                                    <img src="assets/img/piano.PNG" class="img-responsive smoothie" alt="">
                                                </div>
                                                <div class="col-xs-12 hover-item-caption smoothie">
                                                    <div class="vertical-center">
                                                        <h3 class="smoothie"><a href="single-portfolio.html" title="view project">COMPOSITIONS</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 match-height">
                            <div class="vertical-center">
                                <h2 class="section-heading">Oeuvres</h2>
                                <h3 class="section-subheading secondary-font">les plus populaires</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <br>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="assets/js/init.js"></script>


</body>
</html>

<script type="text/javascript">
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-55234356-6'); 
</script> 

