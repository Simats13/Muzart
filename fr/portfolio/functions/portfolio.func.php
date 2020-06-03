<?php

//Création de la fonction permettant d'obtenir les posts 
function get_picture(){
    global $db;

    $req = $db->query("
        SELECT  portolio.id,
                portolio.title,
                portolio.comment,
                portolio.writter,
                portolio.image,
                portolio.catégorie,
                portolio.date,
                portolio.posted,        
                admin.name
        FROM posts
        JOIN admin
        ON portfolio.writter = admin.email
        WHERE portfolio.id='{$_GET['id']}'
        AND portfolio.posted = '1'
    ");

    $result = $req->fetchObject();
    return $result;

}

//Création de la fonction permettant d'obtenir les commentaires 
function comment($name, $email, $comment){
    global $db;

    $c = array(
        'name'   => $name,
        'email'  => $email,
        'comment'=> $comment,
        'post_id'=> $_GET["id"]
    );
//Insére les commentaires dans la table COMMENTS
    $sql = "INSERT INTO comments(name,email,comments,post_id,date) VALUES(:name, :email, :comment, :post_id, NOW())";
    $req = $db->prepare($sql);
    $req->execute($c);

}

function get_comments(){

    global $db;
    $req = $db->query("SELECT * FROM comments WHERE post_id = '{$_GET['id']}' ORDER BY date DESC");
    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;


}

?>