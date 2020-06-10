<?php 

$post = get_post();

if($post == false){
    header("Location:index_image.php?page=error");
}

?>
</div>
<div class="parallax-container">
    <div class="parallax">
        <img src="../img/image/<?= $post->image?>" alt="<?= $post->title?>">
    </div>

</div>

<div class="container">

<?php 
if(isset($_POST['submit'])){
    $title = htmlspecialchars(trim($_POST['title']));
    $content = (trim($_POST['content']));
    $posted = isset($_POST['public']) ? "1" : "0";
    $errors = [];

    if(empty($title) || empty($content)){
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
        edit($title,$content,$posted,$_GET['id']);
        ?>
            <script>
                window.location.replace("index.php?page=post&id=<?= $_GET['id'] ?>");
            </script>
        <?php
    }


}


?>



    <form method="post">
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="title" id="title" value="<?= $post->title ?>">
                <label for="title">Titre de l'article</label>
            </div>
            <div class="input-field col s12">
                <textarea name="content" id="content" class="materialize-textarea"><?= nl2br($post->content) ?></textarea>
                <label for="content">Contenu de l'article</label>
            </div>
            <div class="col s6">
                <p>Public</p>
                <div class="switch">
                    <label>
                        Non
                        <input type="checkbox" name="public" <?php echo ($post->posted == "1")?"checked" : "" ?>/>
                        <span class="lever"></span>
                        Oui
                    </label>
                
                </div>
            
            </div>
        
        </div>
    
    <div class="col s6">
        <br><br>
        <button type="submit" class="btn" name="submit" >Modifier l'article</button>    
    
    </div>
    
    
    </form>
</div>
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