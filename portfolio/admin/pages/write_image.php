
<h2>Poster des images</h2>

<?php
$db = GetDBConnection();

if(isset($_POST['post']) ){
    var_dump($_POST);
    
    $title = $_POST['name'];
    $category_id = $_POST['category_id'];
    var_dump($_POST['category_id']);
    $content = $_POST['content'];
    $posted = isset($_POST['public']) ? "1" : "0";
    $errors = [];

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

 
 
    
    
    
        /**
        * SAUVEGARDE de la réalisation
        **/

        $p = [
            'title'   => $title,
            'content' => $content,
            'writter' => $_SESSION['admin'],
            'category_id' => $category_id,
            'posted'  => $posted
        ];
    
        $sql = "INSERT INTO portfolio(title,content,writter,date,category_id,posted) VALUES(:title,:content,:writter,NOW(),:category_id,:posted)";
    
        $req = $db->prepare($sql);
        $req->execute($p);
        $_GET['id'] = $db->lastInsertId();
        $id = $db->lastInsertId();

        if(!empty($_FILES['image']['name'])){
            

           
            $fichier = $_FILES['image'];
            
            $pictures = array();
            $picture = array(
                'name' => $fichier['name'],
                'tmp_name' => $fichier['tmp_name']
            );
    
             $extension = pathinfo($picture['name'], PATHINFO_EXTENSION);
            if(in_array($extension, array('jpg','png','jpeg','JPG','PNG','JPEG',))){
                $image_id = $db->lastInsertId();
                $image_name = "Head_".$image_id . '.' . $extension;
                move_uploaded_file($picture['tmp_name'], '../img/posts/' . $image_name);
                $db->query("UPDATE portfolio SET image='$image_name' WHERE id = '$image_id' ");
            }
        }

        /**
        * ENVOIS DES IMAGES
        **/
        $work_id = $_GET['id'];
        $files = $_FILES['images'];
        $images = array();

        foreach($files['tmp_name'] as $k => $v){
            $image = array(
                'name' => $files['name'][$k],
                'tmp_name' => $files['tmp_name'][$k]
            );
            $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
            if(in_array($extension, array('jpg','png','jpeg','JPG','PNG','JPEG'))){
                $db->query("INSERT INTO images SET work_id=$work_id");
                $image_id = $db->lastInsertId();
                $image_name = $image_id . '.' . $extension;
                move_uploaded_file($image['tmp_name'], '../img/posts/' . $image_name);
                $image_name = $db->quote($image_name);
                $db->query("UPDATE images SET name=$image_name WHERE id = $image_id");
            }
        }

        
        header("Location:?page=list_image");
        die();



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
        
            <div class="form-group">
                <label for="name">Nom de la réalisation</label>
                <?= input('name'); ?>
            </div>

            <div class="form-group">
                <label for="content">Contenu de la réalisation</label>
                <?= textarea('content'); ?>
            </div>

        <div class="form-group input-field col s12">
                <?= select('category_id', $categories_list); ?>
                <label for="category_id">Catégorie</label>
        </div>
        




        <div class="col-sm-4">

            <div class="form-group">
            <br>
            
                <input type="file" name="images[]">
                <input type="file" name="images[]" class="hide" id="duplicate">
            </div>
            <p>
                <a href="#" class="btn btn-success" id="duplicatebtn">Ajouter une image</a>
            </p>
        
        </div>

        <div class="col s12">
            <div class="input-field file-field">
                <div class="btn col s12">
                    <span>Image de l'article</span>
                    <input type="text" class="file-path col s10" readonly />
                    <input type="file" name="image" class="btn col s12" />
                </div>
            </div>
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