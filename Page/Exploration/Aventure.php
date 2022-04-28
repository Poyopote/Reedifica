<?php
//INCLUSION DES FONCTIONS

  include("../../includes/fonctions.php");
  require "../../includes/init_twig.php";

//SESSION + INCLUSION DE LA BDD + Initialization

  include("../../includes/init_BDD.php");
  session_start();
  $bdd = connexion_bdd();

  $vide_fichier = FALSE;

// SESSION + Initialization + REQUETES
  $user_pseudo = user_connect();
  $tableau_utilisateur = info_utilisateur_profil($bdd,$user_pseudo);

  
  $export_twig_aventure = [];


  if(!isset($_GET["num"])){
    header("Location: Mondes.php");
  }
  $numero_H = $_GET["num"];
  $histoire = get_histoire($bdd,$numero_H);
  if(empty($histoire)){
    header("Location: Mondes.php");
  }
  $aventure = recherche_histoire($bdd,$numero_H);
  $sous_monde = get_sous_monde($bdd,$histoire["id_under_world"]);
  $monde = recherche_monde($bdd,$sous_monde["id_world"]);
  if(empty($aventure)){
    correction_story($bdd,$numero_H,$histoire['id_user']);
    header('Location: Aventure.php?num='.$numero_H);
  }

  foreach($aventure as $key => $rp)
  {
    $une_aventure = [];
    $personnage = profil($bdd,$rp['id_user']);
    $une_aventure["pseudo"] = $personnage["pseudo"];
    $une_aventure["image"] = $personnage["image"];
    $une_aventure["nom"] = $personnage["nom"];
    $une_aventure["prenom"] = $personnage["prenom"];

    $lines = FALSE;
    if (file_exists('../../docs/rp/'.$rp['id_rp'].'.txt')) {
      $lines = file_get_contents('../../docs/rp/'.$rp['id_rp'].'.txt');

      if(!$lines && (trim($lines) == "") )
      {
        $lines = file_get_contents('../../docs/rien.txt');
        $vide_fichier = TRUE;

      }
    }
    else{
      file_put_contents('../../docs/rp/'.$rp['id_rp'].'.txt', "");
      $lines = file_get_contents('../../docs/rien.txt');
      $vide_fichier = TRUE;
      }
    $une_aventure["contenu"]= $lines;

    $une_aventure["repondre"] = is_array($tableau_utilisateur) && ($tableau_utilisateur["id_user"] != $rp["id_user"]) && ($rp["apres"] == NULL) && ($vide_fichier == FALSE);
    $une_aventure["modifier"] = is_array($tableau_utilisateur) && ($tableau_utilisateur["id_user"] == $rp["id_user"]) && ($rp["avant"] != NULL ) && ($rp["apres"] == NULL );
    $une_aventure["supprimer"] = is_array($tableau_utilisateur) && ($tableau_utilisateur["id_user"] == $rp["id_user"]) && ($rp["avant"] == NULL ) && ($rp["apres"] == NULL );
    $export_twig_aventure[] = $une_aventure;

  }

  // Génération du Twig
  echo $twig->render('Aventure.html.twig', 
  array('lang' => $lang,
  'titre' => "Aventure ".$histoire["title"]." - Ré.édifica",
  'css_style' => "../../css/style.css",
  'css_page' => "../../css/exploration.css",
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
  'histoire' => $histoire,
  'aventure' => $export_twig_aventure,
  'sous_monde' => $sous_monde,
  'monde' => $monde,
  'numero_H' => $numero_H

));
?>