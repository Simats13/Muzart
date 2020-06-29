<?php 

function get_images(){

    $db = GetDBconnection();

    $req = $db->query("SELECT * FROM portfolio  ORDER BY date DESC");

    $results = [];

    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;

}





?>