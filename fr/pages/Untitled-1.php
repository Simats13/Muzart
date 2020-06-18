    <?    
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




/**
* La sauvegarde
**/
if(isset($_POST['submit'])){

        $category_id = $db->quote($_POST['category_id']);
        $content = $db->quote($_POST['content']);
        $title = $db->quote($_POST['title']);
        $posted = isset($_POST['public']) ? "1" : "0";

        $errors = [];

        if(empty($title) || empty($content)){
            $errors['empty'] = "Veuillez remplir tous les champs";
        }

        if(!empty($_FILES['images']['name'])){
            $file = $_FILES['images']['name'];
            $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
            $extension = strrchr($file,'.');

            if(!in_array($extension,$extensions)){
                $errors['images'] = "Cette image n'est pas valable";
            }
        }
             /**
            * SAUVEGARDE de la réalisation
            **/

            post($title,$content,$posted,$category_id);
        

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
                $db->query("INSERT INTO image SET image_id=$work_id");
                $image_id = $db->lastInsertId();
                $image_name = $image_id . '.' . $extension;
                move_uploaded_file($image['tmp_name'], IMAGES . '/posts/' . $image_name);
                $image_name = $db->quote($image_name);
                $db->query("UPDATE image SET name=$image_name WHERE id = $image_id");
            }
        }
        



    
}