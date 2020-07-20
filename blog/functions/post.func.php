<?php

//Création de la fonction permettant d'obtenir les posts 
function get_post(){
    $db = GetDBConnection();
    

    $req = $db->query("
        SELECT  posts.id,
                posts.title,
                posts.image,
                posts.content,
                posts.date,
                admin.name
        FROM posts
        JOIN admin
        ON posts.writter = admin.email
        WHERE posts.id='{$_GET['id']}'
        AND posts.posted = '1'
    ");

    $result = $req->fetchObject();
    return $result;
    $req->closeCursor();
    $db = null;


}

//Création de la fonction permettant d'obtenir les commentaires 
    function comment($name, $email, $comment){
        $db = GetDBConnection();
    

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
        $req->closeCursor();
        $db = null;
    }
    
    function get_comments(){

        $db = GetDBConnection();
    
        $req = $db->query("SELECT * FROM comments WHERE post_id = '{$_GET['id']}' ORDER BY date DESC");
        $results = [];
        while($rows = $req->fetchObject()){
            $results[] = $rows;
        }
    
        return $results;
        $req->closeCursor();
        $db = null;
    
    }

?>