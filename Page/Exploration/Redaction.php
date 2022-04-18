<?php


include("../../includes/fonctions.php");
// require "../../includes/init_twig.php";
//INCLUSION DE LA BDD

  include("../../includes/init_BDD.php");
  $bdd = connexion_bdd();
    session_start();
    $user_pseudo = user_connect();
    $tableau_utilisateur = info_utilisateur_profil($bdd,$user_pseudo);
    $error = FALSE;
    // $_SESSION["histoire"] = null;

    // if(isset($_POST["creer"]) && isset($_SESSION["histoire"]) ){
    //   $error = TRUE;
    // }

if (!isset($_SESSION["histoire"])) {
  if(isset($_POST["creer"]) && (trim($_POST["titre"]) != "") ){
    $test = verification_histoire_non_existante($bdd,$_POST["id_createur"],htmlentities($_POST["titre"], ENT_QUOTES));

    if($test[0] == true){
      $reponse = creer_une_histoire($bdd,$_POST["id_createur"],$_POST["lieu"],htmlentities($_POST["titre"], ENT_QUOTES),htmlentities($_POST["bio"], ENT_QUOTES));
      echo $reponse[0];
      $_SESSION["histoire"] = $reponse[2][0];
      $_SESSION["rp"] = $reponse[1][0];
      header('Location: '.htmlspecialchars($_SERVER["PHP_SELF"]));
    }
    else {
      $_SESSION["sous_monde"] = $test[1];
      header('Location: '.$_POST["source"].'&error=existe');
    }
  }
  else if(isset($_POST["repondre"])){
    $numero_H = $_POST["numero_H"];
    $_SESSION["histoire"] = get_histoire($bdd,$numero_H);
    $_SESSION["rp"] = faire_un_rp($bdd,$numero_H,$tableau_utilisateur["id_user"]);
    header('Location: '.htmlspecialchars($_SERVER["PHP_SELF"]));
  }
  else if(isset($_POST["modifier"])){
    $numero_H = $_POST["numero_H"];
    $_SESSION["histoire"] = get_histoire($bdd,$numero_H);
    $_SESSION["rp"] = modifier($bdd,$numero_H);
    header('Location: '.htmlspecialchars($_SERVER["PHP_SELF"]));
  }
  else if(isset($_POST["supprimer"])){
    $numero_H = $_POST["numero_H"];
    supprimer_rp($bdd,$numero_H);
    header('Location: Aventure.php?num='.$numero_H);
  }
  else if(isset($_POST["reset"])){
    $numero_H = $_POST["numero_H"];
    supprimer_histoire($bdd,$numero_H);
    header('Location: ../../Page/Utilisateur/Profil.php');
  }
  else header('Location: sous-monde.php');
}
else {
  $table_histoire = $_SESSION["histoire"];
  $table_rp = $_SESSION["rp"];
}

    if(!isset($_SESSION["login"])){
      $lien_user = '<a href="../../Page/Utilisateur/connexion.php">Connexion</a> | <a href="../../Page/Utilisateur/inscription.php">Inscription</a>';
    }
    else {
      $lien_user = '<a href="../../Page/Utilisateur/Profil.php">Profil</a> | <a href="../../includes/deconnexion.php">Déconnexion</a>';
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
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="../../css/exploration.css"> -->

    <title><?php echo htmlspecialchars_decode($table_histoire["title"])?> - Ré.édifica</title>
    <!-- SEO  -->
    <!-- <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/> -->
    <meta property="og:region" content="fr_FR"/>
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="Ré.édifica"/>
    <meta property=”og:title” content="Laissez parler votre imaginaire." />
    <meta name="description" content="Ré.édifica, le forum RP. "/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/9l9qq4nwdkgka6q0qswr6rxerpw48f28hg6hpzbpf3a79g48/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
                <li><a href="../../Page/Membres/Liste.php"a><i class="bi bi-people"></i> Membres</a></li>
                <li><i class="bi bi-question-octagon-fill"></i> Guide
                  <ul>
                    <li><a href="../../Page/Guide/Tutoriel.php">Tutoriel</a></li>
                    <li><a href="../../Page/Guide/Réglementation.php">Réglementation</a></li>
                    <li><a href="../../Page/Guide/F-A-Q.php">F.A.Q</a></li>
                  </ul>
                </li>
            </ul>
            <div id="user">
            <p><i class="bi bi-person-circle"></i><?php echo $lien_user ?></p>
            </div>
        </nav>
    </header>
    <main>
    <?php
      if ($error) {
        echo "<p>une histoire est déjà en cours d'écriture</p>";
      }
    ?>
    </main>
<div>
    <form method="post">
      <textarea id="tiny" rows="15" cols="80" style="width: 80%">
      <?php
        if (file_exists('../../docs/rp/'.$table_rp['id_rp'].'.txt')) {
          $lines = file('../../docs/rp/'.$table_rp['id_rp'].'.txt');
          foreach($lines as $line_num => $line) {
            echo $line;
          }
        }
      ?>
      </textarea>
   </form>
 </div>
  <script src="../../script/redaction.js"></script>
    <script src="../../script/menu.js"></script>

</body>
</html>