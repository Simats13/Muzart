<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <div class="row">
        <section class="dark-wrapper opaqued parallax" data-parallax="scroll" data-image-src="../assets/img/bg/bg2.jpg"
            data-speed="0.7"style="margin-bottom:50px" >
            <div class="section-inner pad-top-200">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mt30 wow text-center">
                            <h2 class="section-heading" style="margin-bottom:100px">Blog</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>




<?php

//FAIT APPEL A LA FONCTION GET POST ET PARCOURT CHAQUE POST

$posts = get_posts();
foreach($posts as $post){
    ?>


        <div class="master-wrapper">

            <div class="preloader">
                <div class="preloader-img">
                    <span class="loading-animation animate-flicker"><img src="../assets/img/loading.GIF"
                            alt="loading" /></span>
                </div>
            </div>
            <section>
                <div class="section-inner">
                    <div class="container">
                        <div class="row">

                            <div class="col-sm-10 col-sm-offset-1 blog-item mb100 wow match-height">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="hover-item mb30">
                                        <!--AFFICHE L'IMAGE DU POST SELON l'ID -->
                                            <img src="img/posts/<?= $post->image ?>" class="img-responsive smoothie"
                                                alt="title">
                                            <div class="overlay-item-caption smoothie"></div>
                                            <div class="hover-item-caption smoothie">
                                                <h3 class="vertical-center smoothie"><a
                                                        href="index.php?page=post&id=<?= $post->id ?>"
                                                        class="smoothie btn btn-primary page-scroll"
                                                        title="view article">Voir l'article</a></h3>
                                            </div>
                                        </div>
                                        <!--AFFICHE LE TITRE DU POST SELON l'ID -->
                                        <h2 class="post-title"><?= $post->title?></h2>
                                        <div class="item-metas text-muted mb30">
                                            <span class="meta-item"><i class="pe-icon pe-7s-folder"></i> POSTÉ LE
                                            <!--AFFICHE LA DATE DE L'ARTICLE SELON l'ID -->
                                                <span><?= date("d/m/Y à H:i",strtotime($post->date)); ?></span></span>
                                            <span class="meta-item"><i class="pe-icon pe-7s-user"></i> AUTEUR
                                                <span><?= $post->name ?></span></span>
                                        </div>
                                        <!--AFFICHE LE CONTENU DU POST SELON l'ID -->
                                        <p><?= substr(nl2br($post->content),0,200) ?> ...</p>
                                        <!--CREER UN LIEN VERS l'ARTICLE -->
                                        <a class="btn btn-primary mt30"
                                            href="index.php?page=post&id=<?= $post->id ?>">Lire l'article complet</a>
                                            
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <?php
}

?>
  <div class="row paging text-center" style="margin-bottom:50px">
    <a class="btn btn-primary mt30" href="#">Anciens Posts</a>
  </div>
        </div>
        <!-- Bootstrap Core JavaScript -->
        <script src="../assets/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="../assets/js/plugins.js"></script>

        <!-- Plugins -->
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

        <!-- Custom JavaScript -->
        <script src="../assets/js/init.js"></script>
</body>

</html>