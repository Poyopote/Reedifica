<?php
//INCLUSION DES FONCTIONS

include("../../../includes/fonctions - Copie.php");
require "../../../includes/init_twig.php";
//INCLUSION DE LA BDD

  include("../../../includes/init_BDD.php");
  $bdd = connexion_bdd();

    session_start();



    $lang = "fr";

    echo $twig->render('sous_monde.html.twig', 
    array('lang' => $lang,
    'titre' => "Exploration - Ré.édifica",
    'css_style' => "../../../css/style.css",
    'css_page' => "../../../css/exploration.css",
    'icon' => "../../../img/Logo_favicon.svg",
    'index' => "../../../index.php",
    'contexte' => "../../Histoire/contexte.php",
    'info' => "../../Histoire/nouveauté/info.php",
    'Mondes' => "../Mondes.php",
    'Liste' => "../../Membres/Liste.php",
    'Tutoriel' => "../../Guide/Tutoriel.php",
    'Réglementation' => "../../Réglementation.php",
    'FAQ' => "../../Guide/F-A-Q.php",
    'Profil' => "../../Utilisateur/Profil.php",
    'deconnexion' => "../../../includes/deconnexion.php",
    'connexion' => "../../Utilisateur/connexion.php",
    'inscription' => "../../Utilisateur/inscription.php",

    // lien footer
    "reedifica" => "../../../img/Logo_complet.svg",

    // donnée de la page

    'connecter' => !isset($_SESSION["login"])

));