<?php

//Création de la fonction permettant d'obtenir les vidéos 
function get_video(){
    $db = GetDBConnection();

    $req = $db->query("
        SELECT  video.id,
                video.title,
                video.image,
                video.content,
                video.category,
                video.date,
                admin.name
        FROM video
        JOIN admin
        ON video.writter = admin.email
        WHERE video.id='{$_GET['id']}'
        AND video.posted = '1'
    ");

    $result = $req->fetchObject();
    return $result;

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

    }
    
    function get_comments(){

        $db = GetDBConnection();
        $req = $db->query("SELECT * FROM comments WHERE post_id = '{$_GET['id']}' ORDER BY date DESC");
        $results = [];
        while($rows = $req->fetchObject()){
            $results[] = $rows;
        }
    
        return $results;
    
    
    }

?>