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

function get_image(){

    $db = GetDBConnection();

    $req = $db->query("
        SELECT  images.id,
                images.name,
                images.work_id,
                portfolio.id
        FROM images
        JOIN portfolio
        WHERE images.work_id = portfolio.id
    ");

    $result = $req->fetchObject();
    return $result;
}





?>