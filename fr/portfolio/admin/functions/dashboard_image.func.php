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
        SELECT  commentsPhoto.id,
                commentsPhoto.name,
                commentsPhoto.email,
                commentsPhoto.date,
                commentsPhoto.post_id,
                commentsPhoto.comments,
                portfolio.title
        FROM commentsPhoto
        JOIN portfolio
        ON commentsPhoto.post_id = portfolio.id
        WHERE commentsPhoto.seen ='0'
        ORDER BY commentsPhoto.date ASC
    
    ");

    $result =[];
    while($rows = $req->fetchObject()){
        $result[] = $rows;
    }

    return $result;
    $req->closeCursor();
    $db = null;
}

