<?php
//INCLUSION DES FONCTIONS

include("../../includes/fonctions - Copie.php");
require "../../includes/init_twig.php";
//INCLUSION DE LA BDD

  include("../../includes/init_BDD.php");
  $bdd = connexion_bdd();

    session_start();

    if(isset($_GET["lieu"])){
        $lieu = $_GET["lieu"];   
    }
    else header("Location: Mondes.php");
    
    if (isset($_SESSION["login"])) {
      $user_pseudo = $_SESSION["login"];
    }
    else $user_pseudo="";
    $date = new DateTime("now", new DateTimeZone('Europe/Paris') );
		echo $date->format('Y-m-d H:i:s');

    echo $twig->render('sous_monde.html.twig', 
    array('lang' => $lang,
    'titre' => "Exploration - Ré.édifica",
    'css_style' => "../../css/style.css",
    'css_page' => "../../css/exploration.css",
    'icon' => "../../img/Logo_favicon.svg",
    'index' => "../../index.php",
    'contexte' => "../../Page/Histoire/contexte.php",
    'info' => "../../Page/Histoire/nouveauté/info.php",
    'Mondes' => "Mondes.php",
    'Liste' => "../../Page/Membres/Liste.php",
    'Tutoriel' => "../../Page/Guide/Tutoriel.php",
    'Réglementation' => "../../Page/Réglementation.php",
    'FAQ' => "../../Page/Guide/F-A-Q.php",
    'Profil' => "../../Page/Utilisateur/Profil.php",
    'deconnexion' => "../../Page/includes/deconnexion.php",
    'connexion' => "../../Page/Utilisateur/connexion.php",
    'inscription' => "../../Page/Utilisateur/inscription.php",

    // lien footer
    "reedifica" => "../../img/Logo_complet.svg",

    // donnée de la page

    'connecter' => !isset($_SESSION["login"]),
    'liste' => get_sous_monde($bdd,$lieu),
    'user' => $user_pseudo,
    'lieu' => $lieu

));
?>