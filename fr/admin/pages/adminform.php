<!-- recevoir les formulaires de contact-->
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.js"></script>
<script type="text/javascript" src="../js/script.js"></script>

<?php session_start()?>
 
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


<!DOCTYPE html>
<html>
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../../assets/css/materialize.css"  media="screen,projection"/>
    <title>Perusat Créations | Administration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>


<div class="row">
<div class="col l4 m6 s12 offset offset-m3">
        <div class="card-panel">
            <div class="row">
                <div class="col s6 offset-s3">
                    <img src="img/admin.png" alt="Administrateur" width="100%"/>
                </div>
            </div>

            <h4 class="center-align">BLOG</h4>

                <div class="row">
                    <div class="input-field col s12">
                        <center><img src="../blog/img/posts/13.jpg" alt="" width="100px" height="100px"></center>
                        
                    </div>
                </div>

                <center>
                    <a href="../blog/admin/index.php">Administration BLOG </a>
                </center>
        </div>
    </div>


    <div class="col l4 m6 s12 offset offset-m3">
        <div class="card-panel">
            <div class="row">
                <div class="col s6 offset-s3">
                    <img src="img/admin.png" alt="Administrateur" width="100%"/>
                </div>
            </div>

            <h4 class="center-align">PORTFOLIO</h4>

                <div class="row">
                    <div class="input-field col s12">
                        <center><img src="../blog/img/posts/13.jpg" alt="" width="100px" height="100px"></center>
                        
                    </div>
                </div>

                <center>
                    <a href="?page=dashboard_portfolio">Administration PHOTO </a>
                </center>
        </div>
    </div>

    <div class="col l4 m6 s12 offset offset-m3">
        <div class="card-panel">
            <div class="row">
                <div class="col s6 offset-s3">
                    <img src="img/admin.png" alt="Administrateur" width="100%"/>
                </div>
            </div>

            <h4 class="center-align">VIDEO</h4>

                <div class="row">
                    <div class="input-field col s12">
                        <center><img src="../blog/img/posts/13.jpg" alt="" width="100px" height="100px"></center>
                        
                    </div>
                </div>

                <center>
                    <a href="index.php?page=dashboard">Administration VIDEO </a>
                </center>
        </div>
    </div>
</div>
<?php 
require_once 'db.php';
?>
<div class=container>
<?php 
 $req=$db->query('SELECT * FROM contacts');
 $contact = $req->fetchAll();

foreach($contact as $contacts):?>
	<div class="row">
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
          <img src="https://tse1.mm.bing.net/th?id=OIP.ghMjM2Zbd3tNXDNyA4MRTQAAAA&pid=Api&P=0&w=298&h=175">
          <span class="card-title"><?= $contacts['nom']?></span>
        </div>
        <div class="card-content">
          <p><?=$contacts['message'] ?><br> Email: <?=$contacts['email'] ?></p>
        </div>
        <div class="card-action">
          <a href="single_article.php?id=<?=$contacts['id'] ?>">Voir le message en entier</a>
        </div>
      </div>
    </div>
  </div>

<?php endforeach?>
</div>