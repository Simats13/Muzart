<?php
	session_start();

	require('log.php');

	if(!empty($_POST['email'])&& !empty($_POST['password'])){

		require('src/connect.php');
		
		//VARIABLES

		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['password']);

		//ADRESSE EMAIL SYNTAXE
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

			header('location:index.php?error=1&message=Votre adresse mail est invalide');
			exit();
		}

		//CHIFFRAGE DU MOT DE PASSE
		$password ="bsr". sha1($password)."89";

		// EMAIL DEJ A UTILISE

		$requete = $db->prepare("SELECT count(*) as numberEmail FROM users WHERE email = ?");
		$requete->execute(array($email));

		while($email_verification = $requete->fetch()){
			if($email_verification['numberEmail'] !=1){
				header('location : index.php?error=1&message=Impossible de vous authentifier correctement.');
				exit();
			}
		}

		// CONNEXION 

		$requete = $db->prepare("SELECT * FROM users WHERE email = ?");
		$requete->execute(array($email));

		while($user = $req->fetch()){

			if($password == $user['password']){

				$_SESSION['connect'] = 1;
				$_SESSION['email']   = $user['email'];

				if(isset($_POST['auto'])){
					setcookie('auth', $user['secret'], time() + 364*24*3600, '/', null, false, true);
				}

				header('location: index.php?success=1');
				exit();


			}
			else {
				header('location :index.php?error=1&message=Impossible de vous authentifier correctement.');
				exit();
		}

	}
}


?>



<!DOCTYPE html>
<html lang="fr">

<head>

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

	<title>Pérusat Création - Inscription</title>

	<!-- Bootstrap Core CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/animate.css" rel="stylesheet">
	<link href="assets/css/plugins.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/default.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/pe-icons.css" rel="stylesheet">

</head>

<body id="page-top" class="index">

	<div class="master-wrapper">

		<div class="preloader">
			<div class="preloader-img">
				<span class="loading-animation animate-flicker"><img src="assets/img/loading.GIF"
						alt="loading" /></span>
			</div>
		</div>

		<!-- Navigation -->
		<section id="welcome">
			<div class="section-inner nopaddingbottom">
				<div class="container">
					<div class="row"></div>
				</div>
			</div>
		</section>

		<div id="login-body">


			<?php if(isset($_SESSION['connect'])){  ?>

				<h1>Bienvenue ! </h1>
				<h2>Votre nombre de points : </h2>
				<?php
				if(isset($_GET['success'])){
				echo '<div class = "alert success">Vous êtes maintenant connecté.</div>';
			}?>
				<p>Souhaitez-vous tester l'une de nos machines</p>
				<h3><a href="src/rules.php" style="display: block;text-align:center">Slots Machine 1</a></h3>
				<img src="/img/favicon.png" height="100px" widht="100px" style="margin-left: auto;margin-right: auto;display: block;">
				<small><a href="/logout.php">Se déconnecter</a></small>

			<?php } else { ?>

					<h1>S'identifier</h1>

					<?php if(isset($_GET['error'])){
						if(isset($_GET['message'])){
							echo '<div class"alert error">'.htmlspecialchars($_GET['message']).'"</div>"';
						}
					} ?>

					<form method="post" action="index.php">
						<input type="email" name="email" placeholder="Votre adresse email" required />
						<input type="password" name="password" placeholder="Mot de passe" required />
						<button type="submit">S'identifier</button>
						<label id="option"><input type="checkbox" name="auto" checked />Se souvenir de moi</label>
					</form>
				

					<p class="grey">Première visite sur Pérusat Création ? <a href="inscription.php">Inscrivez-vous</a>.</p>
			
					<?php } ?>
				</div>
		<!-- BARRE DE NAVIGATION -->
		<?php include 'header_fr.php'?>


		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/plugins.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script src="assets/js/init.js"></script>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</body>

</html>

