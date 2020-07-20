<?php 

function get_images(){

    global $db;

    $req = $db->query("SELECT * FROM image  ORDER BY date DESC");

    $results = [];

    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;

}





?>