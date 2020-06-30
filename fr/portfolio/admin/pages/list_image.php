
<h2>Listing des articles</h2>
<hr/>

<?php

$posts = get_images();
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
                    <img src="../img/posts/<?= $post->image ?>" class="materialboxed responsive-img" alt="<?= $post->title ?>"/>
                    <br/><br/>
                    <a class="btn light-blue waves-effect waves-light" href="?page=post_image&id=<?= $post->id ?>">Lire l'article complet</a>
                    <td><a href="?page=post_image&id=<?=$post->id ?>&delete=<?=$post->id ?>" id="<?=$post->id ?>" name="<?=$post->id?>" class="btn-floating btn-small waves-effect waves-light red delete_comment"><i class="material-icons">delete</i></a></td>
                </div>
            </div>
        </div>
    </div>

    <?php
}