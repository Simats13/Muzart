<?php

function get_post(){

    $db = GetDBConnection();

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

function edit($title,$content,$link,$posted,$id){

    $db = GetDBConnection();

    $e = [
        'title'     => $title,
        'content'   => $content,
        'link'      => $link,
        'posted'    => $posted,
        'id'        => $id
    ];

    $sql = "UPDATE video SET title=:title, content=:content,image=:link, date=NOW(), posted=:posted WHERE id=:id";
    $req = $db->prepare($sql);
    $req->execute($e);

}