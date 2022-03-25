<?php
//INCLUSION DES FONCTIONS

include("../../includes/fonctions - Copie.php");
require "../../includes/init_twig.php";
//INCLUSION DE LA BDD

  include("../../includes/init_BDD.php");
  $bdd = connexion_bdd();

    session_start();
    if(!isset($_SESSION["login"])){
      $lien_user = '<a href="../../Page/Utilisateur/connexion.php">Connexion</a> | <a href="../../Page/Utilisateur/inscription.php">Inscription</a>';
    }
    else {
      $user_pseudo = $_SESSION["login"];
      $lien_user = "<a href='../../Page/Utilisateur/Profil.php'>Profil</a> | <a href='../../includes/deconnexion.php'>Déconnexion</a>";
    }
    
    $choix = list_monde($bdd);


    $lang = "fr";
    



    echo $twig->render('monde.html.twig', 
    array('lang' => $lang,
    'titre' => "Exploration - Ré.édifica",
    'css_style' => "../../css/style.css",
    'css_page' => "../../css/exploration.css",
    'icon' => "../../img/Logo_favicon.svg",
    'index' => "../../index.php",
    'contexte' => "../../Page/Histoire/contexte.php",
    'info' => "../../Page/Histoire/nouveauté/info.php",
    'Mondes' => "../../Page/Exploration/Mondes.php",
    'Liste' => "../../Page/Membres/Liste.php",
    'Tutoriel' => "../../Page/Guide/Tutoriel.php",
    'Réglementation' => "../../Page/Guide/Réglementation.php",
    'FAQ' => "../../Page/Guide/F-A-Q.php",
    'connecter' => !isset($_SESSION["login"]),
    'Profil' => "../../Page/Utilisateur/Profil.php",
    'deconnexion' => "../../includes/deconnexion.php",
    'connexion' => "../../Page/Utilisateur/connexion.php",
    'inscription' => "../../Page/Utilisateur/inscription.php"

));

?>

    <main>
        <h2><i class="bi bi-send"></i> Exploration</h2>
        <section id="monde">
            <h3>Choisi ta destination</h3>
            <article>
                <?php
                    echo "<select onchange='showUser(this.value)'>";
                    echo "<option value=''>Sélection ton monde</option>";
                    $i=0;
                    foreach ($choix as $key => $value) {
                        $i++;
                        echo "<option value='".$i."' >".$value["name_world"]."</option>";
            
                    }
                    echo "</select>";
                ?>
                <br>
                <div id="txtHint">
                    <?php
                        $id_monde = 1;
                        $monde = recherche_monde($bdd,$id_monde);
                        

                        echo "<h4>".$monde["name_world"]."</h4>";
                        echo "<img src='../../img/".$monde["media"]."' alt='illustration'>";
                        echo "<p>".$monde["bio_world"]."</p>";
                    ?>
                </div>
            </article>
        </section>
        <section id="sous-monde">
           
            <h3>sous monde disponible</h3>
            <div id="txtHint2">
            <?php
                $liste_sous_monde = recherche_sous_monde($bdd,$id_monde);
                foreach ($liste_sous_monde as $key => $sous_monde) {
                    echo "<article>";
                    echo "<h4>".$sous_monde["title"]."</h4>";
                    echo "<img src='../../img/".$sous_monde["media"]."' alt='illustration'>";
                    echo "<p>".$sous_monde["bio"]."</p>";
                    echo "</article>";
                }
                
            ?>
            </div>
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
    <script src="../../script/select-monde.js" ></script>
    <script src="../../script/menu.js"></script>
</body>
</html>