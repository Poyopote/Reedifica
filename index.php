<?php
    session_start();
    require "includes/init_twig.php";
    if(!isset($_SESSION["login"])){
      $lien_user = '<a href="Page/Utilisateur/connexion.php">Connexion</a> | <a href="Page/Utilisateur/inscription.php">Inscription</a>';
    }
    else {
      $user_pseudo = $_SESSION["login"];
      $lien_user = '<a href="Page/Utilisateur/Profil.php">Profil</a> | <a href="includes/deconnexion.php">Déconnexion</a>';
    }

    $user_pseudo = false;
    $user_pseudo = isset($_SESSION["login"]);


// HEAD

    $lang = "fr";
    $titre ="Accueil - Ré.édifica";
    $css_style = "css/style.css";
    $css_page = "css/main.css";
    $icon = "img/Logo_favicon.svg";



    echo $twig->render('index.html.twig', 
    array('lang' => $lang,
    'titre' => "Accueil - Ré.édifica",
    'css_style' => "css/style.css",
    'css_page' => "css/main.css",
    'icon' => "img/Logo_favicon.svg",
    'index' => "index.php",
    'contexte' => "Page/Histoire/contexte.php",
    'info' => "Page/Histoire/nouveauté/info.php",
    'Mondes' => "Page/Exploration/Mondes.php",
    'Liste' => "Page/Membres/Liste.php",
    'Tutoriel' => "Page/Guide/Tutoriel.php",
    'Réglementation' => "Page/Guide/Réglementation.php",
    'FAQ' => "Page/Guide/F-A-Q.php",
    'connecter' => !isset($_SESSION["login"]),
    'Profil' => "Page/Utilisateur/Profil.php",
    'deconnexion' => "includes/deconnexion.php",
    'connexion' => "Page/Utilisateur/connexion.php",
    'inscription' => "Page/Utilisateur/inscription.php"

  
  ));

?>


  
  <main>
    <section id="accueil">
      <header id="intro">
        <h2>Bienvenue</h2>
    
        <img src="https://cdn.pixabay.com/photo/2018/01/25/17/48/fantasy-3106688_960_720.jpg" alt="image">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. 
            Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, 
            nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.
        </p>
      </header>
        <article id="actualite">
          <h3>Actualités</h3>
          <div id="carousel">
            <a class="carousel_button" onclick="changeImgLeft()"><i class="bi bi-arrow-left-circle-fill"></i></a>
            
            <img id="slideImg" src="" name="slide" alt="actu">
            
            <div id="carousel_text">
                <p name="carousel_text"></p>
                <button>Aller voir</button>
            </div>
            <a class="carousel_button" onclick="changeImgRight()"><i class="bi bi-arrow-right-circle-fill"></i></a>
          </div> 
        </article>
        <article id="Exploration">
            <h3>Exploration</h3>
            <section>
                <h4>Monde 1</h4>
                <p><img src="https://cdn.pixabay.com/photo/2018/01/25/17/48/fantasy-3106688_960_720.jpg">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.
                </p>
                <hr>
                <ul>
                  <li>Sous-lieu 1</li>
                  <li>Sous-lieu 2</li>
                </ul>
            </section>
            <section>
                <h4>Monde 2</h4>
                <p><img src="https://cdn.pixabay.com/photo/2018/01/25/17/48/fantasy-3106688_960_720.jpg">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.
                </p>
                <hr>
                <ul>
                  <li>Sous-lieu 1</li>
                  <li>Sous-lieu 2</li>
                </ul>
            </section>
            <section>
                <h4>Monde 3</h4>
                <p><img src="https://cdn.pixabay.com/photo/2018/01/25/17/48/fantasy-3106688_960_720.jpg">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.
                </p>
                <hr>
                <ul>
                  <li>Sous-lieu 1</li>
                  <li>Sous-lieu 2</li>
                </ul>
            </section>
        </article>
    </section>
  </main>
  <footer id="footer">
    <div class="boite">
      <h3>Contacter Nous</h3>
      <p><i class="bi bi-mailbox"></i> Reedifica@Reedifica.fr</p>
    </div>
    <div class="boite">
    <h3>Liens util</h3>
    <p><i class="bi bi-globe2"></i> Langue : <a href="?lang=fr">FR</a> | <a href="?lang=en">EN</a> </p>
    <p><i class="bi bi-github"></i><a href="https://github.com/Poyopote"> Poyopote/Réédifica</a></p>
    </div>
    <div class="boite">
      <h3>Pages</h3>
      <p>Mentions Légals</p>
      <p>Plan du site</p>
    </div>
    <div class="boite">
      <img src="img/Logo_complet.svg" alt="logo-footer">
    </div>
  </footer>
  <script src="script/menu.js"></script>

  <script src="script/carousel.js"></script>
  <script src="script/logo.js"></script>
</body>
</html>