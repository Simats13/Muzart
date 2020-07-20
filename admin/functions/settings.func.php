<?php
function email_taken($email){
    $db = GetDBConnection();

    $e = ['email' => $email];
    $sql = "SELECT * FROM admin WHERE email =:email";
    $req = $db->prepare($sql);
    $req->execute($e);
    $free= $req->rowCount($sql);

    return $free;
    $req = closeCursor();
    $db = null;
}

function token($length){
    $chars = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN1234567890";
    return substr(str_shuffle(str_repeat($chars,$length)),0,$length);
}

function add_modo($name,$email,$role,$token){
    $db = GetDBConnection();


    $m= [
        'name'      =>  $name,
        'email'     =>  $email,
        'token'     =>  $token,
        'role'      =>  $role
    ];

    $sql = "INSERT INTO admin(name,email,token,role) VALUES(:name,:email,:token,:role)";
    $req = $db->prepare($sql);
    $req->execute($m);


}

function get_modos(){
    $db = GetDBConnection();

    $req = $db->query("
        SELECT * FROM admin
    
    ");

    $results = [];
     while ($rows = $req->fetchObject()){
         $results[] = $rows;
     }
     return $results;
     $req->closeCursor();
     $db = null;
}