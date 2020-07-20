<?php

function post($title,$content,$posted){

    $db = GetDBConnection();

    $p = [
        'title'   => $title,
        'content' => $content,
        'writter' => $_SESSION['admin'],
        'posted'  => $posted
    ];

    $sql = "INSERT INTO posts(title,content,writter,date,posted) VALUES(:title,:content,:writter,NOW(),:posted)";

    $req = $db->prepare($sql);
    $req->execute($p);
    $req->closeCursor();
    $db = null;
}

function post_img($tmp_name, $extension){
    $db = GetDBConnection();
    $id = $db->lastInsertId();
    $i = [
        'id'    =>  $id,
        'image' =>  $id.$extension      //$id = 25 , $extension = .jpg      $id.$extension = "25".".jpg" = 25.jpg
    ];

    $sql = "UPDATE posts SET image = :image WHERE id = :id";
    $req = $db->prepare($sql);
    $req->execute($i);
    move_uploaded_file($tmp_name,"../img/posts/".$id.$extension);
    header("Location:index.php?page=post&id=".$id);
    $req->closeCursor();
    $db = null;
}