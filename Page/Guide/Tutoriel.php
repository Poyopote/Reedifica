<?php
//INCLUSION DES FONCTIONS

    include("../../includes/fonctions.php");
    require "../../includes/init_twig.php";

//SESSION + INCLUSION DE LA BDD + Initialization

    include("../../includes/init_BDD.php");
    session_start();
    $bdd = connexion_bdd();

// LES REQUETES
  $user_pseudo = user_connect();


  // Génération du Twig
  echo $twig->render('Tutoriel.html.twig', 
  array('lang' => $lang,
  'titre' => "Tutorial - Ré.édifica",
  'css_style' => "../../css/style.css",
  'css_page' => "../../css/tutoriel.css",
  'icon' => "../../img/Logo_favicon.svg",
  "chemin_image_user" => "../../docs",
  "reedifica" => "../../img/Logo_complet.svg",
  
  // menu de navigation
  'index' => "../../index.php",
  'contexte' => "../../Page/Histoire/contexte.php",
  'info' => "../../Page/Histoire/nouveauté/info.php",
  'Mondes' => "../../Page/Exploration/Mondes.php",
  'Liste' => "../../Page/Membres/Liste.php",
  'Tutoriel' => "../../Page/Guide/Tutoriel.php",
  'Réglementation' => "../../Page/Guide/Réglementation.php",
  'FAQ' => "../../Page/Guide/F-A-Q.php",
  'Profil' => "../../Page/Utilisateur/Profil.php",
  'deconnexion' => "../../includes/deconnexion.php",
  'connexion' => "../../Page/Utilisateur/connexion.php",
  'inscription' => "../../Page/Utilisateur/inscription.php",


  // donnée de la page
  'connecter' => !isset($_SESSION["login"]),
  'user' => info_utilisateur_profil($bdd,$user_pseudo),


));
?>