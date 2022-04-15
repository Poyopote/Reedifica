<?php
//INCLUSION DES FONCTIONS

  include("../../includes/fonctions.php");
  require "../../includes/init_twig.php";
//INCLUSION DE LA BDD

  include("../../includes/init_BDD.php");
  $bdd = connexion_bdd();

  session_start();
  $les_histoire = $error = $table_selectionnee = "";
  $user_pseudo = user_connect();

  $mon_compte = false;


// Vérifie si la personne est connecter
if(isset($_SESSION["login"])){
  //   Vérifie si c'est Le profil d'un autre
  if (isset($_GET['utilisateur']) && $_GET['utilisateur'] != "" && info_utilisateur_profil($bdd,$_GET['utilisateur']) && $_GET['utilisateur'] != $user_pseudo) {
    $tableau_utilisateur = info_utilisateur_profil($bdd,$_GET['utilisateur']);
    $filename = '../../Docs/'.$_GET['utilisateur'];
    $les_histoire = recherche_histoire_user($bdd,$tableau_utilisateur["id_user"]);
  }
  // ou son profil qu'il veut voir
  else {
    $tableau_utilisateur = info_utilisateur_profil($bdd,$user_pseudo);
    $filename = '../../Docs/'.$user_pseudo;   
    $mon_compte = true;
    $les_histoire = recherche_histoire_user($bdd,$tableau_utilisateur["id_user"]);
  }
}

// Sinon statut d'invité, vérifie si recherche_monde
else if (isset($_GET['utilisateur']) && $_GET['utilisateur'] != "" && info_utilisateur_profil($bdd,$_GET['utilisateur'])){

  $tableau_utilisateur = info_utilisateur_profil($bdd,$_GET['utilisateur']);
  $filename = '../../Docs/'.$_GET['utilisateur'];
  $les_histoire = recherche_histoire_user($bdd,$tableau_utilisateur["id_user"]);
}
// sinon propose de se connecter
else header("Location: ../../Page/Utilisateur/connexion.php");
    if (isset($_POST['send']) && $_POST['send'] == "Modifier l'image") {

      if (file_exists($filename)) {
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');//limite les types de fichiers qu'on importe --> l'user ne pourra pas importer un virus
        $extensionUpload = strtolower(substr(strrchr($_FILES['userfile']['name'], '.'), 1)); //extension du fichier chargé. substr = ignorer un caractère (ici le premier de la chaîne car on a mis le 1 comme limite). strrchr = prendre l'extension du fichier (avec le point) puisqu'on prend à partir du point. '.' = caractère que la chaîne ne va pas prendre en compte. 1 = limite de la chaîne
        
          if($_FILES['userfile']['size'] <= 3000000 ) {
          if(in_array($extensionUpload, $extensionsValides)) {//vérifie que l'extension du fichier chargé correspond aux extensions acceptées (d'abord la variable sur laquelle on applique la fonction in_array et ensuite les variables qu'on veut tester sur la chaîne
            
            // $filename.".".$extensionUpload;//chemin où sera upload la photo
            $new_image = $user_pseudo.".".$extensionUpload;
            $resultat = move_uploaded_file($_FILES['userfile']['tmp_name'], $filename."/".$new_image);//déplacer le fichier de nom (paramètre1) jusqu'à (paramètre2). tmp_name = chemin temporaire du fichier
            
            if($resultat){//vérifier que le déplacement s'est bien effectué
                
              image_de_profil($bdd,$user_pseudo,$new_image);
                header('Location: Profil.php');
            }
            else{
              $error = function_alert("Erreur durant l'importation de votre photo de profil");
              
            }
          }
          else{
            $error = function_alert("Votre photo de profil doit être au format jpg, jpeg, gif ou png");
          }
        }
        else{
          $error = function_alert("Poids limité à 2Mo");
        }

      }
      else {
        $error = function_alert("Une erreur est survenu, veuillez recommencer");
        mkdir($filename);
      }

    }
    if (isset($_POST['send']) && $_POST['send'] == "Modifier la description"){
      image_de_bio($bdd,$user_pseudo,$_POST['bio']);
      header('Location: Profil.php');
    }

  $toto= nombre_user($bdd);
  $toto[] = "salut";

  $tables_req = $bdd->query("SHOW TABLES;");
  $lignes_tables = $tables_req->fetchAll();
  if(isset($_POST['valider'])){
    $table_selectionnee = $_POST['valider'];
    $values_req = $bdd->query("SELECT * FROM $table_selectionnee");
	$lignes_values = $values_req->fetchAll(PDO::FETCH_ASSOC);
  }

if( $mon_compte == true && isset($_POST['valider']) ){
  $BackOffice = new administration();
  $BackOffice->clear($bdd);
}
  

  echo $twig->render('profil.html.twig', 
  array('lang' => $lang,
  'titre' => "Profil de ".$tableau_utilisateur["pseudo"]." - Ré.édifica",
  'css_style' => "../../css/style.css",
  'css_page' => "../../css/profil.css",
  'icon' => "../../img/Logo_favicon.svg",
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
  "chemin_image_user" => "../../docs",

  // lien footer
  "reedifica" => "../../img/Logo_complet.svg",

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
  'table_selectionnee' => $table_selectionnee


));
?>
