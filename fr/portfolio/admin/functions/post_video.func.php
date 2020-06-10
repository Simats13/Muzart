<?php

function get_post(){

    global $db;

    $req = $db->query("
        SELECT  video.id,
                video.title,
                video.image,
                video.date,
                video.content,
                video.posted,
                admin.name
        FROM video
        JOIN admin
        ON video.writter = admin.email
        WHERE video.id = '{$_GET['id']}'
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

    $sql = "UPDATE video SET title=:title, content=:content, date=NOW(), posted=:posted WHERE id=:id";
    $req = $db->prepare($sql);
    $req->execute($e);

}