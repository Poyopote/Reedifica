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

	function image_de_profil($bdd,$login,$valeur)
	{
		$change_image = $bdd->prepare("UPDATE `user` SET `image` = :valeur WHERE `user`.`pseudo` = :user");
		$change_image->bindParam(":valeur", $valeur);
		$change_image->bindParam(":user", $login);
		$change_image->execute();

		$resultat = $change_image->fetch();
		return $resultat;
	}


	function info_utilisateur_profil($bdd,$login)
	{
		$info_user = $bdd->prepare("SELECT `pseudo`, `prenom`, `nom`,`image`, `grade`,`date`,`description` FROM `user` WHERE `pseudo` = :user");
		$info_user->bindParam(":user", $login);
		$info_user->execute();

		$resultat = $info_user->fetch();
		return $resultat;
	}

	function profil(){
		
	}


// EXPLORATION

	function recherche_monde($bdd,$id_monde)
	{
		$info_monde = $bdd->prepare("SELECT `name_world`, `bio_world`, `media`, `pseudo` FROM `world` INNER JOIN `user` ON world.`id_user` = user.`id_user` WHERE `id_world` = :id");
		$info_monde->bindParam(":id", $id_monde);
		$info_monde->execute();
		$resultat = $info_monde->fetch();
		return $resultat;
	}

	function recherche_sous_monde($bdd,$id_monde)
	{
		$info_monde = $bdd->prepare("SELECT `id_under_world`, `title`,`bio`,`media` FROM `under_world` WHERE `id_world` = :id");
		$info_monde->bindParam(":id", $id_monde);
		$info_monde->execute();
		$resultat = $info_monde->fetchAll();
		return $resultat;
	}

	function list_monde($bdd){
		$info_monde = $bdd->query("SELECT `name_world` FROM `world` WHERE 1");
		$info_monde->execute();
		$resultat = $info_monde->fetchAll();
		return $resultat;
	}

	function get_sous_monde($bdd,$get_element)
	{
		$info_sous_monde = $bdd->prepare("SELECT `title`,`media`,`bio`,`pseudo` FROM `under_world` JOIN `user` ON user.`id_user` = under_world.`id_user` WHERE `id_under_world`  = :id");
		$info_sous_monde->bindParam(":id", $get_element);
		$info_sous_monde->execute();
		$resultat = $info_sous_monde->fetch();
		return $resultat;
	}

	function nbr_histoire($bdd,$get_element)
	{
		$info_sous_monde = $bdd->prepare("SELECT COUNT(`id_story`) nbr_histoire FROM story WHERE `id_under_world` = :id");
		// $info_sous_monde = $bdd->prepare("SELECT COUNT(story.`id_story`) nbr_histoire, COUNT(`id_rp`) message FROM story LEFT JOIN rp ON rp.`id_story` = story.`id_story` WHERE `id_under_world` = ");
		$info_sous_monde->bindParam(":id", $get_element);
		$info_sous_monde->execute();
		$resultat = $info_sous_monde->fetch();
		return $resultat;
	}
	

	function creer_une_histoire($bdd, $pseudo, $sous_monde, $titre, $bio){
		$date = new DateTime("now", new DateTimeZone('Europe/Paris') );
		$date = $date->format('Y-m-d H:i:s');
		$bdd->query("INSERT INTO `story`(`title`, `id_user`, `id_under_world`, `bio`, `date`) VALUES ('$titre',(SELECT `id_user` FROM `user` WHERE `pseudo` = '$pseudo'),'$sous_monde','$bio','$date')");

	}


// PAGE MEMBRES

	function liste_des_membres($bdd)
	{
		$info_membres = $bdd->query("SELECT `pseudo`,`prenom`,`nom`,`image`,`grade`, user.`date`, Count(id_story) nbm_histoire FROM user LEFT JOIN rp ON rp.`id_user` = user.`id_user` GROUP BY `pseudo`");
		$info_membres->execute();
		$resultat = $info_membres->fetchAll();
		return $resultat;
	}

	function nombre_user($bdd)
	{
		$nombre_user = $bdd->query("SELECT COUNT(`id_user`) FROM user");
		$nombre_user->execute();
		$resultat = $nombre_user->fetch();
		return $resultat;
	}

//LANGUE
	if (isset($_SESSION["lang"])) {
		$lang = "en";
	}
	else {
		$lang = locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']);
	}

	function accueil($bdd, $lang)
	{
		return $bdd->query("SELECT `$lang` FROM `accueil`;")->fetchAll();
	}

	function footer($bdd, $lang)
	{
		return $bdd->query("SELECT `$lang` FROM `footer`;")->fetchAll();
	}

	function menu($bdd)
	{
		return $bdd->query("SELECT * FROM `projet` WHERE 1;")->fetchAll();
	}
	

// ALERT

	function function_alert($message) {
		
		// Display the alert box 
		echo "<script>alert('$message');</script>";
	}
?>