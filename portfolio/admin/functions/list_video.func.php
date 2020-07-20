<?php 

function get_videos(){

    $db = GetDBConnection();

    $req = $db->query("SELECT * FROM video  ORDER BY date DESC");

    $results = [];

    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;

}





?>