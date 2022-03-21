<?php
    session_start();
    if(!isset($_SESSION["login"])){
      $lien_user = '<a href="../../Page/Utilisateur/connexion.php">Connexion</a> | <a href="../../Page/Utilisateur/inscription.php">Inscription</a>';
    }
    else {
      $user_pseudo = $_SESSION["login"];
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
    <link rel="icon" href="img/Logo_favicon.svg">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/exploration.css">

    <title>Les Mondes - Ré.édifica</title>
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
    <main>
        <h2>Exploration</h2>
        <section id="monde">
            <h3>Choisi ta destination</h3>
            <article>
                <h4>Monde 1</h4>
                <img>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.
                </p>
            </article>
            <article>
                <h4>Monde 2</h4>
                <img src="#">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.
                </p>
            </article>
            <article>
                <h4>Monde 3</h4>
                <img>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.
                </p>
            </article>
        </section>
        <section id="sous-monde">
            <h3>sous monde disponible</h3>
            <article>
                <h4>sous monde 1</h4>
                <img>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.
                </p>
            </article>
            <article>
                <h4>sous monde 2</h4>
                <img>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.
                </p>
            </article>
            <article>
                <h4>sous monde 3</h4>
                <img>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.
                </p>
            </article>
            <article>
                <h4>sous monde 4</h4>
                <img>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.
                </p>
            </article>

            <article>
 
            </article>
        </section>
    </main>
    <footer id="footer">
        <div class="boite">
            <h3>Contactez-Nous</h3>
            <p><i class="bi bi-mailbox"></i> Reedifica@Reedifica.fr</p>
        </div>
        <div class="boite">
            <h3>Liens utiles</h3>
            <p><i class="bi bi-globe2"></i> Langue</p>
            <p><i class="bi bi-github"></i> Poyopote/Réédifica</p>
        </div>
        <div class="boite">
            <h3>Pages</h3>
            <p>Mentions Légals</p>
            <p>Plan du site</p>
        </div>
        <div class="boite">
            <img src="../../img/Logo_complet.svg" alt="logo-footer">
        </div>
    </footer>
    <script src="../../script/menu.js"></script>
</body>
</html>