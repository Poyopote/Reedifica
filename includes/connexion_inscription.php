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
	if($_SESSION["formulaire"] == 8)
	{
		$donnees_inscription = verification_donnees_inscription_non_nulles($_POST["email"], $_POST["login"], $_POST["mdp"], "../index.php", "Veuillez renseigner tous les champs !", "email invalide !");

		$email = requete_verification_donnees_inscription ($bdd, "mail_utilisateur", "user", "mail_utilisateur", $donnees_inscription[0]);
		$login = requete_verification_donnees_inscription ($bdd, "pseudo", "user", "pseudo", $donnees_inscription[1]);

		enregistrement_donnees($email, $login, $bdd, "user", "mail_utilisateur", "pseudo", "mdp", $donnees_inscription[0], $donnees_inscription[1], $donnees_inscription[2], "../index.php", "Cet email est déjà utilisé !", "Ce login existe déjà !");
	}


?>