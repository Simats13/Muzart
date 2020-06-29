<?php

    $db = GetDBConnection();
    $post = get_post();
    if(isset($_POST['submit'])){

   
            $name = $db->quote($_POST['name']);
            $category_id = $db->quote($_POST['category_id']);
            $content = $db->quote($_POST['content']);
            $posted = isset($_POST['public']) ? "1" : "0";
    
            /**
            * SAUVEGARDE de la réalisation
            **/
            if(isset($_GET['id'])){
                $id = $db->quote($_GET['id']);
                $db->query("UPDATE portfolio SET title=$name, content=$content, category_id=$category_id, posted = $posted WHERE id=$id");
            }
            

        /**
        * ENVOIS DES IMAGES
        **/
        $work_id = $db->quote($_GET['id']);
        $files = $_FILES['images'];
        $images = array();

        foreach($files['tmp_name'] as $k => $v){
            $image = array(
                'name' => $files['name'][$k],
                'tmp_name' => $files['tmp_name'][$k]
            );
            $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
            if(in_array($extension, array('jpg','png'))){
                $db->query("INSERT INTO images SET work_id=$work_id");
                $image_id = $db->lastInsertId();
                $image_name = $image_id . '.' . $extension;
                move_uploaded_file($image['tmp_name'], '../img/posts/' . $image_name);
                resizeImage('../img/posts/' . $image_name, 300,300);
                $image_name = $db->quote($image_name);
                $db->query("UPDATE images SET name=$image_name WHERE id = $image_id");
            }
        }

        $id = $db->lastInsertId();
        header('Location:?page=post_image&id=' . $post->id );
        die();


    }


    //SUPPRESION DE L'IMAGE
    if(isset($_GET['delete_image'])){
        $id = $db->quote($_GET['delete_image']);
        $select = $db->query("SELECT name, work_id FROM images WHERE id=$id");
        $image = $select->fetch();
        $images=glob('../img/posts/' . pathinfo($image['name'], PATHINFO_FILENAME) . '_*x*.*');
        if(is_array($images)){
            foreach($images as $v){
                unlink($v);
            }
        }
        unlink('../img/posts/' . $image['name']);
        $db->query("DELETE FROM images WHERE id=$id");
        
        header('Location:?page=post_image&id=' . $image['work_id']);
        die();
    }

    //récupère une réalisation 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $select = $db->query("SELECT * FROM portfolio WHERE id=$id");
        if($select->rowCount() == 0){
            $errors = "Il n'y a pas de réalisation avec cet ID" ;
            header('Location:?page=post_image&id=' . $image['work_id']);
            die();
        }
        $_POST = $select->fetch();

    }

    /**
     * RECUPERATION DES CATEGORIES
     */
    $select = $db ->query('SELECT id, name FROM categories ORDER BY name ASC');
    $categories = $select->fetchAll();
    $categories_list = [];
    foreach($categories as $category){
        $categories_list[$category['id']] = $category['name'];
    }

    /**
     * RECUPERATION DES IMAGES
     */

        if(isset($_GET['id'])){
            $work_id = $db->quote($_GET['id']);
            $select = $db ->query("SELECT id, name FROM images WHERE work_id = $work_id");
            $images = $select->fetchAll();
        }else{
            $images = [];
        }



    ?>




    <h1>Editer une réalisation</h1>
    </div>
<div class="parallax-container">
    <div class="parallax">
        <img src="../img/posts/<?= $post->image?>" alt="<?= $post->title?>">
    
    
    </div>

</div>

<div class="container">
    <div class="row">
        <form  method="post" enctype="multipart/form-data">
        <div class="col-sm-8">
                <div class="form-group">
                    <label for="name">Nom de la réalisation</label>
                    <input type='text' class='form-control' id="name" name="name" value='<?=$post->title?>'>
                </div>
                <div class="form-group">
                    <label for="content">Contenu de la réalisation</label>
                    <textarea type='text' class='form-control' id="content" name='content'><?=$post->content?></textarea>
                </div>
                <div class="form-group">
                    <label for="category_id">Catégorie</label>
                    <?= select('category_id', $categories_list); ?>
                </div>
                
        </div>

        <div class="col-sm-4">
            <?php foreach ($images as $k => $image): ?>
                <p>
                    <img src="../img/posts/<?= $image['name']; ?>" width="100"><a href="?page=post_image&id=<?= $_GET['id'] ?>&delete_image=<?= $image['id']; ?>" onclick="return confirm('Voulez-vous supprimer la photographie  ?');">Supprimer</a>
                </p>
            <?php endforeach ?>

            <div class="form-group">
                <input type="file" name="images[]">
                <input type="file" name="images[]" class="hide" id="duplicate">
            </div>
            <p>
                <a href="" class="btn btn-success" id="duplicatebtn">Ajouter une image</a>
            </p>
        </div>
        <br>
        <br>
            <button type="submit" name="submit" class="btn btn-default">Enregistrer</button>
        </form>

    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
    (function($){

        $('#duplicatebtn').click(function(e){
            e.preventDefault();
            var $clone = $('#duplicate').clone().attr('id', '').removeClass('hide');
            $('#duplicate').before($clone);
        })


    })(jQuery);
    </script>
    <script src="js/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
    <script>ClassicEditor
                .create( document.querySelector( 'textarea' ), {
                    ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
            },
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            'bulletedList',
                            'numberedList',
                            '|',
                            'alignment',
                            '|',
                            'imageUpload',
                            'CKFinder',
                            'mediaEmbed',
                            'blockQuote',
                            'insertTable',
                            'undo',
                            'redo'
                        ]
                    },
                    language: 'fr',
                    image: {
                        toolbar: [
                            'imageTextAlternative',
                            'imageStyle:full',
                            'imageStyle:side'
                        ]
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells'
                        ]
                    },
                    licenseKey: '',
                    
                } )
                .then( editor => {
                    window.editor = editor;
            
                    
                    
                    
                } )
                .catch( error => {
                    console.error( 'Oops, something gone wrong!' );
                    console.error( 'Please, report the following error in the https://github.com/ckeditor/ckeditor5 with the build id and the error stack trace:' );
                    console.warn( 'Build id: qz6rkagi0aab-bp5m2v61d1t' );
                    console.error( error );
                } );
        </script>