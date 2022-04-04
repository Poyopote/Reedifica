<?php
//INCLUSION DES FONCTIONS

include("../../includes/fonctions - Copie.php");
require "../../includes/init_twig.php";
//INCLUSION DE LA BDD

  include("../../includes/init_BDD.php");
  $bdd = connexion_bdd();

    session_start();

    echo $twig->render('liste.html.twig', 
    array('lang' => $lang,
    'titre' => "Membres - Ré.édifica",
    'css_style' => "../../css/style.css",
    'css_page' => "../../css/membres.css",
    'icon' => "../../img/Logo_favicon.svg",
    'index' => "../../index.php",
    'contexte' => "../../Page/Histoire/contexte.php",
    'info' => "../../Page/Histoire/nouveauté/info.php",
    'Mondes' => "../../Page/Exploration/Mondes.php",
    'Liste' => "Liste.php",
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
    "membres" => liste_des_membres($bdd),
    'connecter' => !isset($_SESSION["login"])

));

?>