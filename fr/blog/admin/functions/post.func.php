<?php

function get_post(){

    $db = GetDBConnection();


    $req = $db->query("
        SELECT  posts.id,
                posts.title,
                posts.image,
                posts.date,
                posts.content,
                posts.posted,
                admin.name
        FROM posts
        JOIN admin
        ON posts.writter = admin.email
        WHERE posts.id = '{$_GET['id']}'
    ");

    $result = $req->fetchObject();
    return $result;
    $req->closeCursor();
    $db = null;
}

function edit($title,$content,$posted,$id){

    $db = GetDBConnection();


    $e = [
        'title'     => $title,
        'content'   => $content,
        'posted'    => $posted,
        'id'        => $id
    ];

    $sql = "UPDATE posts SET title=:title, content=:content, date=NOW(), posted=:posted WHERE id=:id";
    $req = $db->prepare($sql);
    $req->execute($e);
    $req->closeCursor();
    $db = null;

}