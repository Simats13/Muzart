<?php
    session_start();
     
     

    $dbhost  = 'localhost';
    $dbname  = 'apart';
    $dbuser  = 'root';
    $dbpaswd = 'root';

    try{
        $bdd = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpaswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }catch(PDOexception $e){
        die("Une erreur est survenue lors de la connexion à la base de données");
    }
     
    if(isset($_GET['id']) AND $_GET['id'] > 0) {
       $getid = intval($_GET['id']);
       $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
       $requser->execute(array($getid));
       $userinfo = $requser->fetch();
    }?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <div align="center">
            <h2>Profil de <?= $userinfo['pseudo']; ?></h2>
            <br /><br />
            Pseudo = <?= $userinfo['pseudo']; ?>
            <br />
            Mail = <?= $userinfo['mail']; ?>
            <br />
            <?php
             if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
             ?>
            <br />
            <a href="editionprofil.php">Editer mon profil</a>
            <a href="deconnexion.php">Se déconnecter</a>
            <?php
             }
             ?>
        </div>
    </div>

</body>

</html>

}?>

