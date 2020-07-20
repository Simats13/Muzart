<?php 

require "../../functions/main-functions.php";

$db->exec("DELETE FROM admin WHERE id = {$_POST['id']}");