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
    <link rel="icon" href="../../img/Logo_favicon.svg">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/histoire.css">

    <title>Il y a...</title>
    <!-- SEO  -->
    <!-- <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/> -->
    <meta property="og:region" content="fr_FR"/>
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="Ré.édifica"/>
    <meta name="description" content="Ré.édifica, le forum RP. "/>
    
    <!-- <script src="script/footer_etoilee.js"></script> -->
    <!-- <script src="script/logo.js"></script> -->
</head>
<body>
  <header></header>
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
  <main>
      <h2>Histoire - contexte</h2>
      <section>
          <h3>Notre histoire</h3>
              <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta quam libero, sit amet ullamcorper augue aliquet quis. Aliquam erat volutpat. Vestibulum urna nulla, vehicula eu lobortis ut, lobortis vitae odio. Nam erat enim, imperdiet a mauris sit amet, pulvinar sollicitudin diam. Sed interdum dolor eu diam dictum fermentum. In hac habitasse platea dictumst. Ut at est massa. Duis maximus tellus sed ex ultrices, quis pellentesque dolor cursus. Mauris quam nunc, dictum a turpis sit amet, elementum euismod lectus. Quisque eget maximus justo. </p>
              <p> Nam id finibus leo. Vivamus vitae erat non orci sodales viverra non eu ipsum. Morbi in nunc risus. Sed elit turpis, tristique id convallis eu, ultrices non sapien. Sed pellentesque mi vel tristique tincidunt. Proin sed auctor quam. Nam pulvinar sed massa in iaculis. Duis arcu lorem, sagittis sit amet lorem vitae, auctor ultrices lorem. Praesent eget porttitor justo. Fusce sollicitudin, ligula quis efficitur ultricies, tortor turpis rhoncus massa, eget aliquet tellus nibh at lectus. Donec id massa turpis. </p>
              <img src="https://cdn.pixabay.com/photo/2018/11/12/11/49/action-3810699_960_720.jpg" alt="test">
              <p> Nam lorem eros, tincidunt ac tellus posuere, aliquam aliquam sapien. Nullam ut ultrices felis. Aenean viverra justo sit amet lacus imperdiet, at interdum erat sodales. Nulla dictum venenatis arcu, nec lacinia mi semper in. Quisque ac augue vestibulum, tincidunt nunc vitae, pulvinar libero. Nam aliquam enim sed est dignissim lacinia. Fusce gravida rutrum orci, sit amet pharetra nisl venenatis eget. Proin rhoncus rhoncus urna, eget bibendum mauris scelerisque commodo. Donec posuere fermentum eros, eu dictum elit elementum eu. Proin gravida mollis consectetur. Fusce tincidunt placerat erat, ut imperdiet odio consectetur ac. Nulla cursus malesuada sapien eget tincidunt. Nullam tempor lorem facilisis ex pretium, ac gravida erat dictum. Vestibulum in tellus mollis, facilisis nisl quis, egestas justo. Maecenas eget mauris nec orci tincidunt congue. Morbi tristique lectus mollis velit blandit ornare. </p>
              <p> Duis consequat nulla sed magna rhoncus, ut mattis orci venenatis. Integer dui arcu, maximus id suscipit vitae, placerat quis libero. Donec accumsan arcu sit amet quam tempus efficitur. Sed tempor, nisi id suscipit viverra, libero libero sodales urna, nec maximus nunc turpis sit amet lectus. Aenean eget blandit elit. Morbi mattis augue dui, eu dignissim lorem dapibus quis. Nulla ut condimentum purus. Aenean pulvinar sed nisl vitae placerat. </p>
              <p> Nulla a placerat metus, non efficitur tortor. Pellentesque in sem sed turpis aliquet feugiat. Etiam nec aliquam purus. Nunc finibus quam vitae ante tincidunt ultrices. Cras dapibus purus eu metus vehicula ullamcorper. Proin sit amet aliquet nunc. In condimentum gravida nisl, at ornare enim dapibus tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
              <img src="https://cdn.pixabay.com/photo/2018/11/12/11/49/action-3810699_960_720.jpg" alt="test">
      </section>
      <section>
          <h3>Votre histoire</h3>
              <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta quam libero, sit amet ullamcorper augue aliquet quis. Aliquam erat volutpat. Vestibulum urna nulla, vehicula eu lobortis ut, lobortis vitae odio. Nam erat enim, imperdiet a mauris sit amet, pulvinar sollicitudin diam. Sed interdum dolor eu diam dictum fermentum. In hac habitasse platea dictumst. Ut at est massa. Duis maximus tellus sed ex ultrices, quis pellentesque dolor cursus. Mauris quam nunc, dictum a turpis sit amet, elementum euismod lectus. Quisque eget maximus justo. </p>
              <p> Nam id finibus leo. Vivamus vitae erat non orci sodales viverra non eu ipsum. Morbi in nunc risus. Sed elit turpis, tristique id convallis eu, ultrices non sapien. Sed pellentesque mi vel tristique tincidunt. Proin sed auctor quam. Nam pulvinar sed massa in iaculis. Duis arcu lorem, sagittis sit amet lorem vitae, auctor ultrices lorem. Praesent eget porttitor justo. Fusce sollicitudin, ligula quis efficitur ultricies, tortor turpis rhoncus massa, eget aliquet tellus nibh at lectus. Donec id massa turpis. </p>
              <p> Nam lorem eros, tincidunt ac tellus posuere, aliquam aliquam sapien. Nullam ut ultrices felis. Aenean viverra justo sit amet lacus imperdiet, at interdum erat sodales. Nulla dictum venenatis arcu, nec lacinia mi semper in. Quisque ac augue vestibulum, tincidunt nunc vitae, pulvinar libero. Nam aliquam enim sed est dignissim lacinia. Fusce gravida rutrum orci, sit amet pharetra nisl venenatis eget. Proin rhoncus rhoncus urna, eget bibendum mauris scelerisque commodo. Donec posuere fermentum eros, eu dictum elit elementum eu. Proin gravida mollis consectetur. Fusce tincidunt placerat erat, ut imperdiet odio consectetur ac. Nulla cursus malesuada sapien eget tincidunt. Nullam tempor lorem facilisis ex pretium, ac gravida erat dictum. Vestibulum in tellus mollis, facilisis nisl quis, egestas justo. Maecenas eget mauris nec orci tincidunt congue. Morbi tristique lectus mollis velit blandit ornare. </p>
              <p> Duis consequat nulla sed magna rhoncus, ut mattis orci venenatis. Integer dui arcu, maximus id suscipit vitae, placerat quis libero. Donec accumsan arcu sit amet quam tempus efficitur. Sed tempor, nisi id suscipit viverra, libero libero sodales urna, nec maximus nunc turpis sit amet lectus. Aenean eget blandit elit. Morbi mattis augue dui, eu dignissim lorem dapibus quis. Nulla ut condimentum purus. Aenean pulvinar sed nisl vitae placerat. </p>
              <p> Nulla a placerat metus, non efficitur tortor. Pellentesque in sem sed turpis aliquet feugiat. Etiam nec aliquam purus. Nunc finibus quam vitae ante tincidunt ultrices. Cras dapibus purus eu metus vehicula ullamcorper. Proin sit amet aliquet nunc. In condimentum gravida nisl, at ornare enim dapibus tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
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