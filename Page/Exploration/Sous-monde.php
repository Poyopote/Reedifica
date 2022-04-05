<?php
//INCLUSION DES FONCTIONS

include("../../includes/fonctions.php");
require "../../includes/init_twig.php";
//INCLUSION DE LA BDD

  include("../../includes/init_BDD.php");
  $bdd = connexion_bdd();

    session_start();
    $user_pseudo = user_connect();
    // $id_user = info_utilisateur_profil($bdd,$user_pseudo);


    if(isset($_GET["lieu"])){
        $lieu = $_GET["lieu"];
        
        if(get_sous_monde($bdd,$lieu) == ""){
          header("Location: Mondes.php");
        }
    }
    else header("Location: Mondes.php");


    if(isset($_GET["error"])){
      $tableau = $_SESSION["sous_monde"];
      $error =false;
    }
    else {
      $tableau = $_SESSION["sous_monde"] = "";
      $error =true;
    }
    
    // print_r(nbr_histoire($bdd,$lieu)) ;

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
    'deconnexion' => "../../includes/deconnexion.php",
    'connexion' => "../../Page/Utilisateur/connexion.php",
    'inscription' => "../../Page/Utilisateur/inscription.php",
    "chemin_image_user" => "../../docs",

    // lien footer
    "reedifica" => "../../img/Logo_complet.svg",

    // donnée de la page
    'connecter' => !isset($_SESSION["login"]),
    'liste' => get_sous_monde($bdd,$lieu),
    'user' => info_utilisateur_profil($bdd,$user_pseudo),
    'lieu' => $lieu,
    'error' => $error,
    'probleme' => $tableau,
    'source' => htmlspecialchars($_SERVER["PHP_SELF"])."?lieu=".$lieu,
    'histoires' =>nbr_histoire($bdd,$lieu)

    

));
?>