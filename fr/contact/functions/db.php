<?php

$dbhost  = 'localhost';
$dbname  = 'perusat';
$dbuser  = 'root';
$dbpaswd = 'root';
try{
    $pdo_options[PDO::ATTR_ERRMODE] =PDO::ERRMODE_EXCEPTION;
    $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpaswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); //mettre les noms des champs majuscules
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Lancer des exceptions en cas d'erreurs

}
catch(PDOException $e) { 
    die('Erreur: '.$e->getMessage());
}
?>
