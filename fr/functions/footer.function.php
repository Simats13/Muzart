<?php

//Création de la fonction permettant d'obtenir les posts 
    function get_post(){
        global $db;

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
            WHERE posts.id ='{$_GET['id']}'
            AND posts.posted = '1'


        ");

        $result = $req->fetchObject();
        return $result;
    }