<?php

function get_portfolios(){
    $db = GetDBConnection();

    $req = $db->query("

        SELECT  portfolio.id,
                portfolio.title,
                portfolio.content,
                portfolio.writter,
                portfolio.date,
                portfolio.category,
                portfolio.image,
                admin.name
        FROM portfolio
        JOIN admin
        ON portfolio.writter=admin.email
        ORDER BY date DESC
        LIMIT 0,2
    
    ");

    $results = array();

    while($rows = $req->fetchObject()){
        $results[]= $rows;
    }

    return $results;
    $req->closeCursor();
    $db = null;

}

function get_videos(){
    $db = GetDBConnection();

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
        LIMIT 0,2
    
    ");

    $results = array();

    while($rows = $req->fetchObject()){
        $results[]= $rows;
    }

    return $results;
    $req->closeCursor();
    $db = null;

}

