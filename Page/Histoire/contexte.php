<?php
//INCLUSION DES FONCTIONS

include("../../includes/fonctions - Copie.php");
require "../../includes/init_twig.php";
//INCLUSION DE LA BDD

  include("../../includes/init_BDD.php");
  $bdd = connexion_bdd();

    session_start();

    $lang = "fr";

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

    // lien footer
    "reedifica" => "../../img/Logo_complet.svg",

    // donnée de la page

    'connecter' => !isset($_SESSION["login"])

));

?>