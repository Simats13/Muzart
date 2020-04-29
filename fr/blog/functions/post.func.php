<?php

    function get_post(){
        global $db;

        $req = $db->query("
            SELECT  posts.id, 
                    posts.title,
                    posts.image,
                    posts.content,
                    posts.date,
                    posts.category,
                    posts.tags,
                    admin.name
            FROM posts
            JOIN admin
            ON posts.writter = admin.email
            WHERE posts.id ='{$_GET['id']}'
            AND posts.posted = '1'


        ");

        $result = $req->fetchObject();
        return $result;
    }


    function comment($name, $email, $comment){
        global $db;

        $c = array(
            'name'   => $name,
            'email'  => $email,
            'comment'=> $comment,
            'post_id'=> $_GET["id"]
        );

        $sql = "INSERT INTO comments(name,email,comments,post_id,date) VALUES(:name, :email, :comment, :post_id, NOW())";
        $req = $db->prepare($sql);
        $req->execute($c);

    }


?>