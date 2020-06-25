<?php

function inTable($table){
    $db = GetDBConnection();
    $query = $db->query("SELECT COUNT(id) FROM $table");
    return $nombre = $query->fetch();
    $req->closeCursor();
    $db = null;
}

function getColor($table,$colors){
    if(isset($colors[$table])){
        return $colors[$table];
    }else{
        return "orange";
    }    


}

function get_contacts(){

    $db = GetDBConnection();

    $req = $db->query("
        SELECT  contacts.id,
                contacts.name,
                contacts.email,
                contacts.message,
                contacts.date
        FROM contacts
    
    ");

    $result =[];
    while($rows = $req->fetchObject()){
        $result[] = $rows;
    }

    return $result;
    $req->closeCursor();
    $db = null;
}

function get_admin(){
    $db = GetDBConnection();

    $req = $db->query("
        SELECT  admin.id,
                admin.name,
                admin.email

        FROM admin
        WHERE admin.email = {$_SESSION['admin']}
    
    ");

    $result =[];
    while($rows = $req->fetchObject()){
        $result[] = $rows;
    }

    return $result;
    $req->closeCursor();
    $db = null;

}