<?php

function inTable($table){
    global $db;
    $query = $db->query("SELECT COUNT(id) FROM $table");
    return $nombre = $query->fetch();
}

function getColor($table,$colors){
    if(isset($colors[$table])){
        return $colors[$table];
    }else{
        return "orange";
    }    


}

function get_contacts(){
    global $db;

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
}

function get_admin(){
    global $db;

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

}