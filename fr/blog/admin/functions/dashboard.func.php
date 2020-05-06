<?php

function inTable($table){
    global $db;
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
    global $db;

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
}

//Création de la fonction permettant d'obtenir les posts 
function get_post(){
    global $db;

    $req = $db->query("
        SELECT  admin.name
        FROM admin
    
    ");

    $result = $req->fetchObject();
    return $result;
}