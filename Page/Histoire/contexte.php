<?php
//INCLUSION DES FONCTIONS

  include("../../includes/fonctions.php");
  require "../../includes/init_twig.php";

//SESSION + INCLUSION DE LA BDD + Initialization

  include("../../includes/init_BDD.php");
  session_start();
  $bdd = connexion_bdd();
  include("../../includes/initialisation.php");
//REQUETES

  $user_pseudo = user_connect();
  $langue = langue($bdd, $lang);

  echo $twig->render('contexte.html.twig', 
  array('lang' => $lang,
  'titre' => "Il y a... - Ré.édifica",
  'css_style' => "../../css/style.css",
  'css_page' => "../../css/histoire.css",
  'icon' => "../../img/Logo_favicon.svg",
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
  "chemin_image_user" => "../../docs",

  // lien footer
  "reedifica" => "../../img/Logo_complet.svg",

  // donnée de la page
  'user' => info_utilisateur_profil($bdd,$user_pseudo),
  'connecter' => !isset($_SESSION["login"]),


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

  'titre_histoire1' => $langue[16][$lang],
  'titre_histoire2' => $langue[17][$lang],
  'paragraphe_histoire_1' => $langue[18][$lang],
  'paragraphe_histoire2' => $langue[19][$lang],
  'titre_histoire3' => $langue[20][$lang],
  'paragraphe_histoire3' => $langue[21][$lang],
  'paragraphe_histoire_4' => $langue[22][$lang],
  'titre_histoire4' => $langue[23][$lang],
  'paragraphe_histoire5' => $langue[24][$lang],
  'paragraphe_histoire6' => $langue[25][$lang],
  'paragraphe_histoire_7' => $langue[26][$lang],
  'paragraphe_histoire8' => $langue[27][$lang],

));

?>