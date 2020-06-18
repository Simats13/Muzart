
<h2>Poster des images</h2>

<?php


if(isset($_POST['post'])){
    //RECUPERE LES VARIABLES
    $title = htmlspecialchars(trim($_POST['title']));
    $content = (trim($_POST['content']));
    $category_id = $db->quote($_POST['category_id']);
    $posted = isset($_POST['public']) ? "1" : "0";

    $errors = [];

//AFFICHE LES ERREURS 
    if(empty($title) || empty($content)){
        $errors['empty'] = "Veuillez remplir tous les champs";
    }

    if(!empty($_FILES['image']['name'])){
        $file = $_FILES['image']['name'];
        $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
        $extension = strrchr($file,'.');

        if(!in_array($extension,$extensions)){
            $errors['image'] = "Cette image n'est pas valable";
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
        post($title,$content,$category_id,$posted);
        if(!empty($_FILES['images']['name'])){
                        /**
            * ENVOIS DES IMAGES
            **/
            $work_id = $db->lastInsertId();
            $files = $_FILES['images'];
            $images = array();

            foreach($files['tmp_name'] as $k => $v){
                $image = array(
                    'name' => $files['name'][$k],
                    'tmp_name' => $files['tmp_name'][$k]
                );

                $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
                if(in_array($extension, array('jpg','png'))){
                    $db->query("INSERT INTO image SET image_id=$work_id");
                    $image_id = $db->lastInsertId();
                    $image_name = $image_id . '.' . $extension;
                    move_uploaded_file($image['tmp_name'],'../img/posts/' . $image_name);
                    $image_name = $db->quote($image_name);
                    $db->query("UPDATE image SET name=$image_name WHERE id = $image_id");
                }
            }
        }else{
            $id = $db->lastInsertId();
            header("Location:index.php?page=post&id=".$id);
        }
    }
}

       /**
        * On récup la liste des catégories
        **/
        $select = $db->query('SELECT id, name FROM categories ORDER BY name ASC');
        $categories = $select->fetchAll();
        $categories_list = array();
        $images = array();
        foreach($categories as $category){
            $categories_list[$category['id']] = $category['name'];
        }


?>

<?php

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

    <?php  } ?>


<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col s12">
            <input type="text" name="title" id="title" />
            <label for="title">Titre de l'article</label>
        </div>

        <div class="input-field col s12">
            <textarea name="content" id="content" class="materialize-textarea" placeholder="Contenu de l'article"></textarea>
            <label for="content"></label>
        </div>

        <div class="form-group input-field col s12">
                <?= select('category_id', $categories_list); ?>
                <label for="category_id">Catégorie</label>
        </div>


        <div class="col-sm-4">

        <div class="form-group">
            <input type="file" name="images[]">
            <table class="table table-bordered" id="dynamic_field"></table>
        </div>
        <p>
            <button type="button" name="add" id="add" class="btn btn-success">Ajouter des images</button>
        </p>
    </div>

        <div class="col s6">
            <p>Public</p>
            <div class="switch">
                <label>
                    Non
                    <input type="checkbox" name="public" />
                    <span class="lever"></span>
                    Oui
                </label>
            </div>
        </div>

            <div class="col s6 right-align">
                <br /><br />
                <button class="btn" type="submit" name="post">Publier</button>
            </div>

    </div>



</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
        $(document).ready(function(){
            var i = 1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td><div class="input-field col s12"><input type="file" name="images[]" class="hidden" id="duplicate"></div></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $("#row"+button_id+"").remove();
            });

            $('#submit').click(function(){
                $.ajax({
                    async: true,
                    url: "#",
                    method: "POST",
                    data: $('#party').serialize(),
                    success:function(rt)
                    {
                        alert(rt);
                        $('#party')[0].reset();
                    }
                });
            });
        });
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