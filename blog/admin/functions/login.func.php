<?php

function is_admin($email,$password){
    $db = GetDBConnection();


    $a = [
        'email' => $email,
        'password' => sha1($password)
    ];

    $sql = "SELECT * FROM admin WHERE email = :email AND password = :password";

    $req = $db->prepare($sql);
    $req->execute($a);
    $exist = $req->rowCount($sql);
    return $exist;

    $req->closeCursor();
    $db = null;
}




?>