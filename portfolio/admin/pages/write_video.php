
<h2>Poster une vidéo</h2>

<?php
    $db = GetDBConnection();
    if(isset($_POST['post'])){
        $title = htmlspecialchars(trim($_POST['title']));
        $content = (trim($_POST['content']));
        $link = htmlspecialchars(trim($_POST['link']));
        $posted = isset($_POST['public']) ? "1" : "0";

        $errors = [];

        if(empty($title) || empty($content) || empty($link)){
            $errors['empty'] = "Veuillez remplir tous les champs";
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
            post($title,$content,$link,$posted);
            $id = $db->lastInsertId();
            header("Location:index_video.php?page=post_video&id=".$id);
            }
        }
    


?>


<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col s12">
            <input type="text" name="title" id="title" />
            <label for="title">Titre de la vidéo</label>
        </div>

        <div class="input-field col s12">
            <textarea name="content" id="content" class="materialize-textarea" placeholder="Contenu de l'article"></textarea>
            <label for="content"></label>
        </div>

        <div class="input-field col s12">
            <input type="text" name="link" id="link" />
            <label for="title">Lien de la vidéo</label>
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