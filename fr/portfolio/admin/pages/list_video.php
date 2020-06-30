
<h2>Listing des vidéos</h2>
<hr/>

<?php

$posts = get_videos();
foreach($posts as $post){
    ?>
    <div class="row">
        <div class="col s12">
            <h4><?= $post->title ?><?php echo ($post->posted == "0") ? "<i class='material-icons'>lock</i>" : "" ?></h4>

            <div class="row">
                <div class="col s12 m6 l8">
                    <?= htmlspecialchars(substr(nl2br($post->content),0,1200)) ?>...
                </div>
                <div class="col s12 m6 l4">
                        <figure class="media"><oembed url="<?= $post->image?>"></oembed></figure>
                    <br/><br/>
                    <a class="btn light-blue waves-effect waves-light" href="index_video.php?page=post_video&id=<?= $post->id ?>">Lire l'article complet</a>
                </div>
            </div>
        </div>
    </div>

    <?php
}?>

<script charset="utf-8" src="//cdn.iframe.ly/embed.js?api_key=9867fe0fb5b91b3ddca9ba"></script>
    <script>
        document.querySelectorAll( 'oembed[url]' ).forEach( element => {
            iframely.load( element, element.attributes.url.value );
        } );
    </script>

