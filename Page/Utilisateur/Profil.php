<?php
//INCLUSION DES FONCTIONS

  include("../../includes/fonctions - Copie.php");
  require "../../includes/init_twig.php";
//INCLUSION DE LA BDD

  include("../../includes/init_BDD.php");
  $bdd = connexion_bdd();
  

  session_start();
  include("../../includes/profil_fonctions.php");

  $toto= nombre_user($bdd);
  $toto[] = "salut";
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

</head>
<body>

<header>
  <nav id="navbar">
  <?php echo $bonjour?>
  <input type="checkbox" id="menu-bouton">
  <label for="menu" aria-describedby="label"><i class="bi bi-list-task"></i></label>
    <ul>
      <li><a href="../../index.php"><i class="bi bi-house"></i> Accueil</a></li>
      <li><i class="bi bi-book"></i> Histoire
        <ul>
          <li><a href="../../Page/Histoire/contexte.php">Il était une fois...</a></li>
          <li><a href="../../Page/Histoire/nouveauté/info.php">Nouveauté</a></li>
        </ul>
      </li> 
      <li><a href="../../Page/Exploration/Mondes.php"><i class="bi bi-send"></i> Exploration</a></li>
      <li><a href="../../Page/Membres/Liste.php"><i class="bi bi-people"></i> Membres</a></li>
      <li><i class="bi bi-question-octagon-fill"></i> Guide
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
    <p><?php echo ("Pseudo : ". $tableau_utilisateur["pseudo"]);?></p>
  <br>
  <input type="color" name="couleur">

  <input type="button" value="Modifier profil">
  </section>

  
  <section>
    <h3>Mon Histoire</h3>
    <article>
      <h4>Une monde pas comme les autres...</h4>
      <p class="date">Créé le 15/03/2022</p>
      <p>Alors par où commencer j'étais tranquille devant la télé... <?php print_r($toto)  ?><p>
      <hr>
    </article>
    
    <article>
      <h4>Drôle de coq.</h4>
      <p class="date">Créé le 15/03/2022</p>
      <p>Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.<p>
      <hr>
    </article>
  </section>
  
  <aside>
    <h5>Que souhaites-tu changer ?</h5>
      
        <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
          <input type="hidden" name="voir_form" value="1" />
          <fieldset>
            <legend>Biographie</legend>
            <h6>Texte actuel :</h6>
            <p>fgdfgs</p>
            <textarea id="bio" type="text" name="bio"></textarea>
          </fieldset>
          <fieldset >
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
<!-- <script src="../../script/menu.js"></script> -->
<!-- <script src="../../script/redaction.js"></script> -->

<script src="../../script/formulaire-profil_bio.js"></script>
</body>
</html>