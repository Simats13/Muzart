<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>
<body>
    <?php
    require_once 'Db.php';
    require_once 'getContact.php';
    $contacts=getcontacts($db,1,$_GET['id']);

    ?>
<div class="container">
    <h1><?= $contacts->nom ?></h1>
    <h5><?= $contacts->message ?></h5>
    <div class="row">
        <div class="col offset-s5 s4"> email <em> <?= $contacts->email ?></em></div>
</div>
<div class="row">
    <a href="deleted.php?id=<?= $contacts->id ?>"><div class="action col s-4"><h5>Supprimer</h5></div></a>
    <a href="mailto:<?= $contacts->email ?>"><h5>Répondre</h5></a>
</div>
</div>