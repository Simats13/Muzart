<?php 

function get_posts(){
    $db = GetDBConnection();


    $req = $db->query("

        SELECT  posts.id,
                posts.title,
                posts.image,
                posts.date,
                posts.content,
                admin.name
        FROM posts
        JOIN admin
        ON posts.writter=admin.email
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




?>