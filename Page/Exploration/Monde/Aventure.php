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
    <link rel="icon" href="../../../img/Logo_favicon.svg">
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
        <input type="checkbox" id="menu-bouton">
  <label for="menu" aria-describedby="label"><i class="bi bi-list-task"></i></label>

            <ul>
                <li><a href="../../../index.php"><i class="bi bi-house"></i> Accueil</a></li>
                <li><i class="bi bi-book"></i> Histoire
                  <ul>
                    <li><a href="../../../Page/Histoire/contexte.php">Il était une fois...</a></li>
                    <li><a href="../../../Page/Histoire/nouveauté/info.php">Nouveauté</a></li>
                  </ul>
                </li> 
                <li><a href="../../../Page/Exploration/Mondes.php"><i class="bi bi-send"></i> Exploration</a></li>
                <li><a href="../../../Page/Membres/Liste.php"a><i class="bi bi-people"></i> Membres</a></li>
                <li><i class="bi bi-question-octagon-fill"></i> Guide
                  <ul>
                    <li><a href="../../../Page/Guide/Tutoriel.php">Tutoriel</a></li>
                    <li><a href="../../../Page/Guide/Réglementation.php">Réglementation</a></li>
                    <li><a href="../../../Page/Guide/F-A-Q.php">F.A.Q</a></li>
                  </ul>
                </li>
            </ul>
            <div id="user">
            <p><i class="bi bi-person-circle"></i><?php echo $lien_user ?></p>
            </div>
        </nav>
    </header>
    <main>
      <div id="user"><?php $user_pseudo ?></div>
    </main>
<div>
    <form method="post">
        <textarea id="tiny" rows="15" cols="80" style="width: 80%"></textarea>
        <button name="submitbtn">Poster</button>
   </form>
 </div>

 <script>
    tinymce.init({
      selector: 'textarea', //selecteur pour tiny
      language: 'fr_FR', // pour changer la langue du menu
      plugins: 'advlist link image lists save', //le plugine sont des modul qu'on rajoute
      toolbar: "save",
      save_enablewhendirty: true,
      images_upload_url: '../../../includes/postAcceptor.php',
      save_onsavecallback: function()
      {


        const text = encodeURIComponent(tinyMCE.get('tiny').getContent());
        // var user = tinyMCE.get('tiny').getContent()

        console.log(text);
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) { // 4 si l'opération est terminer
            alert("Requête effectuée !")
            console.log(this.responseText)
          }
        };
        xmlhttp.open("POST", "test.php", true);
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.send(`text=${ text }&user=<?php echo $user_pseudo; ?>`);
      },
      menu:{
        format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript | blockformats fontformats fontsizes align lineheight | forecolor backcolor | removeformat' },
      }
      
    });
  </script>
  <script src="../../../script/redaction.js"></script>
    <script src="../../../script/menu.js"></script>

</body>
</html>