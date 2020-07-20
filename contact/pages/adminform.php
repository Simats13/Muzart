	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

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
          <span class="card-title"><?= $contacts['name']?></span>
        </div>
        <div class="card-content">
          <p><?=$contacts['message'] ?><br> Email: <?=$contacts['email'] ?></p>
        </div>
        <div class="card-action">
          <a href="list.php?id=<?=$contacts['id'] ?>">Voir le message en entier</a>
        </div>
      </div>
    </div>
  </div>

<?php endforeach
  $db->closeCursor();
  $db= null;

?>
</div>