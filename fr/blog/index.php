<?php 

    include 'functions/main-functions.php';
    
    $pages = scandir('pages/');
    if(isset($_GET['page'])&& !empty($_GET['page'])){
        if(in_array($_GET['page'].'.php',$pages)){
            $page = $_GET['page'];
        }else{
            $page ="error";
        }
    }else{
        $page ="home";
    }

    $pages_functions = scandir('functions/');
    if(in_array($page.'.func.php', $pages_functions)){
      include 'functions/'.$page.'.func.php';
    }


?>





<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../assets/css/style.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

    <?php include 'pages/'.$page.'.php';?>


    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../assets/js/plugins.js"></script>

    <!-- Plugins -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

    <!-- Custom JavaScript -->
    <script src="../assets/js/init.js"></script>
    </body>
  </html>