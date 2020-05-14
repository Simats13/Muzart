<?php 
//PERTMET DE RECUPERER TOUS LES POSTS DANS LA BASE DE DONNÉES 
function get_posts(){
    //ACCEDE A LA BASE DE DONNÈES FICHIER MAIN FUNCTION
    global $db;

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
    //CREER UN TABLEAU
    $results = array();
    //MET LES RESULTATS DANS UN TABLEAU ET PARCOURT LE TABLEAU 
    while($rows = $req->fetchObject()){
        $results[]= $rows;
    }
    //AFFICHE LE TABLEAU
    return $results;

}




?>