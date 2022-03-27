<?php
    session_start();
    require "includes/init_twig.php";
    if(!isset($_SESSION["login"])){
      $lien_user = '<a href="Page/Utilisateur/connexion.php">Connexion</a> | <a href="Page/Utilisateur/inscription.php">Inscription</a>';
    }
    else {
      $user_pseudo = $_SESSION["login"];
      $lien_user = '<a href="Page/Utilisateur/Profil.php">Profil</a> | <a href="includes/deconnexion.php">Déconnexion</a>';
    }

    $user_pseudo = false;
    $user_pseudo = isset($_SESSION["login"]);


// HEAD

    $lang = "fr";
    $titre ="Accueil - Ré.édifica";
    $css_style = "css/style.css";
    $css_page = "css/main.css";
    $icon = "img/Logo_favicon.svg";



    echo $twig->render('index.html.twig', 
    array('lang' => $lang,
    'titre' => "Accueil - Ré.édifica",
    'css_style' => "css/style.css",
    'css_page' => "css/main.css",
    'icon' => "img/Logo_favicon.svg",
    'index' => "index.php",
    'contexte' => "Page/Histoire/contexte.php",
    'info' => "Page/Histoire/nouveauté/info.php",
    'Mondes' => "Page/Exploration/Mondes.php",
    'Liste' => "Page/Membres/Liste.php",
    'Tutoriel' => "Page/Guide/Tutoriel.php",
    'Réglementation' => "Page/Guide/Réglementation.php",
    'FAQ' => "Page/Guide/F-A-Q.php",
    'connecter' => !isset($_SESSION["login"]),
    'Profil' => "Page/Utilisateur/Profil.php",
    'deconnexion' => "includes/deconnexion.php",
    'connexion' => "Page/Utilisateur/connexion.php",
    'inscription' => "Page/Utilisateur/inscription.php",
    "reedifica" => "img/Logo_complet.svg"

  ));

?>