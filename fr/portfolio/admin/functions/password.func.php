<?php
function update_password($password){
    global $db;

    $p = [

        'password' => sha1($password)
    ];

    $sql = "UPDATE admin SET password=:password WHERE email='{$_SESSION['admin']}'";
    $req = $db->prepare($sql);
    $req->execute($p);
}
