<?php 

function get_videos(){

    global $db;

    $req = $db->query("SELECT * FROM video  ORDER BY date DESC");

    $results = [];

    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;

}





?>