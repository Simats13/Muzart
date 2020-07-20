<?php 

function get_posts(){

    $db = GetDBConnection();


    $req = $db->query("SELECT * FROM posts  ORDER BY date DESC");

    $results = [];

    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;
    $req->closeCursor();
    $db = null;

}





?>