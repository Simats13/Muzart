<?php
function recevoir($name,$email,$message){
    $db = GetDBConnection();

    $p = [
        'name'   => $name,
        'email' => $email,
        'message'  => $message,
    ];

    $sql = "INSERT INTO contacts(name, email, message,date) VALUES (:name,:email,:message,NOW())" ;
    $req = $db->prepare($sql);
    $req->execute($p);
    $req->closeCursor();
    $db=null;
}

?>