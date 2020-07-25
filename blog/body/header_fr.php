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
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/in/isabelle-perusat-a38b2639"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>

                        <div class="pull-right text-right">
                            <ul class="list-inline">
                                <li>
                                    <div><i class="fa fa-envelope-o"></i> contact@isabelleperusat.com</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->

                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation" style="background-color: grey; margin-right:10vw">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand smoothie logo" href="index.php"><img src="../assets/img/logo_reverse.png" alt="logo"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="main-navigation">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown" role="menu">
                            <a href="../?">Accueil</a>
                        </li>
                        <li class="dropdown" role="menu">
                            <a href="../portfolio">Portfolio</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="../?page=image">Étude Photographique</a></li>
                                <li><a href="../?page=video">Art Vidéos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="?">Blog</a>
                        </li>
                        <li class="dropdown">
                            <a href="../?page=about">À Propos</a>
                        </li>
                        <li class="dropdown">
                            <a href="../?page=contact">Contact</a>
                        </li>

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll" >
                    <button type="button" class="navbar-toggle" data-toggle="collapse" style="background-color: grey; margin-right:10vw" >
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand smoothie logo logo-light hidden" href="../index.php"><img src="../assets/img/logo.png" alt="logo"></a>
                    <a class="navbar-brand smoothie logo logo-dark hidden" href="../index.php"><img src="../assets/img/logo_reverse.png" alt="logo"></a>
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


        <div class="flexpanel">
        <div class="viewport-wrap">
            <div class="viewport">
            <div class="flexpanel">
        <div class="viewport-wrap">
            <div class="viewport">
                <div class="widget mb50">
                    <h4 class="widget-title">Dernier articles</h4>
                    <?php foreach($posts as $post){ ?>
                    <div>
                        <div class="media">
                            <div class="pull-left">
                                <img class="widget-img" src="img/posts/<?=$post->image ?>" width="50px" height="50px" alt="<?= $post->title ?>">
                            </div>
                            <div class="media-body">
                                <span class="media-heading"><a href="blog/index.php?page=post&id=<?= $post->id ?>"><?= $post->title ?></a></span>
                                <small class="muted">Posté le <?= date("d/m/Y à H:i",strtotime($post->date)); ?></small>
                            </div>
                        </div>
                        <br>
                    <?php } ?>
                </div>
                <div class="widget mb50">
                    <h4 class="widget-title"><strong>Latest</strong> Articles</h4>
                    <div class="tagcloud">
                        <a href="#" class="tag-link btn btn-theme btn-xs" title="3 topics">Local</a>
                        <a href="#" class="tag-link btn btn-theme btn-xs" title="3 topics">Business</a>
                        <a href="#" class="tag-link btn btn-theme btn-xs" title="3 topics">Media</a>
                        <a href="#" class="tag-link btn btn-theme btn-xs" title="3 topics">Photogtraphy</a>
                        <a href="#" class="tag-link btn btn-theme btn-xs" title="3 topics">Aid</a>
                        <a href="#" class="tag-link btn btn-theme btn-xs" title="3 topics">Fashion</a>
                        <a href="#" class="tag-link btn btn-theme btn-xs" title="3 topics">News</a>
                        <a href="#" class="tag-link btn btn-theme btn-xs" title="3 topics">Cars</a>
                        <a href="#" class="tag-link btn btn-theme btn-xs" title="3 topics">Global Affairs</a>
                        <a href="#" class="tag-link btn btn-theme btn-xs" title="3 topics">Music</a>
                        <a href="#" class="tag-link btn btn-theme btn-xs" title="3 topics">Downloads</a>
                        <a href="#" class="tag-link btn btn-theme btn-xs" title="3 topics">MP3</a>
                    </div>
                </div>
                <div class="widget about-us-widget mb50">
                    <h4 class="widget-title">About Kompleet</h4>
                    <p>Professionally monetize team building materials for 24/7 results. Holisticly transition corporate platforms vis-a-vis cutting-edge experiences. Dynamically strategize ubiquitous applications for premier initiatives. Interactively seize resource sucking niche markets.</p>
                </div>
            </div>
        </div>

</body>

</html>
