<?php 

function get_picture(){
    $db = GetDBConnection();

    $req = $db->query("

        SELECT  portfolio.id,
                portfolio.title,
                portfolio.date,
                portfolio.content,
                portfolio.category_id,
                portfolio.posted,
                portfolio.image,
                admin.name
        FROM portfolio
        JOIN admin
        ON portfolio.writter=admin.email
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

function category(){
    $db = GetDBConnection();
    $req = $db->query("
        SELECT  portfolio.id,
                portfolio.category_id,
                categories.id,
                categories.name
        FROM portfolio
        JOIN categories
        WHERE portfolio.category_id = categories.id
        
");

}