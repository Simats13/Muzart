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
        LIMIT 0,100
    
    ");

    $results = array();

    while($rows = $req->fetchObject()){
        $results[]= $rows;
    }

    return $results;
    $req->closeCursor();
    $db = null;

}

