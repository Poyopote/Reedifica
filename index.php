<?php
//INCLUSION DES FONCTIONS & DU TWIG

  include("includes/fonctions.php");
  require "includes/init_twig.php";

//SESSION + INCLUSION DE LA BDD + Initialization

  include("includes/init_BDD.php");
  session_start();
  $bdd = connexion_bdd();
  include("includes/initialisation.php");

//REQUETES

  $user_pseudo = user_connect();
  $choix = list_monde($bdd);
  $langue = langue($bdd, $lang);

  // Génération du Twig
  echo $twig->render('index.html.twig', 
  array('lang' => $lang,
  'titre' => "Accueil - Ré.édifica",
  'css_style' => "css/style.css",
  'css_page' => "css/main.css",
  'icon' => "img/Logo_favicon.svg",
  "chemin_image_user" => "docs",
  "reedifica" => "img/Logo_complet.svg",

  // menu de navigation
  'index' => "index.php",
  'contexte' => "Page/Histoire/contexte.php",
  'info' => "Page/Histoire/nouveauté/info.php",
  'Mondes' => "Page/Exploration/Mondes.php",
  'Liste' => "Page/Membres/Liste.php",
  'Tutoriel' => "Page/Guide/Tutoriel.php",
  'Réglementation' => "Page/Guide/Réglementation.php",
  'FAQ' => "Page/Guide/F-A-Q.php",
  'Profil' => "Page/Utilisateur/Profil.php",
  'deconnexion' => "includes/deconnexion.php",
  'connexion' => "Page/Utilisateur/connexion.php",
  'inscription' => "Page/Utilisateur/inscription.php",


  // donnée de la page
  'connecter' => !isset($_SESSION["login"]),
  'user' => info_utilisateur_profil($bdd,$user_pseudo),
  'choix' => $choix,
  'liste_choix' => liste_index_sous_monde($bdd),

  //langue texte
  'menu_index' => $langue[0][$lang],
  'menu_histoire' => $langue[1][$lang],
  'menu_il_était' => $langue[2][$lang],
  'menu_nouveaute' => $langue[3][$lang],
  'menu_exploration' => $langue[4][$lang],
  'menu_membres' => $langue[5][$lang],
  'menu_guide' => $langue[6][$lang],
  'menu_tutoriel' => $langue[7][$lang],
  'menu_reglementation' => $langue[8][$lang],
  'menu_faq' => $langue[9][$lang],
  'menu_connexion' => $langue[10][$lang],
  'menu_inscription' => $langue[11][$lang],
  'menu_profil' => $langue[12][$lang],
  'menu_deconnexion' => $langue[13][$lang],
  

));

?>
