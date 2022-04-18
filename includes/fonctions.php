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
		


		if(isset($email) && isset($login) && isset($mdp) && !empty($email) && !empty(trim($login)) && !empty(trim($mdp)))
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

			$_SESSION["inscription"]['login'] = trim($login);
			$_SESSION["inscription"]['mdp'] = trim($mdp);
			$_SESSION["inscription"]['email'] = $email;
			return $tableau2;
		}
		else
		{
			message_erreur_inscription ($location, $message_erreur);
		}
	}

	function requete_inscription ($bdd, $table, $nom, $prenom, $email, $pseudo, $mdp, $don)
	{
		$BackOffice = new administration();
		$mdp_crypte = $BackOffice->pass_hash($mdp);
		$date = new DateTime("now", new DateTimeZone('Europe/Paris') );
		$date = $date->format('Y-m-d H:i:s'); // Fournit la date de la FRANCE

		$enregistrement_utilisateur = $bdd->prepare("INSERT INTO $table (`pseudo`, `nom`, `prenom`, `image`, `mdp`, `email`, `don`, `date`) VALUES (:pseudo_bdd, :nom_bdd, :prenom_bdd, 'profil.png', :mdp_bdd, :email_bdd, :don_bdd, :date_bdd)");
		$enregistrement_utilisateur->bindParam(":nom_bdd", $nom);
		$enregistrement_utilisateur->bindParam(":prenom_bdd", $prenom);
		$enregistrement_utilisateur->bindParam(":pseudo_bdd", $pseudo);
		$enregistrement_utilisateur->bindParam(":don_bdd", $don);
		$enregistrement_utilisateur->bindParam(":email_bdd", $email);
		$enregistrement_utilisateur->bindParam(":mdp_bdd", $mdp_crypte);
		$enregistrement_utilisateur->bindParam(":date_bdd", $date);
		$enregistrement_utilisateur->execute();

		$filename = $_SERVER['DOCUMENT_ROOT']. "/reedifica/docs/".$pseudo;
		$profil_image = $_SERVER['DOCUMENT_ROOT']. "/reedifica/img/profil.png";
		mkdir($filename);
		copy($profil_image, $filename."/profil.png");
	}

	function message_erreur_inscription ($location, $message_erreur)
	{
		$_SESSION["message_erreur"] = $message_erreur;
		$_SESSION["erreur_inscription"] = 1;
		header("Location: $location");
		exit();
	}

	function enregistrement_donnees_1 ($variable1, $variable2, $location, $message_erreur1, $message_erreur2)
	{
		if (!$variable1)
		{
			if (!$variable2)
			{
				unset($_SESSION["message_erreur"]);	
				unset($_SESSION["erreur_inscription"]);
				$_SESSION["formulaire"] = 3;
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
	function enregistrement_donnees_2 ($nom, $prenom, $bdd, $table, $email, $pseudo, $mdp, $don, $location, $message_erreur)
	{
		$_SESSION["formulaire"] = 5;
		if (!empty(trim($prenom)))
		{
			requete_inscription ($bdd, $table, $nom, $prenom, $email, $pseudo, $mdp, $don);
			unset($_SESSION["message_erreur"]);	
			unset($_SESSION["erreur_inscription"]);
			$_SESSION["formulaire"] = 7;
			header("Location: $location");
			exit();
		}
		else
		{
			message_erreur_inscription ($location, $message_erreur);
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

	function user_connect(){
		if (isset($_SESSION["login"]))
		return $_SESSION["login"];
		else return "";
	}

// PROFIL UTILISATEUR

	function image_de_profil($bdd,$login,$valeur1)
	{
		$change_image = $bdd->prepare("UPDATE `user` SET `image` = :valeur1 WHERE `user`.`pseudo` = :user");
		$change_image->bindParam(":valeur1", $valeur1);
		$change_image->bindParam(":user", $login);
		$change_image->execute();
	}

	function image_de_bio($bdd,$login,$valeur2)
	{
		$change_bio = $bdd->prepare("UPDATE `user` SET `description` = :valeur2 WHERE `user`.`pseudo` = :user");
		$change_bio->bindParam(":user", $login);
		$change_bio->bindParam(":valeur2", $valeur2);
		$change_bio->execute();
	}


	function info_utilisateur_profil($bdd,$login)
	{
		$info_user = $bdd->prepare("SELECT `id_user`, `pseudo`, `prenom`, `nom`,`image`, `grade`,`date`,`description` FROM `user` WHERE `pseudo` = :user");
		$info_user->bindParam(":user", $login);
		$info_user->execute();

		if($info_user){
			return $info_user->fetch();
		}
		return FALSE;
	}

	function role($bdd,$id){
		$role = $bdd->query("SELECT * FROM `role` WHERE `id_role` = $id");
		$role->execute();
		$resultat = $role->fetch();
		return $resultat;
	}

	function role_user($bdd,$login){
		$role_user = $bdd->query("SELECT `name_role` FROM `role` AS r INNER JOIN userxrole as ur ON ur.id_statut = r.`id_role` JOIN user AS u ON u.id_user = ur.id_user WHERE u.pseudo = $login");
		$role_user->execute();
		$resultat = $role_user->fetchAll();
		return $resultat;
	}


	function profil($bdd,$id)
	{
		$info_user = $bdd->prepare("SELECT * FROM `user` WHERE `id_user` = :user");
		$info_user->bindParam(":user", $id);
		$info_user->execute();
		$resultat = $info_user->fetch();
		return $resultat;
	}


// EXPLORATION

	// Fourni le nom d'un monde, sa description, l'image, et le créateur du monde en fonction de son id.
	function recherche_monde($bdd,$id_monde)
	{
		$info_monde = $bdd->prepare("SELECT `name_world`, `bio_world`, `media`, `pseudo` FROM `world` INNER JOIN `user` ON world.`id_user` = user.`id_user` WHERE `id_world` = :id");
		$info_monde->bindParam(":id", $id_monde);
		$info_monde->execute();
		$resultat = $info_monde->fetch();
		return $resultat;
	}

	// Fourni tous les sous-monde et leurs info en fonction de l'id du Du monde auquel ils sont liés.
	function recherche_sous_monde($bdd,$id_monde)
	{
		$info_monde = $bdd->prepare("SELECT `id_under_world`, `title`,`bio`,`media` FROM `under_world` WHERE `id_world` = :id");
		$info_monde->bindParam(":id", $id_monde);
		$info_monde->execute();
		$resultat = $info_monde->fetchAll();
		return $resultat;
	}

	// Fournit une liste de tous les mondes.
	function list_monde($bdd){
		$info_monde = $bdd->query("SELECT * FROM `world` WHERE 1");
		$info_monde->execute();
		$resultat = $info_monde->fetchAll();
		return $resultat;
	}
	function liste_index_sous_monde($bdd){
		$info_sous_monde = $bdd->query("SELECT * FROM `under_world` ORDER  BY `id_world`");
		$info_sous_monde->execute();
		$resultat = $info_sous_monde->fetchAll();
		return $resultat;
	}

	// Fournit les informations d'un sous monde selon son idée.
	function get_sous_monde($bdd,$get_element)
	{
		$info_sous_monde = $bdd->prepare("SELECT under_world.`id_world`, `title`,`media`,`bio`,`pseudo` FROM `under_world` JOIN `user` ON user.`id_user` = under_world.`id_user` WHERE `id_under_world` = :id");
		$info_sous_monde->bindParam(":id", $get_element);
		$info_sous_monde->execute();
		$resultat = $info_sous_monde->fetch();
		return $resultat;
	}

	function tous_les_histoires_du_monde($bdd,$monde)
	{
		$info_sous_monde = $bdd->prepare("SELECT u.`pseudo`,`title`,s.`date`, s.`id_story`, COUNT(`id_rp`) rp FROM `user` AS u INNER JOIN story AS s ON u.`id_user` = s.`id_user` JOIN rp AS r ON r.`id_story` = s.`id_story` WHERE `id_under_world` = :monde GROUP BY s.`id_story`");
		$info_sous_monde->bindParam(":monde", $monde);
		$info_sous_monde->execute();
		$resultat = $info_sous_monde->fetchAll();
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

	function list_histoire($bdd,$get_element)
	{
		$histoire = $bdd->prepare(
		"SELECT `pseudo`, `image`, `title`, `bio`,s.`date` FROM user AS u INNER JOIN story AS s ON u.`id_user` = s.`id_user` WHERE s.`id_under_world` = :id");
		$histoire->bindParam(":id", $get_element);
		$histoire->execute();
		$resultat = $histoire->fetchAll();
		return $resultat;
	}

	// Fourni tous les sous-monde et leurs info en fonction de l'id du Du monde auquel ils sont liés.
	function get_histoire($bdd,$id_story)
	{
		$histoire = $bdd->prepare("SELECT * FROM `story` WHERE `id_story` = :id");
		$histoire->bindParam(":id", $id_story);
		$histoire->execute();
		$resultat = $histoire->fetch();
		return $resultat;
	}

	// Lorsqu'un utilisateur remplit le formulaire de sous-monde pour créer une histoire,
	//  cette fonction vérifie si l'information transmise n'existe pas déjà.
	function verification_histoire_non_existante($bdd, $id_user, $titre){
		$histoire = $bdd->prepare("SELECT * FROM `story` WHERE `title` = :titre AND `id_user` = :id_user"); 
		$histoire->bindParam(":titre", $titre);
		$histoire->bindParam(":id_user", $id_user);
		$histoire->execute();
		$resultat = $histoire->fetch();
		
		// Si le tableau de la requête est vide.
		// La fonction retourne un tableau avec pour première valeur vraie et le résultat de la requête.
		if ($resultat=="") {
			return array(TRUE, "") ;
		}
		// Sinon, elle retournera un tableau avec pour première valeur faux et le résultat de la requête.
		else return array(FALSE, $resultat) ;
	}
	
	// Ajoutent une ligne À la table Story, avec les informations fournies par l'utilisateur.
	// Après vérification des données du formulaire sous monde.
	// Puis créer un premier RP dans la table, appartenant au créateur de l'histoire.
	function creer_une_histoire($bdd, $id_user, $sous_monde, $titre, $bio){
		$date = new DateTime("now", new DateTimeZone('Europe/Paris') );
		$date = $date->format('Y-m-d H:i:s'); // Fournit la date de la FRANCE


		$creer = $bdd->query("INSERT INTO `story`(`title`, `id_user`, `id_under_world`, `bio`, `date`)
		VALUES ('$titre','$id_user','$sous_monde','$bio','$date')");
		$last_id_creer = $bdd->lastInsertId(); // Récupère la clé primaire, créé par la requête précédente.
		$bdd->query("INSERT INTO `rp`(`id_user`, `id_story`, `date`, `avant`, `apres`)
		VALUES ('$id_user','$last_id_creer','$date',NULL,NULL)");


		if($creer){
			$rp_first = $bdd->query("SELECT * FROM `rp` WHERE id_story = $last_id_creer AND `avant` IS NULL");
			$rp_first->execute();
			$resultat_1 = $rp_first->fetchAll();
			
			$histoire = $bdd->query("SELECT * FROM `story` WHERE id_story = $last_id_creer");
			$histoire->execute();
			$resultat_2 = $histoire->fetchAll();
			return array(function_alert("ça marche"),$resultat_1,$resultat_2);

		}
		else {
			return function_alert("problème");
			header("Location: sous-monde.php");
			exit();
		}
	}

	function correction_story($bdd,$histoire,$user){
		$date = new DateTime("now", new DateTimeZone('Europe/Paris') );
		$date = $date->format('Y-m-d H:i:s'); // Fournit la date de la FRANCE
		
		$bdd->query("INSERT INTO `rp`(`id_user`, `id_story`, `date`, `avant`, `apres`)
		VALUES ('$user','$histoire','$date',NULL,NULL)");
		$last_id_creer = $bdd->lastInsertId(); // Récupère la clé primaire, créé par la requête précédente.

		$file = $_SERVER['DOCUMENT_ROOT']. "/reedifica/docs/rp/".$last_id_creer.'.txt';

		file_put_contents($file, "");
	}

	function faire_un_rp($bdd,$histoire,$user){
		$avant_rp = $bdd->query("SELECT id_rp FROM `rp` WHERE id_story = $histoire AND `apres` IS NULL");
		$avant_rp->execute();
		$avant_rp = $avant_rp->fetch();
		
		$date = new DateTime("now", new DateTimeZone('Europe/Paris') );
		$date = $date->format('Y-m-d H:i:s'); // Fournit la date de la FRANCE

		$bdd->query("INSERT INTO `rp`(`id_user`, `id_story`, `date`, `avant`, `apres`)
		VALUES ('$user','$histoire','$date',".$avant_rp['id_rp'].",NULL)");
		$last_id_creer = $bdd->lastInsertId(); // Récupère la clé primaire, créé par la requête précédente.
		$bdd->query("UPDATE `rp` SET `apres` = $last_id_creer WHERE `id_rp` = ".$avant_rp['id_rp']);

		$apres_rp = $bdd->query("SELECT * FROM `rp` WHERE id_story = $histoire AND `apres` IS NULL");
		$apres_rp->execute();
		$resultat = $apres_rp->fetch();
		return $resultat;
	}

	function modifier($bdd,$histoire){
		$apres_rp = $bdd->query("SELECT * FROM `rp` WHERE id_story = $histoire AND `apres` IS NULL");
		$apres_rp->execute();
		$resultat = $apres_rp->fetch();
		return $resultat;
	}
	function supprimer_rp($bdd,$numero_H){
		$actuel_rp = $bdd->query("SELECT * FROM `rp` WHERE id_story = $numero_H AND `apres` IS NULL");
		$actuel_rp->execute();
		$resultat = $actuel_rp->fetch();
		$apres_rp = $resultat["apres"];
		$avant_rp = $resultat["avant"];

		if($avant_rp == NULL && $apres_rp == NULL){
			unlink($_SERVER['DOCUMENT_ROOT']. "/reedifica/docs/rp/".$resultat["id_rp"].'.txt');
		}
		else{
			$bdd->query("DELETE FROM `rp` WHERE id_story = $numero_H AND `apres` IS NULL");
			$bdd->query("UPDATE `rp` SET `apres` = NULL WHERE `id_rp` = $avant_rp");
			unlink($_SERVER['DOCUMENT_ROOT']. "/reedifica/docs/rp/".$resultat["id_rp"].'.txt');
		}

	}
	function supprimer_histoire($bdd,$numero_H){
		$actuel_rp = $bdd->query("SELECT * FROM `rp` WHERE id_story = $numero_H");
		$actuel_rp->execute();
		$resultat = $actuel_rp->fetch();
		unlink($_SERVER['DOCUMENT_ROOT']. "/reedifica/docs/rp/".$resultat["id_rp"].'.txt');
		$bdd->query("DELETE FROM `rp` WHERE id_story = $numero_H");
		$bdd->query("DELETE FROM `story` WHERE id_story = $numero_H");

	}

	function recherche_histoire($bdd,$numero){
		$histoire = $bdd->query("SELECT * FROM `rp` WHERE id_story = $numero");
		$histoire->execute();
		$resultat = $histoire->fetchAll();
		return $resultat;
	}
	
	function recherche_histoire_user($bdd,$id_user){
		$histoire = $bdd->query("SELECT * FROM `story` WHERE id_user = $id_user");
		$histoire->execute();
		$resultat = $histoire->fetchAll();
		return $resultat;
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

	class administration
	{
	// BO
	
		public $_mdp;

		public function pass_hash($mdp){
			return $this->_mdp = password_hash($mdp, PASSWORD_DEFAULT); 	
		}
	
		protected function EstClePrimaire($nom_champ) 
		{
			return strpos($nom_champ, "id_")===0;
		}

	// NETTOYAGE

		public function clear($bdd){
			$info_table = $bdd->query("SELECT * FROM `story`");
			$info_table->execute();
			$resultat = $info_table->fetchAll();
			$dir = $_SERVER['DOCUMENT_ROOT']. "/reedifica/docs/rp";
			if(empty($resultat)){
				if (!is_dir($dir)) {
					mkdir($dir);
				}
				else{
					$files = glob($dir.'/*'); 
					foreach($files as $file) {
   
						if(is_file($file)) 
						
							// Delete the given file
							unlink($file); 
					}
					rmdir($dir);
					mkdir($dir);
				}
				
				$bdd->query("TRUNCATE TABLE `rp`");
				return function_alert("la table story est vide, RP va être reset");
			}
			else return function_alert("tout va bien");
		}
	}
?>
