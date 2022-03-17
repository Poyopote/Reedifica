<?php
  session_start();
  $user_pseudo = $_SESSION["login"];
  if(empty($user_pseudo)){
    header("Location: ../../Page/Utilisateur/connexion.php");
    }
  else $lien_user = '<a href="Profil.php">Profil</a> | <a href="../../includes/deconnexion.php">Déconnexion</a>';
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
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@200&display=swap" rel="stylesheet">
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
      <li><a href="../../Page/Membres/Liste.php"a><i class="bi bi-people"></i> Membres</a></li>
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
    <img src="" alt="image-de-profil">
    <p>Valto X</p>
    <p>Symbole : Lunette correctionnelle</p>
    
    <p>Rang : Moderateur</p>
    <p>Capacités : </p>
    <!-- <p>Contacte : jesaispas@Reedifica.fr</p> -->
    <p>Pseudo Voltamaster</p>
  </section>
  <section id="">
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
<script src="script/menu.js"></script>
</body>
</html>