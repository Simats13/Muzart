<?php

function post($title,$content,$posted){

    global $db;

    $p = [
        'title'   => $title,
        'content' => $content,
        'writter' => $_SESSION['admin'],
        'posted'  => $posted
    ];

    $sql = "INSERT INTO image(title,content,writter,date,posted) VALUES(:title,:content,:writter,NOW(),:posted)";

    $req = $db->prepare($sql);
    $req->execute($p);
}

function test($tmp_name, $extension){

    
            $messages = [];
            foreach($_FILES as $file){
                if($file['error'] == UPLOAD_ERR_NO_FILE){
                    continue;
                }
            
                global $db;
                $id = $db->lastInsertId();
                $i = [
                    'id'    =>  $id,
                    'image' =>  $file['name'].$id."_img",      //$id = 25 , $extension = .jpg      $id.$extension = "25".".jpg" = 25.jpg
                ];
            
                $sql = "UPDATE image SET image = :image WHERE id = :id";
                $req = $db->prepare($sql);
                $req->execute($i);

                $sql = "UPDATE image SET image1 = :image1 WHERE id = :id";
                $req = $db->prepare($sql);
                $req->execute($i);
            
                var_dump($file['tmp_name'].'=>'.$file['name']);
                $cheminDeDestination = '../img/posts/'.$file['name'].$id."_img";
                $cheminTemporaire = $file['tmp_name'];
                if(move_uploaded_file($cheminTemporaire,$cheminDeDestination)){
                    $messages['error']= 'Le fichier "'.$file['name'].'"a été correctement uploadé';
                }else{
                    $messages['error']= 'Le fichier "'.$file['name'].'n\' a été correctement uploadé';
                }
            
            }
            
            var_dump($messages);
            }