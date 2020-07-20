<?php

function is_modo($email,$token){
    $db = GetDBConnection();

    $a = [
        'email' =>  $email,
        'token' =>  $token
    ];
    $sql = "SELECT * FROM admin WHERE email=:email AND token=:token";
    $req= $db->prepare($sql);
    $req->execute($a);
    return $req->rowCount($sql);
    $req->closeCursor();
    $db = null;
}