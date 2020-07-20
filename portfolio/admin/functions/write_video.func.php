<?php

function post($title,$content,$link,$posted){

    $db = GetDBConnection();

    $p = [
        'title'   => $title,
        'content' => $content,
        'link'    => $link,
        'writter' => $_SESSION['admin'],
        'posted'  => $posted
    ];

    $sql = "INSERT INTO video(title,content,writter,image,date,posted) VALUES(:title,:content,:writter,:link,NOW(),:posted)";

    $req = $db->prepare($sql);
    $req->execute($p);
}
