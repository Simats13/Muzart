<?php 

require "../../functions/main-functions.php";

$db->exec("DELETE FROM comments WHERE id = {$_POST['id']}");
$db->closeCursor();
$db = null;