<?php

function inTable($table){
    $db = GetDBConnection();
    $query = $db->query("SELECT COUNT(id) FROM $table");
    return $nombre = $query->fetch();
}

function getColor($table,$colors){
    if(isset($colors[$table])){
        return $colors[$table];
    }else{
        return "orange";
    }    


}

function get_comments(){
    $db = GetDBConnection();

    $req = $db->query("
        SELECT  commentsVideo.id,
                commentsVideo.name,
                commentsVideo.email,
                commentsVideo.date,
                commentsVideo.post_id,
                commentsVideo.comments,
                posts.title
        FROM commentsVideo
        JOIN posts
        ON commentsVideo.post_id = posts.id
        WHERE commentsVideo.seen ='0'
        ORDER BY commentsVideo.date ASC
    
    ");

    $result =[];
    while($rows = $req->fetchObject()){
        $result[] = $rows;
    }

    return $result;
}

