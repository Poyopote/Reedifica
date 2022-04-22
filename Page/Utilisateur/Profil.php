<?php
//INCLUSION DES FONCTIONS

  include("../../includes/fonctions.php");
  require "../../includes/init_twig.php";

//SESSION + INCLUSION DE LA BDD + Initialization

  include("../../includes/init_BDD.php");
  session_start();
  $bdd = connexion_bdd();

  $les_histoire = $error = $table_selectionnee = $lignes_values = $lignes_columns = "";
  $cle_primaire ="valeur par defaut";
  $admin = $mon_compte = false;

// BACK OFFICE
  $BackOffice = new administration();
  if( $mon_compte == true && isset($_POST['valider']) && ($_POST['valider'] == "story" || $_POST['valider'] == "rp"))
    $BackOffice->clear($bdd);
  
  $tables_req = $bdd->query("SHOW TABLES;");
  $lignes_tables = $tables_req->fetchAll();

  if(isset($_POST['valider'])){
    $table_selectionnee = $_POST['valider'];
    $values_req = $bdd->query("SELECT * FROM $table_selectionnee");
    $lignes_values = $values_req->fetchAll(PDO::FETCH_ASSOC);
    
    $columns_req = $bdd->query("SHOW COLUMNS FROM $table_selectionnee");
    $lignes_columns = $columns_req->fetchAll();

    foreach($lignes_columns as $column)
    {
      if( $column['Key'] == "PRI" ) {
        $cle_primaire = $column['Field'];
        break;
      }
      
    }
    foreach ($lignes_values as &$ligne) {
      $ligne['clef_primaire_extraite_de_la_reponse'] =  $ligne["$cle_primaire"] ;
    }
  }

// LES REQUETES
  $user_pseudo = user_connect();


  // Doit afficher les informations d'un utilisateur Présent dans la base de données.
  // Connecté ?
  if(isset($_SESSION["login"])){

    // CAS 1: l'utilisateur est connecté et voir le profil d'un autre.
    if (isset($_GET['utilisateur']) && $_GET['utilisateur'] != "" && info_utilisateur_profil($bdd,$_GET['utilisateur']) && $_GET['utilisateur'] != $user_pseudo) {
      $tableau_utilisateur = info_utilisateur_profil($bdd,$_GET['utilisateur']);
      $filename = '../../Docs/'.$_GET['utilisateur'];
      $les_histoire = recherche_histoire_user($bdd,$tableau_utilisateur["id_user"]);
    }
    // CAS 2: l'utilisateur veut atteindre son profil.
    else {
      $tableau_utilisateur = info_utilisateur_profil($bdd,$user_pseudo);
      $filename = '../../Docs/'.$user_pseudo;   
      $mon_compte = true;
      if($tableau_utilisateur)
      $les_histoire = recherche_histoire_user($bdd,$tableau_utilisateur["id_user"]);
      else header("Location: ../../includes/deconnexion.php");
      $roles = role_user($bdd,$user_pseudo);
      
      foreach($roles as $role){
        if( $role['name_role'] == "Administrateur" ) {
          $admin = true;
          break;
        }
      }
    }
  }

  // Invité ?
  else if (isset($_GET['utilisateur']) && $_GET['utilisateur'] != "" && info_utilisateur_profil($bdd,$_GET['utilisateur'])){
    $tableau_utilisateur = info_utilisateur_profil($bdd,$_GET['utilisateur']);
    $filename = '../../Docs/'.$_GET['utilisateur'];
    $les_histoire = recherche_histoire_user($bdd,$tableau_utilisateur["id_user"]);
  }
  // S'il url est bidon propose de se connecter.
  else header("Location: ../../Page/Utilisateur/connexion.php");

  include("../../includes/upload_image_profil.php");


  
  // Génération du Twig
  echo $twig->render('profil.html.twig', 
  array('lang' => $lang,
  'titre' => "Profil de ".$tableau_utilisateur["pseudo"]." - Ré.édifica",
  'css_style' => "../../css/style.css",
  'css_page' => "../../css/profil.css",
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
  'Profil' => "Profil.php",
  'deconnexion' => "../../includes/deconnexion.php",
  'connexion' => "connexion.php",
  'inscription' => "inscription.php",


  // donnée de la page
  'connecter' => !isset($_SESSION["login"]),
  'filename' => $filename,
  'tableau_utilisateur' => $tableau_utilisateur,
  'form' => htmlspecialchars($_SERVER["PHP_SELF"]),
  'error' => $error,
  'mon_compte' => $mon_compte,
  'user' => info_utilisateur_profil($bdd,$user_pseudo),
  'histoires' => $les_histoire,
  'lignes_tables' =>  $lignes_tables,
  'bo_form' => isset($_POST['valider']),
  'table_selectionnee' => $table_selectionnee,
  'lignes_values' => $lignes_values,
  'lignes_columns' => $lignes_columns,
  'admin' => $admin

));
?>
