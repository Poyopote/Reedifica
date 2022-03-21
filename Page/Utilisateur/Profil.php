<?php
//INCLUSION DES FONCTIONS

include("../../includes/fonctions - Copie.php");

//INCLUSION DE LA BDD

include("../../includes/init_BDD.php");
	$bdd = connexion_bdd();


  session_start();
  $user_pseudo = $_SESSION["login"];
  $error ="";
  // Vérifie s'il y une session utilisateur
  if(empty($user_pseudo))
  {
    //pas connecter ? donc redirection vers la page de connexion
    header("Location: ../../Page/Utilisateur/connexion.php");
  }
  //sinon tout va bien on change le menu de connexion.
  else $lien_user = '<a href="Profil.php">Profil</a> | <a href="../../includes/deconnexion.php">Déconnexion</a>';

  $tableau_utilisateur = info_utilisateur_profil($bdd,$user_pseudo);
  
  $filename = '../../Docs/'.$user_pseudo;
  

  if (isset($_POST['send'])) {



    if (file_exists($filename)) {
      // echo "Le fichier $filename existe.";
      // $test = $_POST['MAX_FILE_SIZE'];
      $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');//limite les types de fichiers qu'on importe --> l'user ne pourra pas importer un virus
      $extensionUpload = strtolower(substr(strrchr($_FILES['userfile']['name'], '.'), 1)); //extension du fichier chargé. substr = ignorer un caractère (ici le premier de la chaîne car on a mis le 1 comme limite). strrchr = prendre l'extension du fichier (avec le point) puisqu'on prend à partir du point. '.' = caractère que la chaîne ne va pas prendre en compte. 1 = limite de la chaîne
      // if($_FILES['userfile']['size'] <= $_POST['MAX_FILE_SIZE']) {
        if($_FILES['userfile']['size'] <= 2000000 ) {
        if(in_array($extensionUpload, $extensionsValides)) {//vérifie que l'extension du fichier chargé correspond aux extensions acceptées (d'abord la variable sur laquelle on applique la fonction in_array et ensuite les variables qu'on veut tester sur la chaîne
          // $filename.".".$extensionUpload;//chemin où sera upload la photo
          $new_image = $user_pseudo.".".$extensionUpload;
          $resultat = move_uploaded_file($_FILES['userfile']['tmp_name'], $filename."/".$new_image);//déplacer le fichier de nom (paramètre1) jusqu'à (paramètre2). tmp_name = chemin temporaire du fichier
          
          if($resultat){//vérifier que le déplacement s'est bien effectué
              image_de_profil($bdd,$user_pseudo,$new_image);
              header('Location: Profil.php');
          }
          else{
            $error = "<script> alert('Erreur durant l'importation de votre photo de profil');</script>";
          }
        }
        else{
          $error = "<script> alert('Votre photo de profil doit être au format jpg, jpeg, gif ou png');</script>";
        }
      }
      else{
        $error = "<script> alert('Poids limité à 2Mo');</script>";
      }
      

    }
    else {
      $error = "<script> alert('Recommence stp');</script>";
      mkdir($filename);
    }
    // header('Location: Profil.php');
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="Language" content="fr" />
    <meta name="copyright" content="© REEDIFICA.FR 2022" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#5b99c2">
    <meta name="Author" content="Steven Ladour" />
    <link rel="icon" href="../../img/Logo_favicon.svg">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/profil.css">

    <title>Mon profil</title>
    <!-- SEO  -->
    <!-- <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/> -->
    <meta property="og:region" content="fr_FR"/>
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="Ré.édifica"/>
    <meta property=”og:title” content="Laissez parler votre imaginaire." />
    <meta name="description" content="Ré.édifica, le forum RP. "/>
    <style>
      img{
        width: 15vw;
      }
    </style>
</head>
<body>

<header>
  <nav id="navbar">
  <h1>Profil de <?php echo $user_pseudo ?></h1>
    <ul>
      <li><a href="../../index.php"><i class="bi bi-house"></i> Accueil</a></li>
      <li><a href="#"><i class="bi bi-book"></i> Histoire</a>
        <ul>
          <li><a href="../../Page/Histoire/contexte.php">Il était une fois...</a></li>
          <li><a href="../../Page/Histoire/nouveauté/info.php">Nouveauté</a></li>
        </ul>
      </li> 
      <li><a href="../../Page/Exploration/Mondes.php"><i class="bi bi-send"></i> Exploration</a></li>
      <li><a href="../../Page/Membres/Liste.php"><i class="bi bi-people"></i> Membres</a></li>
      <li><a href="#"><i class="bi bi-question-octagon-fill"></i> Guide</a>
        <ul>
          <li><a href="../../Page/Guide/Tutoriel.php">Tutoriel</a></li>
          <li><a href="../../Page/Guide/Réglementation.php">Réglementation</a></li>
          <li><a href="../../Page/Guide/F-A-Q.php">F.A.Q</a></li>
        </ul>
      </li>
    </ul>
    <div id="user">
      <p><i class="bi bi-person-circle"></i> <?php echo $lien_user ?></p>
    </div> 
  </nav>
</header>
<main>
  <h2>Mon compte</h2>
  <section id="presentation">
    <h3>Bio</h3>
    <?php
      // print_r($tableau_utilisateur);
    ?>
    <img 
    <?php    echo ("src='".$filename."/".$tableau_utilisateur["image"])."'";?>
     alt="image-de-profil">
    <?php    echo ("<p>".$tableau_utilisateur["prenom"]." ".$tableau_utilisateur["nom"]."</p>");    ?>
    <p>Symbole : Lunette correctionnelle</p>
    <?php    echo ("<p>Grade : ".$tableau_utilisateur["grade"]."</p>");    ?>
    <p>Capacités : </p>
    <p><?php echo ("Pseudo : ". $user_pseudo);?></p>
  </section>

  
  <section>
    <h3>Mon Histoire</h3>
    <article>
      <h4>Une monde pas comme les autres...</h4>
      <p class="date">Créé le 15/03/2022</p>
      <p>Alors par où commencer j'étais tranquille devant la télé...<p>
      <hr>
    </article>
    
    <article>
      <h4>Drôle de coq.</h4>
      <p class="date">Créé le 15/03/2022</p>
      <p>Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. 
        .<p>
          <hr>
    </article>
  </section>
  <aside>
    <h5>Que souhaites-tu changer ?</h5>
      
        <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
          <input type="hidden" name="voir_form" value="1" />
          <fieldset>
            <legend>Biographie</legend>
            <h6>Texte actuel :</h6>
            <p>fgdfgs</p>
            <textarea id="bio" type="text" name="bio"></textarea>
          </fieldset>
          <fieldset>
            <legend>Photo de profil</legend>
            
            <input id="idfile" name="userfile" type="file"/>
          </fieldset>
          <input name="send" type="submit" value="Envoyer"/>
          <input type="reset" value="Annuler"/>          
        </form>
  </aside>
</main>
<div class="clear"></div>
<footer id="footer">
  <div class="boite">
    <h3>Contacter Nous</h3>
    <p><i class="bi bi-mailbox"></i> Reedifica@Reedifica.fr</p>
  </div>
  <div class="boite">
  <h3>Liens util</h3>
  <p><i class="bi bi-globe2"></i> Langue : <a href="?lang=fr">FR</a> | <a href="?lang=en">EN</a> </p>
  <p><a href="https://github.com/Poyopote"><i class="bi bi-github"></i> Poyopote/Réédifica</a></p>
  </div>
  <div class="boite">
    <h3>Pages</h3>
    <p>Mentions Légals</p>
    <p>Plan du site</p>
  </div>
</footer>
<?php if($error != "") echo $error ?>
<script src="script/menu.js"></script>
<script src="script/formulaire-profil_bio.js"></script>
</body>
</html>