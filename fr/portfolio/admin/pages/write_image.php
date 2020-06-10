
<h2>Poster des images</h2>

<?php

    if(isset($_POST['post'])){
        $title = htmlspecialchars(trim($_POST['title']));
        $content = (trim($_POST['content']));
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
        }if(!empty($_FILES['image1']['name'])){
            $file = $_FILES['image1']['name'];
            $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
            $extension = strrchr($file,'.');

            if(!in_array($extension,$extensions)){
                $errors['image1'] = "Cette image n'est pas valable";
            }
        }if(!empty($_FILES['image2']['name'])){
            $file = $_FILES['image2']['name'];
            $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
            $extension = strrchr($file,'.');

            if(!in_array($extension,$extensions)){
                $errors['image2'] = "Cette image n'est pas valable";
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
            post($title,$content,$posted);
            if(!empty($_FILES['image']['name']) || !empty($_FILES['image1']['name']) || !empty($_FILES['image2']['name']) ){
                if(isset($_FILES['image']['name'])){
                    test($_FILES['image']['tmp_name'],$extension);
                }elseif(isset($_FILES['image1']['name'])){
                    test1($_FILES['image1']['tmp_name'],$extension);
                }elseif(isset($_FILES['image2']['name'])){
                    test2($_FILES['image2']['tmp_name'],$extension);
                }
 
            }else{
                $id = $db->lastInsertId();
                
            }
        }
    }


?>


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
        <div class="col s12">
            <div class="input-field file-field">
                <div class="btn col s12">
                    <span>Image Général</span>
                    <input type="text" class="file-path col s10" readonly />
                    <input type="file" name="image" class="btn col s12" multiple/>
                    <br>
                </div>
            </div>
            
        </div>

        <div class="col s12">
            <div class="input-field file-field">
                <div class="btn col s12">
                    <span>Image 1</span>
                    <input type="text" class="file-path col s10" readonly />
                    <input type="file" name="image1" class="btn col s12" multiple/>
                    <br>
                </div>
            </div>
            
        </div>

        <div class="col s12">
            <div class="input-field file-field">
                <div class="btn col s12">
                    <span>Image 2</span>
                    <input type="text" class="file-path col s10" readonly />
                    <input type="file" name="image2" class="btn col s12" multiple/>
                    <br>
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