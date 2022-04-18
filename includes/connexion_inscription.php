<?php

//INCLUSION DES FONCTIONS

	require_once("fonctions.php");

//INCLUSION DE LA BDD

	require_once("init_BDD.php");
	$bdd = connexion_bdd();

//RECUPERATION DONNEES FORMULAIRE DE CONNEXION ET VERIFICATION

	session_start();
	$_SESSION["formulaire"] = $_POST["formulaire"];

	if($_SESSION["formulaire"] == 0)
	{

		$identifiants = verification_donnees_connexion_non_nulles($_POST["login"], $_POST["mdp"], "../Page/Utilisateur/connexion.php", "Le Pseudo ou le mot de passe est invalide !");

	//VERIFICATION DES DONNEES DANS LA BDD POUR CONNEXION

		$utilisateur = requete_connexion ($bdd, "pseudo", "mdp", "user", "pseudo", $identifiants[0]);

		requete_connexion_verification ($utilisateur, $identifiants[1], $utilisateur["mdp"], $identifiants[0], $identifiants[1], "../Page/Utilisateur/connexion.php", "Le Pseudo ou le mot de passe est invalide !", "../Page/Utilisateur/Profil.php");

	}
	if($_SESSION["formulaire"] == 2)
	{
		$_SESSION["formulaire"] = 1;
		$donnees_inscription = verification_donnees_inscription_non_nulles($_POST["email"], htmlentities($_POST["login"], ENT_QUOTES), $_POST["mdp"], "../Page/Utilisateur/inscription.php", "Veuillez renseigner tous les champs !", "email invalide !");

		$email = requete_verification_donnees_inscription ($bdd, "email", "user", "email", $donnees_inscription[0]);
		$login = requete_verification_donnees_inscription ($bdd, "pseudo", "user", "pseudo", $donnees_inscription[1]);
		
		enregistrement_donnees_1($email, $login, "../Page/Utilisateur/inscription.php", "Cet email est déjà utilisé !", "Ce login existe déjà !");
	}
	if($_SESSION["formulaire"] == 4)
	{
		$_SESSION["formulaire"] = 5;
		$_SESSION["inscription"]['don'] = $_POST["don"];
		header('Location: ../Page/Utilisateur/inscription.php');
		
		// enregistrement_donnees_2($email, $login, "../index.php", "Cet email est déjà utilisé !", "Ce login existe déjà !");
	}
	if($_SESSION["formulaire"] == 6)
	{
		
		enregistrement_donnees_2(htmlentities($_POST["nom"], ENT_QUOTES), htmlentities($_POST["prenom"], ENT_QUOTES),$bdd, "user", $_SESSION["inscription"]['email'],$_SESSION["inscription"]['login'],$_SESSION["inscription"]['mdp'],$_SESSION["inscription"]['don'],	"../Page/Utilisateur/inscription.php", "Veuillez compléter le Prénom. !");
	}

?>