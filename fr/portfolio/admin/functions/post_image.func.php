<?php

function get_post(){

    global $db;

    $req = $db->query("
        SELECT  image.id,
                image.title,
                image.image,
                image.date,
                image.content,
                image.posted,
                admin.name
        FROM image
        JOIN admin
        ON image.writter = admin.email
        WHERE image.id = '{$_GET['id']}'
    ");

    $result = $req->fetchObject();
    return $result;
}

function edit($title,$content,$posted,$id){

    global $db;

    $e = [
        'title'     => $title,
        'content'   => $content,
        'posted'    => $posted,
        'id'        => $id
    ];

    $sql = "UPDATE image SET title=:title, content=:content, date=NOW(), posted=:posted WHERE id=:id";
    $req = $db->prepare($sql);
    $req->execute($e);

}