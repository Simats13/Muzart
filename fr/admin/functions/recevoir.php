<?php
session_start();
require('db.php');
//Pour recevoir les données
$nom=$_POST['name'];
$email=$_POST['mail'];
$message=$_POST['message'];
echo "Nom:".$nom."<br>"."Email:".$email."<br>"."Message:".$message;
 //Insertion dans la base de données
$insert=$db->prepare("INSERT INTO contacts(nom, email, message) VALUES (?,?,?)" );
 $insert->execute(array($nom,$email,$message));
 //Renvoie de client à la page formulaire (donc pas de changement)
 header('Location:contact.php'); //va rediriger vers la page contact (site pas admin)

?>