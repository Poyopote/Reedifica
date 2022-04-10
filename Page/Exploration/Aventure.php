<?php
include("../../includes/fonctions.php");
// require "../../includes/init_twig.php";
//INCLUSION DE LA BDD

  include("../../includes/init_BDD.php");
  $bdd = connexion_bdd();
    session_start();
    $user_pseudo = user_connect();


    if(!isset($_GET["num"])){
        header("Location: Mondes.php");
    }
    $numero_H = $_GET["num"];
    $histoire = get_histoire($bdd,$numero_H);
    $aventure = recherche_histoire($bdd,$numero_H);
    
    $message = "";
    
    $sous_monde = get_sous_monde($bdd,$histoire["id_under_world"]);
    $monde = recherche_monde($bdd,$sous_monde["id_world"]);
    

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="Language" content="fr" />
  <meta name="copyright" content="© REEDIFICA.FR 2022" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#5b99c2">
  <meta name="Author" content="Steven Ladour"/>
  <link rel="icon" href="../../img/Logo_favicon.svg">
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
  <link rel="stylesheet" type="text/css" href="../../css/exploration.css">
  <title>Aventure "<?php echo $histoire["title"]?>" - Ré.édifica</title>
  <!-- SEO  -->
  <!-- <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/> -->
  <meta property="og:region" content="fr_FR"/>
  <meta property="og:type" content="website"/>
  <meta property="og:site_name" content="Ré.édifica"/>
  <meta name="description" content="Ré.édifica, le forum RP. "/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <header>
    <nav id="navbar">
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
      <p>      <i class="bi bi-person-circle"></i> <a href="../../Page/Utilisateur/connexion.php">Connexion</a> | <a href="../../Page/Utilisateur/inscription.php">Inscription</a>
            </p>
    </div>
    </nav>
</header>
<main>
<h1><i class="bi bi-send"></i> Exploration</h1>
<h6>Exploration <i class="bi bi-caret-right-fill"> </i> <?php echo $monde["name_world"]?> <i class="bi bi-caret-right-fill"></i> <?php echo $sous_monde["title"]?> <i class="bi bi-caret-right-fill"></i> <?php echo $histoire["title"]?> </h6>
<hr>
<header class="banniere-lieu">
    <h2><?php echo $histoire["title"]?></h2>
    <?php echo '<img src="../../img/'.$sous_monde["media"].'" alt="image_du_lieu">'?>
    <p><?php echo $histoire["bio"]?></p>
</header>
<section id="histoire">
    <?php

    foreach($aventure as $key => $rp){
        $personnage = profil($bdd,$rp['id_user']);
        echo "<aside>";

        echo '<img src="../../docs/'.$personnage["pseudo"].'/'.$personnage["image"].'" alt="image de profil">';
        echo "</aside>";
        
        $lines = file('../../docs/rp/'.$rp['id_rp'].'.txt');
        echo '<article class="rp">';
        foreach($lines as $line_num => $line) {
            echo $line;
        }
        echo "</article>";
        if($rp["apres"] == NULL){
            echo "<div class='clear'></div>";
            echo "<aside>";
            echo 'jsddmq';
            echo "</aside>";
        }
        echo "<div class='clear'></div>";
    }

    ?>
        
</section>

</main>
<footer id="footer">
  <nav>
    <div class="boite">
      <a href="../../index.php"><img src="../../img/Logo_complet.svg" alt="logo-footer"></a>
    </div>
    <div class="boite">
      <h3>Contacter Nous</h3>
      <p><i class="bi bi-envelope"></i> Reedifica@Reedifica.fr</p>
    </div>
    <div class="boite">
      <h3>En détails</h3>
      <p><i class="bi bi-patch-check"></i> Mentions Légals</p>
      <p><i class="bi bi-github"></i><a href="https://github.com/Poyopote/Reedifica/tree/php"> Poyopote/Réédifica</a></p>
    </div>
    <div class="boite fin">
      <h3>Liens util</h3>
      <p><i class="bi bi-globe2"></i> Langue : <a href="?lang=fr">FR</a> | <a href="?lang=en">EN</a> </p>
      <p><i class="bi bi-spotify"></i> Playlist de Réédifica</p>
    </div>
    <div>
    <ul>
      <li><a href="../../index.php"><i class="bi bi-house"></i> Accueil</a></li>
      <li>Histoire <i class="bi bi-book"></i> <a href="../../Page/Histoire/contexte.php">Il était une fois...</a> | <a href="../../Page/Histoire/nouveauté/info.php">Nouveauté</a></li>
      <li><a href="../../Page/Exploration/Mondes.php"><i class="bi bi-send"></i> Exploration</a></li>
      <li><a href="../../Page/Membres/Liste.php"><i class="bi bi-people"></i> Membres</a></li>
      <li>Guide <i class="bi bi-question-octagon-fill"></i> <a href="../../Page/Guide/Tutoriel.php">Tutoriel</a> | <a href="../../Page/Guide/Réglementation.php">Réglementation</a> | <a href="../../Page/Guide/F-A-Q.php">F.A.Q</a></li>
    </ul>
    </div>
  </nav>
</footer>
    <script src="../../script/select-monde.js" ></script>
    <script src="../../script/menu.js"></script>
</body>
</html>