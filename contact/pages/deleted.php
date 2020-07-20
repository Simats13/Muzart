<?php
$db = GetDBConnection();
if(isset($_GET['id'])) {
    $req=$db->query('DELETE FROM contacts WHERE id= '.$_GET['id']);

}
$req->closeCursor();
$db = null;
header('Location:?dashboard');
?>