<?php 

function get_picture(){
    $db = GetDBConnection();

    $req = $db->query("

        SELECT  image.id,
                image.title,
                image.content,
                image.writter,
                image.image,
                image.category,
                image.date,
                image.posted,
                admin.name
        FROM image
        JOIN admin
        ON image.writter=admin.email
        WHERE posted='1'
        ORDER BY date DESC
        LIMIT 0,9
    
    ");

    $results = array();

    while($rows = $req->fetchObject()){
        $results[]= $rows;
    }

    return $results;

}