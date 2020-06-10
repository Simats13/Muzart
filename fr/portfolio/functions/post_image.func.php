<?php

//Création de la fonction permettant d'obtenir les posts 
function get_picture(){
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
        ON image.writter = admin.email
        WHERE image.id='{$_GET['id']}'
        AND image.posted = '1'
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