<?php
$db = GetDBConnection();
if(isset($_GET['id'])) {
    $req=$db->query('DELETE FROM commentsPhoto WHERE id= '.$_GET['id']);

}
$req->closeCursor();
$db = null;

?>