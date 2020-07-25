<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">

</head>
<?php



$posts = get_posts();

?>
<body>
        <div id="footer-wrapper" class="footer-image-bg">
            <section class="transparent-wrapper">
                <div class="section-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="widget about-us-widget">
                                    <h4 class="widget-title"><strong><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Ouverture ","Global ");
                            echo $description[$langue]; ?></strong><?php $langue=0;
                            if(isset($_GET["lang"]))
                            $langue=1;
                            $description = array("Mondiale","Coverage");
                        echo $description[$langue]; ?></h4>
                                    <p><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Isabelle Pérusat née à Montpellier, commence la musique à 5 ans , passe un vingtaine d'années à Paris , pianiste , compositrice , chanteuse , parcours classique , orientation pop music , photographe , création scénique , vidéo , cette artiste complète à plus d'une corde à son arc .
                                Dans les années 90 , elle travaille avec le groupe «Eurythmics» en collaborant avec eux à la sortie d'un album .","Isabelle Pérusat born in Montpellier, started music at 5, spent twenty years in Paris, pianist, composer, singer, classical path, pop music orientation, photographer, scenic creation, video, this artist completes in more than one string to his bow.
                                In the 90s, she worked with the group «Eurythmics» by collaborating with them on the release of an album.");
                            echo $description[$langue]; ?></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="widget">
                                    <h4 class="widget-title"><strong><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Dernier","Last");
                            echo $description[$langue]; ?></strong> <?php $langue=0;
                            if(isset($_GET["lang"]))
                            $langue=1;
                            $description = array("Articles","Articles");
                        echo $description[$langue]; ?></h4>
                                    <div>
                                        <?php foreach($posts as $post){ ?>
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="widget-img" src="blog/img/posts/<?=$post->image ?>" width="50px" height="50px" alt="">
                                            </div>
                                            <div class="media-body">
                                                <span class="media-heading"><a href="blog/index.php?page=post&id=<?= $post->id ?>"><?= $post->title ?></a></span>
                                                <small class="muted"><?php $langue=0;
                                                    if(isset($_GET["lang"]))
                                                    $langue=1;
                                                    $description = array("Posté le","Posted in");
                                                echo $description[$langue]; ?> <?= date("d/m/Y à H:i",strtotime($post->date)); ?></small>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="widget">
                                    <h4 class="widget-title"><?php $langue=0;
                            if(isset($_GET["lang"]))
                            $langue=1;
                            $description = array("Liens","Link");
                        echo $description[$langue]; ?></h4>
                                    <div class="tagcloud">
                                        <a href="portfolio" class="tag-link btn btn-theme btn-white btn-xs smoothie" title="3 topics">Portfolio</a>
                                        <a href="blog" class="tag-link btn btn-theme btn-white btn-xs smoothie" title="3 topics">Blog</a>
                                        <a href="?page=about" class="tag-link btn btn-theme btn-white btn-xs smoothie" title="3 topics"><?php $langue=0;
                            if(isset($_GET["lang"]))
                            $langue=1;
                            $description = array("À Propos","About");
                        echo $description[$langue]; ?></a>
                                        <a href="?page=contact" class="tag-link btn btn-theme btn-white btn-xs smoothie" title="3 topics">Contact</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="white-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="list-inline social-links wow">
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/in/isabelle-perusat-a38b2639"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-12 text-center ptb">
                            <span class="copyright">Copyright 2019. Designed by IN'TECH</span>
                            <br>
                            <a href="http://intech-sud.fr/"><img src="../assets/img/intech.svg" alt="intech" width="150vw" height="150vw"></a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>


</body>

</html>