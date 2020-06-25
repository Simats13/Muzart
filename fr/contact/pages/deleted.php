<?php
if(isset($_GET['id'])) {
    $req=$db->query('DELETE FROM contacts WHERE id= '.$_GET['id']);
    $db->closeCursor();
    $db = null;
}
header('Location:?dashboard');
?>