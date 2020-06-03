<?php 

    ?>

<body id="page-top" class="index">

    <div class="master-wrapper">

        <div class="preloader">
            <div class="preloader-img">
                <span class="loading-animation animate-flicker"><img src="../assets/img/loading.GIF" alt="loading"/></span>
            </div>
        </div>

        <!-- Header -->
        <header>
            <ul class="owl-carousel-paged wow fadeIn list-unstyled post-slider" data-items="3" data-items-desktop="[1200,3]" data-items-desktop-small="[980,3]" data-items-tablet="[768,2]" data-items-mobile="[479,1]">
                <li>
                    <div class="hover-item mb30 post-slide">
                        <img src="../assets/img/portfolio/portfolio1.jpg" class="img-responsive smoothie" alt="title">
                    </div>
                </li>
                <li>
                    <div class="hover-item mb30 post-slide">
                        <img src="../assets/img/portfolio/portfolio2.jpg" class="img-responsive smoothie" alt="title">
                    </div>
                </li>
                <li>
                    <div class="hover-item mb30 post-slide">
                        <img src="../assets/img/portfolio/portfolio3.jpg" class="img-responsive smoothie" alt="title">
                    </div>
                </li>
                <li>
                    <div class="hover-item mb30 post-slide">
                        <img src="../assets/img/portfolio/portfolio4.jpg" class="img-responsive smoothie" alt="title">
                    </div>
                </li>
            </ul>
        </header>

        <section>
            <div class="section-inner">
                <div class="container pad-sides-120">
                    <div class="row project-item wow">
                        <div class="col-sm-9">
                            <p>Saw yet kindness too replying whatever marianne. Old sentiments resolution admiration unaffected its mrs literature. Behaviour new set existence dashwoods. It satisfied to mr commanded consisted disposing engrossed. Tall snug do of till on easy. Form not calm new fail.</p>
                            <p>Behind sooner dining so window excuse he summer. Breakfast met certainty and fulfilled propriety led. Waited get either are wooded little her. Contrasted unreserved as mr particular collecting it everything as indulgence. Seems ask meant merry could put. Age old begin had boy noisy table front whole given.</p>
                        </div>
                        <div class="col-sm-3">
                            <p><strong>DATE:</strong> 21/01/2015</p>
                            <p><strong>CLIENT:</strong> Jeeves Design</p>
                            <p><strong>TAGS:</strong> Brand Design, Graphics</p>
                            <p class="mt30"><a href="#contact" class="btn btn-primary btn-theme page-scroll">Visit Project</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<section>
    <div class="section-inner">
        <div class="container">
            <div class="row">
                <div id="post-content" class="col-sm-8 col-sm-offset-2 blog-item mb60 wow">
                    <div class="row">
                        <div class="col-sm-12 single-post-content">
                        <!--AFFICHE LE CONTENU DE L'ARTICLE SELON l'ID -->
                            <p><?= nl2br($post->content); ?></p>

                            <div data-easyshare data-easyshare-url="http://www.distinctivethemes.com/">
                                <!-- Total -->
                                <button data-easyshare-button="total">
                                    <span>Total</span>
                                </button>
                                <span data-easyshare-total-count>0</span>

                                <!-- Facebook -->
                                <button data-easyshare-button="facebook">
                                    <span>Share</span>
                                </button>
                                <span data-easyshare-button-count="facebook">0</span>

                                <!-- Twitter -->
                                <button data-easyshare-button="twitter" data-easyshare-tweet-text="">
                                    <span>Tweet</span>
                                </button>
                                <span data-easyshare-button-count="twitter">0</span>

                                <!-- Google+ -->
                                <button data-easyshare-button="google">
                                    <span>+1</span>
                                </button>
                                <span data-easyshare-button-count="google">0</span>

                                <div data-easyshare-loader>Loading...</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="comments-list" class="col-sm-8 col-sm-offset-2 gap wow">
                    <div class="mt60 mb50 single-section-title">
                        <h3>Commentaires</h3>

                        <?php 
                        //RECUPERE LA FONCTION GET COMMENT (RECUPER LES COMMENTAIRES DANS LA BDD)
                        $responses = get_comments();
                            if($responses != false){
                                foreach($responses as $response){
                         ?>
                            <blockquote>
                            <div class="media">
                                <div class="pull-left">
                                    <img class="avatar comment-avatar" src="../assets/img/users/3.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="well">
                                        <div class="media-heading">
                                        <!--AFFICHE LE COMMENTAIRE SELON l'ID -->
                                            <span class="heading-font"><?= $response->name ?></span><small><?= date("d/m/Y à H:i",strtotime($response->date)); ?></small>
                                        </div>
                                        <p><?= nl2br($response->comments) ?></p>

                                    </div>
                                </div>
                            </div>
                        </blockquote>
                        <?php
                                    }
                                    //SI AUCUN COMMENTAIRE N'A ETE PUBLIE UN MESSAGE DONC S'AFFICHE
                                }else{
                                        echo "Aucun commentaire n'a été publié... Soyez le premier !";
                                
                                    } 
                                ?>



                        <div id="comments-form" class="row wow">
                            <div class="col-md-12">
                                <div class="mt60 mb50 single-section-title">
                                    <h3>Laisser un commentaire</h3>
                                    
                                    <?php 
                                    //RECUPERATION DU FORMULAIRE ET TRAITEMENT (COMMENTAIRE)
                                    if(isset($_POST['submit'])){
                                        $name = htmlspecialchars(trim($_POST['name']));
                                        $email = htmlspecialchars(trim($_POST['email']));
                                        $comment = htmlspecialchars(trim($_POST['comment']));
                                        $errors = [];
                                        //SI UN DES TROIS CHAMPS NE SONT PAS REMPLIS PAS DE TRAITEMENT ET AFFICHAGE D'UN MESSAGE D'ERREUR
                                        if(empty($name) || empty($email) || empty($comment)){
                                            $errors['empty'] = "Tous les champs n'ont pas été remplis";
                                        }else{
                                            //SI L'EMAIL EST INVALIDE
                                            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                                $errors['email'] = "L'adresse email n'est pas valide";
                                            }
                                        }

                                        //SI LE TABLEAU ERREUR N'EST PAS VIDE ALORS IL AFFICHE LES ERREURS
                                        if(!empty($errors)){
                                            ?>
                                                <div class="alert alert-danger">
                                                    <div class="alert-heading">
                                                        <?php
                                                            foreach($errors as $error){
                                                                echo $error."<br/>";
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            <?php
                                        }else{
                                            //LE COMMENTAIRE S'AFFICHE EN TEMPS REEL UNE FOIS POSTE
                                            comment($name,$email,$comment);
                                            ?>
                                                <script>
                                                    window.location.replace("index.php?page=post&id=<?= $_GET['id'] ?>");
                                                </script>
                                            <?php
                                        }
                                    }


                                    ?>


                                    </div>


                                    <div id="comment_message"></div>
                                    <form method="post" id="commentform" class="comment-form" formaction="post.php">
                                        <input type="text" class="form-control col-md-4" name="name" id="name" placeholder="Votre Nom *" required data-validation-required-message="Veuillez entrer votre Nom !"/>
                                        <label for="name"></label>
                                        <input type="text" class="form-control col-md-4" name="email" id="email" placeholder="Votre Email *" required data-validation-required-message="Veuillez entrer votre adresse Email ! !" />
                                        <label for="email"></label>
                                        <textarea  class="form-control" id="comment" name="comment"placeholder="Votre Message *" required data-validation-required-message="Veuillez entrer votre Message !"></textarea>
                                        <label for="comment"></label>
                                        <button type="submit" name="submit" class="btn btn-primary pull-right">Répondre</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     </section>

    
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

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-55234356-6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-55234356-6');
</script>

<script charset="utf-8" src="//cdn.iframe.ly/embed.js?api_key=9867fe0fb5b91b3ddca9ba"></script>
<script>
    document.querySelectorAll( 'oembed[url]' ).forEach( element => {
        iframely.load( element, element.attributes.url.value );
    } );
</script>
<script type="text/javascript">
    $(document).ready(function() {
        'use strict';
        jQuery('#headerwrap').backstretch([
            "assets/img/portfolio/portfolio1.jpg",
            "assets/img/portfolio/portfolio2.jpg",
            "assets/img/portfolio/portfolio3.jpg"
        ], {
            duration: 8000,
            fade: 500
        });
    });
</script>