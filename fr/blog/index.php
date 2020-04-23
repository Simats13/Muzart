<?php
    include 'functions/main-functions.php';

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
  <link rel="shortcut icon" href="../assets/img/ico/favicon.ico">
  <link rel="apple-touch-icon" sizes="144x144" href="../assets/img/ico/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../assets/img/ico/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../assets/img/ico/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" href="../assets/img/ico/apple-touch-icon-57x57.png">

  <title>Pérusat Création - Blog</title>

  <!-- Bootstrap Core CSS -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/animate.css" rel="stylesheet">
  <link href="../assets/css/plugins.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/pe-icons.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="../assets/js/jquery.js"></script>
</head>

<body>

  <section class="dark-wrapper opaqued parallax" data-parallax="scroll" data-image-src="../assets/img/bg/bg2.jpg"
    data-speed="0.7">
    <div class="section-inner pad-top-200">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mt30 wow text-center">
            <h2 class="section-heading">Blog</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
                include 'pages/'.$page.'.php';
            ?>
  <?php include "body/header_fr.php";?>




<div class="row paging text-center">
                        <a class="btn btn-primary mt30" href="#">Older Posts</a>
                    </div>
  <?php include 'body/footer_fr.php'?>
  <?php include "body/header_fr.php";?>


</body>

</html>