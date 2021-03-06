<?php 
//CREE UNE SESSION
    session_start();
//CONNEXION A LA BASE DE DONNES 


function GetDBConnection()
{
    $dbhost  = 'isabeliperusat.mysql.db';
    $dbname  = 'isabeliperusat';
    $dbuser  = 'isabeliperusat';
    $dbpaswd = 'GRNCtkRp8ddJ';
    try{
        $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpaswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }catch(PDOexception $e){
        die("Une erreur est survenue lors de la connexion à la base de données");
    }
    return $db;
}
    //FONCTION SAVOIR SI L'UTILISATEUR EST UN ADMIN REVOIE SUR UNE PAGE SPECIFIQUE
function admin(){
    if(isset($_SESSION['admin'])){
        $db = GetDBConnection();
        $a = [
            'email' => $_SESSION['admin'],
            'role'  => 'admin'
        ];

        $sql = "SELECT * FROM admin WHERE email=:email AND role=:role";
        $req = $db->prepare($sql);
        $req->execute($a);
        $exist = $req->rowCount($sql);
        $req->closeCursor();
        $db = null;
        return $exist;
    }else{
        return 0;
    }
}
//FONCTION S'IL N'A PAS DE MOT DE PASSE RENVOIE SUR UNE PAGE SPECIFIQUE
function hasnt_password(){
    $db = GetDBConnection();

    $sql = "SELECT * FROM admin WHERE email = '{$_SESSION['admin']}' AND password = ''";
    $req = $db->prepare($sql);
    $req->execute();
    $exist = $req->rowCount($sql);
    $req->closeCursor();
    $db = null;
    return $exist;
}

?>