<?php 

function get_images(){
    global $db;

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
        LIMIT 0,4
    
    ");

    $results = array();

    while($rows = $req->fetchObject()){
        $results[]= $rows;
    }

    return $results;

}

function get_videos(){
    global $db;

    $req = $db->query("

        SELECT  
                video.id,
                video.title,
                video.content,
                video.writter,
                video.image,
                video.category,
                video.date,
                video.posted,
                admin.name
        FROM video
        JOIN admin
        ON video.writter=admin.email
        WHERE posted='1'
        ORDER BY date DESC
        LIMIT 0,5
    
    ");

    $results = array();

    while($rows = $req->fetchObject()){
        $results[]= $rows;
    }

    return $results;

}



?>
               