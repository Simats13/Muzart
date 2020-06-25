<?php
function get_contact(){
    $db = GetDBConnection();

    $req = $db->query("SELECT * FROM contacts ");

    $results = [];

    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;
    $db->closeCursor();
    $db = null;

}
?>