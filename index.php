<?php
//FONCTION PERMETTANT D'INCLURE LES FICHIERS PHP EN FONCTION DU NOM DE LA PAGE
    include 'functions/main-functions.php';
//Inclus les pages (home.php, contact,etc...)
    $pages = scandir('pages/');
    if(isset($_GET['page']) && !empty($_GET['page'])){
        if(in_array($_GET['page'].'.php',$pages)){
            $page = $_GET['page'];
        }else{
            $page = "error";
        }
    }else{
        $page = "home";
    }

    $pages_functions = scandir('functions/');
    if(in_array($page.'.func.php',$pages_functions)){
        include 'functions/'.$page.'.func.php';
    }

    function get_posts(){
        $db = GetDBConnection();
    
        $req = $db->query("
    
            SELECT  posts.id,
                    posts.title,
                    posts.image,
                    posts.date,
                    posts.content,
                    admin.name
            FROM posts
            JOIN admin
            ON posts.writter=admin.email
            WHERE posted='1'
            ORDER BY date DESC
            LIMIT 0,4
        
        ");
    
        $results = array();
    
        while($rows = $req->fetchObject()){
            $results[]= $rows;
        }
    
        return $results;
        $db->closeCursor();
        $db = null;
    
    }

?>


<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/ico/favicon.ico">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/img/ico/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/img/ico/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/img/ico/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" href="assets/img/ico/apple-touch-icon-57x57.png">

  <title>Pérusat Création - Accueil</title>

  <!-- Bootstrap Core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/animate.css" rel="stylesheet">
  <link href="assets/css/plugins.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/pe-icons.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>

</head>

<body>

<!-- INCLUS LES PAGES, LE FOOTER ET L'HEADER -->

  <?php include 'pages/'.$page.'.php';?>
  <?php include 'body/footer.php'?>
  <?php include "body/header.php";?>


</body>

</html>