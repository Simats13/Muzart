<?php

function inTable($table){
    $db = GetDBConnection();

    $query = $db->query("SELECT COUNT(id) FROM $table");
    return $nombre = $query->fetch();

    $query->closeCursor();
    $db = null;
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
        SELECT  comments.id,
                comments.name,
                comments.email,
                comments.date,
                comments.post_id,
                comments.comments,
                posts.title
        FROM comments
        JOIN posts
        ON comments.post_id = posts.id
        WHERE comments.seen ='0'
        ORDER BY comments.date ASC
    
    ");

    $result =[];
    while($rows = $req->fetchObject()){
        $result[] = $rows;
    }

    return $result;
    $req->closeCursor();
    $db = null;
}

//Création de la fonction permettant d'obtenir les posts 
function get_post(){
    $db = GetDBConnection();


    $req = $db->query("
        SELECT  admin.name
        FROM admin
    
    ");

    $result = $req->fetchObject();
    return $result;

    $req->closeCursor();
    $db = null;
}