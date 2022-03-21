<?php
    session_start();
    if(!isset($_SESSION["login"])){
      $lien_user = '<a href="../../../Page/Utilisateur/connexion.php">Connexion</a> | <a href="../../../Page/Utilisateur/inscription.php">Inscription</a>';
    }
    else {
      $user_pseudo = $_SESSION["login"];
      $lien_user = '<a href="../../../Page/Utilisateur/Profil.php">Profil</a> | <a href="../../../includes/deconnexion.php">Déconnexion</a>';
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
    <link rel="icon" href="img/Logo_favicon.svg">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../css/monde.css">

    <title>Sans-titre - Ré.édifica</title>
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
            <p><i class="bi bi-person-circle"></i><?php echo $lien_user ?></p>
            </div>
        </nav>
    </header>
<div>
    <form method="post">
        <textarea id="tiny"></textarea>
        <button name="submitbtn">Poster</button>
   </form>
 </div>

 <script>
    tinymce.init({
      selector: 'textarea', //selecteur pour tiny
      language: 'fr_FR', // pour changer la langue du menu
      plugins: 'advlist link image lists', //le plugine sont des modul qu'on rajoute
      menu:{
        format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript | blockformats fontformats fontsizes align lineheight | forecolor backcolor | removeformat' },
      }
    
    //   save_onsavecallback: function () { console.log('Saved'); } 
    });
  </script>
    <script src="../../../script/menu.js"></script>

</body>
</html>