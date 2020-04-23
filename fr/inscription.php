<?php

	//Création d'une session

	session_start();

	require('log.php');

	if(isset($_SESSION['connect'])){
        header('location: index.php');
        exit();
    }

	if(!empty($_POST['email'])&& !empty($_POST['password']) && !empty($_POST['password_two'])){
		
		require('connect.php');
		//VARIABLES

		$email= htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST["password"]);
		$password_two = htmlspecialchars($_POST['password_two']);

		// VERIFIER SI LES DEUX MOTS DE PASSE SONT IDENTIQUES

		if($password != $password_two){
			header('location:inscription.php?error=1&message=Vos mots de passe ne sont pas identiques.');
			exit();
		}

		// ADRESSE EMAIL VALIDE

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header('location:inscription.php?error=1&message=Votre adresse mail est invalide.');
			exit();
		}

		//EMAIL DEJA UTILISEE
		$requete = $db->prepare("SELECT count(*) as numberEmail FROM users WHERE email = ?");
		$requete->execute(array($email));

		while($email_verification = $requete->fetch()){
			if($email_verification['numberEmail']!=0){
				header('location:inscription.php?error=1&message=1=Votre adresse email est déjà utilisée par un autre utilisateur.');
				exit();
			}
		}

		//HASH (Cryptage de l'email)
		$secret = sha1($email).rand();
		$secret = sha1($secret).rand();

		// CHIFFRAGE DU MOT DE PASSE
		$password ="bsr". sha1($password)."89";

		//ENVOI
		$requete = $db->prepare("INSERT INTO users(email, password, secret) VALUES(?,?,?)");
		$requete->execute(array($email, $password, $secret));

		header('location: inscription.php?success=1');
		exit();

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
			<h1>S'inscrire</h1>
			<?php

			if(isset($_GET['error'])){
				if(isset($_GET['message'])){

					echo '<div class="alert error">'.htmlspecialchars($_GET['message'])."</div>";


				}
			}elseif(isset($_GET['success'])){
				echo '<div class="alert success"> Vous êtes désormais inscrit. <a href="index.php"> Connectez-vous</a></div>.';
			}
			
			?>
			<div id="message"></div>
			<form method="post" action="inscription.php">
				<input type="email" name="email" placeholder="Votre adresse email" required />
				<input type="password" name="password" placeholder="Mot de passe" required />
				<input type="password" name="password_two" placeholder="Retapez votre mot de passe" required />
				<button type="submit">S'inscrire</button>
			</form>
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