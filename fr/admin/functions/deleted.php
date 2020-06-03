<?php
// Pour suprimer un message provenant d'un formulaire de contact
session_start();
require_once 'db.php';
if(isset($_GET['id'])) {
    $req=$db->query('DELETE FROM contacts WHERE id= '.$_GET['id']);
}
header('Location:adminform.php'); //redirection sur cette page (page admin des formulaires)
?>