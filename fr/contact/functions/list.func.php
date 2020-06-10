<?php
function get_contact(){
    global $db;

    $req = $db->query("SELECT * FROM contacts ");

    $results = [];

    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;

}
?>