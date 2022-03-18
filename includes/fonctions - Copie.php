<?php 

//CONNEXION

	function verification_donnees_connexion_non_nulles($login, $mdp, $location, $message_erreur)
	{
		if(isset($login) && isset($mdp) && !empty($login) && !empty($mdp))
		{
			$tableau = [$login, $mdp];
			return $tableau;
		}
		else
		{
			message_erreur_connexion ($location, $message_erreur);
		}
	}

	function message_erreur_connexion ($location, $message_erreur)
	{
		$_SESSION["message_erreur"] = $message_erreur;
		header("Location: $location");
		exit();
	}

	function requete_connexion ($bdd, $champ_un, $champ_deux, $table, $condition, $valeur)
	{
		$existence_utilisateur = $bdd->prepare("SELECT $champ_un, $champ_deux FROM $table WHERE $condition = :login");
		$existence_utilisateur->bindParam(":login", $valeur);
		$existence_utilisateur->execute();

		$resultat = $existence_utilisateur->fetch();
		return $resultat;
	}

	function requete_connexion_verification ($requete, $mdp_formulaire, $mdp_requete, $login, $mdp, $location, $message_erreur, $location2)
	{
		if($requete)
		{
			if(password_verify($mdp_formulaire, $mdp_requete))
			{
				$_SESSION["login"] = $login;
				$_SESSION["mdp"] = $mdp;
				unset($_SESSION["message_erreur"]);	
				header("Location: $location2");
				exit();
			}
			else
			{
				message_erreur_connexion ($location, $message_erreur);
			}
		}
		else
		{
			message_erreur_connexion ($location, $message_erreur);
		}
	}

//INSCRIPTION

	function verification_donnees_inscription_non_nulles($email, $login, $mdp, $location, $message_erreur1, $message_erreur2)
	{
		if(isset($email) && isset($login) && isset($mdp) && !empty($email) && !empty($login) && !empty($mdp))
		{
			$tableau = verification_email_inscription_valide($email, $login, $mdp, $location, $message_erreur2);
			return $tableau;
		}
		else
		{
			message_erreur_inscription ($location, $message_erreur1);
		}
	}

	function verification_email_inscription_valide($email, $login, $mdp, $location, $message_erreur)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$tableau2 = [$email, trim($login), trim($mdp)];
			return $tableau2;
		}
		else
		{
			message_erreur_inscription ($location, $message_erreur);
		}
	}

	function requete_inscription ($bdd, $table, $champ_un, $champ_deux, $champ_trois, $email, $login, $mdp)
	{
		$mdp_crypte = password_hash($mdp, PASSWORD_DEFAULT);

		$enregistrement_utilisateur = $bdd->prepare("INSERT INTO $table ($champ_un, $champ_deux, $champ_trois) VALUES (:email_bdd, :login_bdd, :mdp_bdd)");
		$enregistrement_utilisateur->bindParam(":email_bdd", $email);
		$enregistrement_utilisateur->bindParam(":login_bdd", $login);
		$enregistrement_utilisateur->bindParam(":mdp_bdd", $mdp_crypte);
		$enregistrement_utilisateur->execute();
	}

	function message_erreur_inscription ($location, $message_erreur)
	{
		$_SESSION["message_erreur"] = $message_erreur;
		$_SESSION["erreur_inscription"] = 1;
		header("Location: $location");
		exit();
	}

	function enregistrement_donnees ($variable1, $variable2, $bdd, $table, $champ_un, $champ_deux, $champ_trois, $email, $login, $mdp, $location, $message_erreur1, $message_erreur2)
	{
		if (!$variable1)
		{
			if (!$variable2)
			{
				requete_inscription ($bdd, $table, $champ_un, $champ_deux, $champ_trois, $email, $login, $mdp);
				unset($_SESSION["message_erreur"]);	
				unset($_SESSION["erreur_inscription"]);	
				header("Location: $location");
				exit();

			}
			else
			{
				message_erreur_inscription ($location, $message_erreur2);
			}
		}
		else
		{
			message_erreur_inscription ($location, $message_erreur1);
		}
	}

	function requete_verification_donnees_inscription ($bdd, $champ_un, $table, $condition, $valeur)
	{
		$requete_verification = $bdd->prepare("SELECT $champ_un FROM $table WHERE $condition = :valeur");
		$requete_verification->bindParam(":valeur", $valeur);
		$requete_verification->execute();

		$resultat = $requete_verification->fetch();
		return $resultat;
	}

// PROFIL UTILISATEUR

	function image_de_profil($bdd,$login,$valeur){
		$change_image = $bdd->prepare("UPDATE `user` SET `image` = :valeur WHERE `user`.`pseudo` = :user");
		$change_image->bindParam(":valeur", $valeur);
		$change_image->bindParam(":user", $login);
		$change_image->execute();

		$resultat = $change_image->fetch();
		return $resultat;
	}


	function info_utilisateur_profil($bdd,$login){
		$info_user = $bdd->prepare("SELECT `prenom`, `nom`,`image`, `grade`,`date`,`description` FROM `user` WHERE `pseudo` = :user");
		$info_user->bindParam(":user", $login);
		$info_user->execute();

		$resultat = $info_user->fetch();
		return $resultat;
	}

	// function recherche_image($bdd,$login,$valeur){

	// }

?>