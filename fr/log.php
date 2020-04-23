<?php

	if(isset($_COOKIE['auth']) && !isset($_SESSION['connect'])){

		// VARIABLE
		$secret = htmlspecialchars($_COOKIE['auth']);

		// VERIFICATION
		require('connect.php');

		$requete = $db->prepare("SELECT count(*) as numberAccount FROM user WHERE secret = ?");
		$requete->execute(array($secret));

		while($user = $requete->fetch()){

			if($user['numberAccount'] == 1){

				$requeteUser = $db->prepare("SELECT * FROM user WHERE secret = ?");
				$requeteUser->execute(array($secret));

				while($userAccount = $requeteUser->fetch()){

					$_SESSION['connect'] = 1;
					$_SESSION['email']   = $userAccount['email'];

				}

			}

		}

	}

	if(isset($_SESSION['connect'])){

		require('connect.php');

		$requeteUser = $db->prepare("SELECT * FROM user WHERE email = ?");
		$requeteUser->execute(array($_SESSION['email']));

		while($userAccount = $requeteUser->fetch()){

			if($userAccount['blocked'] == 1) {
				header('location: ../logout.php');
				exit();
			}

		}

	}

?>