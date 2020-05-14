<?php 

$post = get_post();
if($post == false){
    header("Location:index.php?page=error");
}else{
    ?>
        <section class="dark-wrapper opaqued parallax" data-parallax="scroll" data-image-src="img/posts/<?= $post->image ?>"
            data-speed="0.7">
            <div class="section-inner text-center">
        <div class="container" style="margin-top:100px;">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 mt30 wow">
                    <h2 class="section-heading"><?= $post->title?></h2>
                    <div class="item-metas text-muted mb30 white">
                        <span class="meta-item"><i class="pe-icon pe-7s-user"></i> Auteur
                            <span><?= $post->name ?></span></span>
                        <span class="meta-item"><i class="pe-icon pe-7s-comment"></i> Commentaires <span>3</span></span>
                        <span class="meta-item post-date"><i class="pe-icon pe-7s-clock"></i> Publié le
                            <span><?= date("d/m/Y à H:i",strtotime($post->date)); ?></span></span>
                    </div>
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
                                            <span class="heading-font"><?= $response->name ?></span><small><?= date("d/m/Y à H:i",strtotime($response->date)); ?></small>
                                        </div>
                                        <p><?= nl2br($response->comments) ?></p>

                                    </div>
                                </div>
                            </div>
                        </blockquote>
                        <?php
                                    }
                                }else{
                                        echo "Aucun commentaire n'a été publié... Soyez le premier !";
                                
                                    } 
                                ?>

                        <div id="comments-form" class="row wow">
                            <div class="col-md-12">
                                <div class="mt60 mb50 single-section-title">
                                    <h3>Laisser un commentaire</h3>
             <?php
                if(isset($_POST['submit'])){
                    $name = htmlspecialchars(trim($_POST['name']));
                    $email = htmlspecialchars(trim($_POST['email']));
                    $comment = htmlspecialchars(trim($_POST['comment']));
                    $errors = [];

                    if(empty($name) || empty($email) || empty($comment)){
                        $errors['empty'] = "Tous les champs n'ont pas été remplis";
                    }else{
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $errors['email'] = "L'adresse email n'est pas valide";
                        }
                    }


                    if(!empty($errors)){
                        ?>
                            <div class="card red">
                                <div class="card-content white-text">
                                    <?php
                                        foreach($errors as $error){
                                            echo $error."<br/>";
                                        }
                                    ?>
                                </div>
                            </div>
                        <?php
                    }else{
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
                                <form method="post" id="commentform" class="comment-form" >
                                    <input type="text" class="form-control col-md-4" name="name" id="name"
                                        placeholder="Votre Nom *" required
                                        data-validation-required-message="Veuillez entrer votre Nom !" />
                                    <label for="name"></label>
                                    <input type="text" class="form-control col-md-4" name="email" id="email"
                                        placeholder="Votre Email *" required
                                        data-validation-required-message="Veuillez entrer votre adresse Email ! !" />
                                    <label for="email"></label>
                                    <textarea class="form-control" id="comment" name="comment"
                                        placeholder="Votre Message *" required
                                        data-validation-required-message="Veuillez entrer votre Message !"></textarea>
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
<?php
}
?>

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