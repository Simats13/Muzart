<?php 
//RECUPERE LES POSTS DEPUIS LA BDD
$db = GetDBConnection();
$images = get_picture();
if($images == false){
    header("Location:index.php?page=error");
}else{
    



$works = $db->query("
    SELECT portfolio.title, portfolio.id, portfolio.image_id, images.name as image_name
    FROM portfolio
    JOIN images ON images.work_id = portfolio.id
")->fetchAll();



    ?>

<body id="page-top" class="index">

    <div class="master-wrapper">



        <!-- Header -->
        <header>
        <section class="dark-wrapper opaqued parallax" data-parallax="scroll" data-image-src="img/posts/<?= $images->image ?>"
            data-speed="0.7">
            <div class="section-inner text-center">
        <div class="container" style="margin-top:100px;">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 mt30 wow">
                <!--AFFICHE LE TITRE DU POST SELON l'ID -->
                    <h2 class="section-heading"><?= $images->title?></h2>
                    <div class="item-metas text-muted mb30 white">
                        <span class="meta-item"><i class="pe-icon pe-7s-user"></i> Auteur
                        <!--AFFICHE L'AUTEUR DU POST SELON l'ID -->
                            <span><?= $images->name ?></span></span>
                        <span class="meta-item"><i class="pe-icon pe-7s-comment"></i> Commentaires <span>3</span></span>
                        <span class="meta-item post-date"><i class="pe-icon pe-7s-clock"></i> Publié le
                        <!--AFFICHE LA DATE DU POST SELON l'ID -->
                            <span><?= date("d/m/Y à H:i",strtotime($images->date)); ?></span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        </header>

        
        <header>
       
            <ul class="owl-carousel-paged wow fadeIn list-unstyled post-slider" data-items="3" data-items-desktop="[1200,3]" data-items-desktop-small="[980,3]" data-items-tablet="[768,2]" data-items-mobile="[479,1]">
            <?php foreach ($works as $work): ?>
                <li>
                    <div class="hover-item mb30 post-slide">
                        <img src="img/posts/<?= resizedName($work['image_name'], 300, 300)?>" class="img-responsive smoothie" alt="title" >
                    </div>
                    
                </li>
                <?php endforeach ?>
            </ul>
            
        </header>
        <section>
            <div class="section-inner">
                <div class="container pad-sides-120">
                    <div class="row project-item wow">
                        <div class="col-sm-9">
                            <p><?= $images->content?></p>
                        </div>
                        <div class="col-sm-3">
                            <p><strong>DATE:</strong> <?= $images->date?></p>
                            <p><strong>AUTEUR:</strong> <?= $images->name?></p>
                            <p class="mt30"><a href="../?page=contact" class="btn btn-primary btn-theme page-scroll">Contacter</a></p>
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
                           

                            <div data-easyshare data-easyshare-url="#">
                                <!-- Total -->
                                <button data-easyshare-button="total">
                                    <span>Total</span>
                                </button>
                                <span data-easyshare-total-count>0</span>

                                <!-- Facebook -->
                                <button data-easyshare-button="facebook">
                                    <span>Partager</span>
                                </button>
                                <span data-easyshare-button-count="facebook">0</span>

                                <!-- Twitter -->
                                <button data-easyshare-button="twitter" data-easyshare-tweet-text="">
                                    <span>Tweeter</span>
                                </button>
                                <span data-easyshare-button-count="twitter">0</span>


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
                                                    window.location.replace("index.php?page=post_image&id=<?= $_GET['id'] ?>");
                                                </script>
                                            <?php
                                        }
                                    }


                                    ?>


                                    </div>


                                    <div id="comment_message"></div>
                                    <form method="post" id="commentform" class="comment-form" action="#">
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

<?php } ?>