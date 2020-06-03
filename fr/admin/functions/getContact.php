<?php
function getcontacts($db, $nb = null, $id=null){
    if ($nb AND !$id){
        $req=$db->query('SELECT * FROM contacts LIMIT'.$nb);
        $contact=$req->fetchALL();
    }elseif($id){
        $req=$db->query('SELECT *FROM contacts WHERE id='.$id);
        $contact=$req->fetchObject();
    }else{
        $req=$db->query('SELECT * FROM contacts');
        $contact=$req->fetchAll();
    }
    return$contact;
}