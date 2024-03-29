<?php
session_start();
    if(isset($_SESSION["message_erreur"])) 
    {
        $message_erreur = $_SESSION["message_erreur"];
        $_SESSION["message_erreur"] = "";
    }
    else
    {
        $message_erreur = "";
    }

    if(isset($_SESSION["login"])){
        header("Location: ../../index.php");
    }

    if(!isset($_SESSION["inscription"]))
    $_SESSION["inscription"] = [];

    if (!isset($_SESSION["formulaire"]) || (isset($_SESSION["formulaire"]) && $_SESSION["formulaire"] == 0) ) //si n'y a pas de session
        $_SESSION["formulaire"] = $code = 0;

    
        if(isset ($_POST['formulaire'])){
            $_SESSION["formulaire"] = $code = $_POST["formulaire"];
            header('Location: '.htmlspecialchars($_SERVER["PHP_SELF"]));
        }   
        else $code = $_SESSION["formulaire"];

//  var_dump($_SESSION["inscription"]);
//  var_dump($_SESSION["formulaire"]);
 if ($_SESSION["formulaire"] == 7) {
    $message_erreur ="Vous allez être redirigé vers la page de connexion.";
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
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/user.css">
    
    <title>Page Inscription "Ravi de te voir" - Ré.édifica</title>
    <!-- SEO  -->
    <!-- <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/> -->
    <meta property="og:region" content="fr_FR"/>
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="Ré.édifica"/>
    <meta name="description" content="Ré.édifica, le forum RP. "/>
</head>
<body id="inscription-body">
    <main id="inscription-main">
        
        <nav>
            <a href="../../index.php">Retour à l'accueil</a>
            <a href="connexion.php">Se connecter</a>
        </nav>
        <h1>Inscription</h1>
        <?php if(!isset($_POST["submit"]) && $code == 0 ){
            $_SESSION["formulaire"] = 0;
        ?>
        <section>
        <h2>CONDITIONS GENERALES D'UTILISATION</h2>
            <article>
            <p>Les pr&eacute;sentes conditions g&eacute;n&eacute;rales d'utilisation (ci-apr&egrave;s d&eacute;nomm&eacute;es &laquo; Conditions &raquo;) ont pour objet de d&eacute;finir les modalit&eacute;s et conditions de mise &agrave; disposition des services propos&eacute;s par Réédifica, ci-apr&egrave;s d&eacute;nomm&eacute;s &laquo; les services &raquo;.</p>
            <p>R&eacute;&eacute;dification offre un service de cr&eacute;ation de contenu &laquo; Histoire &raquo; dans un forum de discussion et de le partager. Les pr&eacute;sentes conditions ont vocation &agrave; s'appliquer &agrave; la personne g&eacute;rant le forum, dit l'administrateur, ainsi qu'aux personnes susceptibles d'y participer, les membres &amp; les mod&eacute;rateurs (ci-apr&egrave;s d&eacute;nomm&eacute;es &laquo; Joueur(s) &raquo;) ou les visiteurs (ci-apr&egrave;s d&eacute;nomm&eacute;es &laquo; Invit&eacute;(s) &raquo;)</p>
            <h3>Responsabilit&eacute; de la soci&eacute;t&eacute;</h3>
            <p><strong>Information</strong> &ndash; Les informations relatives aux services fournies par Réédifica le sont &agrave; titre indicatif, et n'ont pas de valeur contractuelle. La soci&eacute;t&eacute; ne garantit pas l'exactitude de ces informations, et peut proc&eacute;der &agrave; leur modification ou mises &agrave; jour &agrave; tout moment sans pr&eacute;avis.</p>
            <p><strong>Acc&egrave;s aux services </strong>&ndash; Réédifica met en &oelig;uvre les moyens n&eacute;cessaires afin d'&eacute;viter tout ralentissement ou toute interruption impromptue des services, sans toutefois pouvoir garantir l'absence d'interruption, ni m&ecirc;me la dur&eacute;e d'une telle interruption. La responsabilit&eacute; de Réédifica ne peut pas &ecirc;tre engag&eacute;e en cas de probl&egrave;me de r&eacute;seau, de serveur, ou en cas de d&eacute;faillance ou panne quelconque. A ce titre, aucun remboursement ne peut &ecirc;tre envisag&eacute; pour un arr&ecirc;t des services, un dommage, ou une perte de contenu.</p>
            <p><strong>S&eacute;curit&eacute; des services</strong> &ndash; Réédifica met en &oelig;uvre les moyens n&eacute;cessaires afin d'assurer la s&eacute;curit&eacute; des contenus, notamment par le recours &agrave; une sauvegarde &agrave; intervalles r&eacute;guliers de l'ensemble des contenus. Ces sauvegardes sont accessibles &agrave; l'Administrateur du forum, lequel peut restaurer son forum &agrave; l'&eacute;tat dans lequel il se trouvait &agrave; une date ant&eacute;rieure, dans la limite du temps de conservation de ces sauvegardes. En dehors des dispositions relatives &agrave; la portabilit&eacute; des donn&eacute;es (cf. <em>infra</em>), aucune sauvegarde d'un forum, dump, back-up de tout ou partie des donn&eacute;es qu'il contient ne pourra &ecirc;tre fournie, y compris pour les forums ayant proc&eacute;d&eacute; &agrave; l'importation de leur base de donn&eacute;es sur le service Réédifica</p>
            <p><strong>Contenus</strong> &ndash; Réédifica n'exerce aucune mod&eacute;ration a priori ou v&eacute;rification syst&eacute;matique des contenus publi&eacute;s par le biais de ses services, et n'a donc pas connaissance de la teneur de ceux-ci. L'Administrateur doit s'assurer de leur conformit&eacute; aux pr&eacute;sentes Conditions et lois en vigueur. En cons&eacute;quence, Réédifica ne saurait &ecirc;tre responsable de ces contenus.</p>
            <h4>Donn&eacute;es recueillies</h4>
            <p>L&rsquo;utilisation des services fournis par Forumactif n&eacute;cessite de recueillir des donn&eacute;es vous concernant, notamment au cours de la cr&eacute;ation d&rsquo;un forum, de l&rsquo;inscription ou de la participation &agrave; l&rsquo;une de ces discussions. La plupart de ces donn&eacute;es n&rsquo;ont pas le caract&egrave;re de donn&eacute;es personnelles au sens du <a href="https://www.cnil.fr/fr/reglement-europeen-protection-donnees/chapitre1" target="_blank" rel="noopener">r&egrave;glement n&deg;2016/679, dit r&egrave;glement g&eacute;n&eacute;ral sur la protection des donn&eacute;es</a> (RGPD). Toutefois, certaines sont effectivement des donn&eacute;es &agrave; caract&egrave;re personnelle et b&eacute;n&eacute;ficie d&rsquo;une protection sp&eacute;cifique.</p>
            <p>Ce recueil des donn&eacute;es est effectu&eacute; soit par le biais des <strong>informations que vous nous communiquez</strong>, (essentiellement votre identifiant, adresse e-mail, et mot de passe), soit par <strong>l&rsquo;utilisation des services elle-m&ecirc;me</strong>, pour des donn&eacute;es techniques n&eacute;cessaires au bon fonctionnement de nos forums (informations relatives &agrave; l&rsquo;appareil utilis&eacute;, adresse IP, &hellip;).</p>
            <p>Forumactif met en &oelig;uvre les mesures techniques et organisationnelles appropri&eacute;es pour garantir que, par d&eacute;faut, seules les donn&eacute;es &agrave; caract&egrave;re personnel qui sont n&eacute;cessaires au regard de chaque finalit&eacute; sp&eacute;cifique du traitement sont trait&eacute;es.</p>
            <p>Les donn&eacute;es ainsi recueillies seront conserv&eacute;es aussi longtemps que l&rsquo;utilisation des services le n&eacute;cessitera, et pour certaines d&rsquo;entre elles, pour une dur&eacute;e minimale impos&eacute;e par la loi et la r&egrave;glementation.</p>
            <h3>Responsabilit&eacute; de l'utilisateur</h3>
            <p><strong>S&eacute;curit&eacute; de son compte</strong> &ndash; A l'inscription sur un forum, l'Utilisateur est amen&eacute; &agrave; choisir un nom d'utilisateur et un mot de passe. L'Utilisateur est seul responsable de la confidentialit&eacute; de ses identifiants, et le demeure en cas d'actions non autoris&eacute;es effectu&eacute;es par un tiers gr&acirc;ce &agrave; ceux-ci. Il est conseill&eacute;, &agrave; ce titre, de mettre fin &agrave; la session (d&eacute;connexion) &agrave; l'issue de l'utilisation des services. En cas d'utilisation frauduleuse de ses identifiants, l'Utilisateur a l'obligation d'informer sans d&eacute;lai R&eacute;.&eacute;difica en indiquant les violations ayant pu &ecirc;tre commises.</p>
            <p><strong>Dommages caus&eacute;s</strong> &ndash; L'Utilisateur est responsable des dommages de toute nature, mat&eacute;riels ou immat&eacute;riels, directs ou indirects, caus&eacute;s &agrave; tout tiers, ainsi qu'&agrave; Réédifica du fait de l'utilisation ou de l'exploitation illicite des services, quels que soient la cause et le lieu de survenance de ces dommages et garantit Réédifica des cons&eacute;quences des r&eacute;clamations ou actions dont elle pourrait faire l'objet. L'Utilisateur renonce en outre &agrave; exercer tout recours contre Réédifica dans le cas de poursuites diligent&eacute;es par un tiers &agrave; son encontre du fait de l'utilisation et/ou de l'exploitation illicite des services.</p>
            <h4>Comportements et contenus prohib&eacute;s</h4>
            <p>En utilisant les services propos&eacute;s par Réédifica, l'Utilisateur s'engage &agrave; en faire un usage conforme au but pour lequel ils ont &eacute;t&eacute; con&ccedil;us, et &agrave; ne pas utiliser les produits et services afin &ndash; notamment &ndash;&nbsp; d'inciter, de favoriser, d'accueillir ou de pr&eacute;senter sous un jour favorable&nbsp;:</p>
            <ul>
                <li>Le piratage, hacking, spamming, et attaques contre des r&eacute;seaux et/ou serveurs, le phishing, le malware, l'intrusion dans le r&eacute;seau de tiers,</li>
                <li>Les contenus &agrave; caract&egrave;re sexuel, obsc&egrave;ne, pornographique,</li>
                <li>Les contenus violents, diffamants, discriminants, incitants &agrave; la haine raciale, les crimes contre l'humanit&eacute;,</li>
                <li>Le partage, l'h&eacute;bergement, la diffusion ou le piratage d'&oelig;uvre et contenus prot&eacute;g&eacute;s par le droit d'auteur et la propri&eacute;t&eacute; intellectuelle, ou toute pratique contrefaisante,</li>
                <li>La vente, l'&eacute;change ou le don de produits soumis &agrave; l&eacute;gislation sp&eacute;ciale, de m&eacute;dicaments soumis ou non &agrave; prescription m&eacute;dicale, de produits stup&eacute;fiants et autres substances illicites,</li>
                <li>La fraude &agrave; la carte bancaire, ou les pratiques trompeuses.</li>
                <li>Les atteintes aux droits et aux int&eacute;r&ecirc;ts des mineurs,</li>
                <li>Tout comportement contraire aux lois en vigueur, portant atteinte aux droits des tiers, ou pr&eacute;judiciable &agrave; ceux-ci. </li>
            </ul>
            <h3>Acceptation et modifications</h3>
            <p>En utilisant les services de Réédifica, l'Utilisateur reconnait sans r&eacute;serve, limitation ou qualification avoir lu et accept&eacute; les pr&eacute;sentes Conditions, et s'engage &agrave; satisfaire aux termes de celles-ci, sans pr&eacute;judice de l'application &eacute;ventuelle d'autres conditions ou r&egrave;gles propres &agrave; certains services sp&eacute;cifiques.</p>
            <p>Les pr&eacute;sentes Conditions&nbsp; peuvent &ecirc;tre modifi&eacute;es &agrave; tout moment, &agrave; la discr&eacute;tion de Réédifica. Ces modifications sont d'application imm&eacute;diate pour les nouveaux Utilisateurs. Tous les Utilisateurs pr&eacute;existants devront se conformer aux modifications apport&eacute;es dans un d&eacute;lai de 30 jours &agrave; compter de la notification qui leur en sera faite, par tout moyen.</p>
            <img src="../../img/Logo_complet.svg" alt="logo" height="88px">
            </article>
            <form id="formulaire" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <br><input type="checkbox" id="scales" name="scales" required>
                <label for="scales">J'accepte les Conditions générales d'utilisation</label>
                <input name="formulaire" type="hidden" value="1"><br>
                <input type="submit" value="Suivant">
            </form>
        </section>
    </main>
</body>
</html>

        <?php 
                } 
        ?>

        <?php if(isset($_POST["submit"]) && $_POST["formulaire"] == 1 || $code == 1){
            $_SESSION["formulaire"] = 1;
        ?>
        <section>
            
            <form id="formulaire" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                <fieldset>
                    <input type="submit" value="Retour">
                    <input name="formulaire" type="hidden" value="0">
                </fieldset>
            </form>
            <h4>Avant de commencer...</h4>
            <p>Pour pouvoir t'inscrire et commencer &agrave; jouer, tu dois remplir un formulaire.</p>
            <p>Il est <strong>important </strong>que tu sois pr&eacute;par&eacute; pour cette Aventure.</p>
            <p>Pour cela, nous te conseillons : d'avoir visit&eacute; la page histoire et si possible avoir lu nos r&egrave;gles.</p><br>
            <p>C'est bon, tu as tout compris ? Cr&eacute;ons ensemble ton personnage.</p>
            <form id="formulaire" action="../../includes/connexion_inscription.php" method="POST">
            
                <fieldset>
                
                    <div>
                        <span><i class="bi bi-person-fill"></i></span>
                        
                        <input type="text" id="login" name="login" required placeholder="Pseudo">
                    </div>
                    <label for="login"><i class="bi bi-exclamation-triangle"></i>Ton pseudo te servira à t'identifier</label>
                    <hr>
                    <div>
                        <span><i class="bi bi-envelope"></i></span>
                        <input type="email" id="email" name="email" required placeholder="Adress Mail">
                    </div>
                    <div>
                        <span><i class="bi bi-lock-fill"></i></span>
                        <input type="password" id="mdp" name="mdp" required placeholder="Mot de passe">
                    </div>
                    <input name="formulaire" type="hidden" value="2">
                    <p><?php echo($message_erreur); ?></p>
                    <!-- <hr> -->
                    <input type="submit" value="Suivant">
                </fieldset>
            </form>
        </section>
    </main>
</body>
</html>
        <?php 
        } 
        ?>
<?php if(isset($_POST["submit"]) && $_POST["formulaire"] == 3 || $code == 3){
            $_SESSION["formulaire"] = 3;
        ?>
        <section>
            
            <form id="formulaire" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                <fieldset>
                    <input type="submit" value="Retour">
                    <input name="formulaire" type="hidden" value="1">
                </fieldset>
            </form>
            <h4>De quelle mani&egrave;re serais-tu obtenir le don du <a href="../Histoire/contexte.php#arc">pacificateur</a> ?</h4>

<form id="formulaire" action="../../includes/connexion_inscription.php" method="POST">
                <fieldset class="don">
                    <legend>Selectionne ta catégorie</legend><br>
                    <label for="CN">Coeur Noble</label>
                    <input type="radio" name="don" value="CN" id="CN" checked>
                    <p>D&egrave;s ton premier souffle de vie, tu savais d&eacute;j&agrave; que ta destin&eacute;e &eacute;tait importante !
                         C'est pour cela que le pacificateur t'a donn&eacute;
                          le don en main propre.</p>
                    <br><hr><label for="CC">Cadeau du Coeur</label>
                    <input type="radio" name="don" value="CC" id="CC">
                    <p>Tu es maintenant un &eacute;l&egrave;ve d'un combattant de la lumi&egrave;re.
                         C'est ton ma&icirc;tre qui t'a donn&eacute;
                          le don et qui te demande de poursuivre
                           sa qu&ecirc;te &agrave; sa place.</p>
                    <br><hr><label for="DP"> Dynastie parfaite</label>
                    <input type="radio" name="don" value="DP" id="DP">
                    <p>Famille n&eacute;e dans la bienveillance.
                         Le don est un cadeau du sang. (le don est h&eacute;r&eacute;ditaire.)</p>
                    <br><hr>
                    <input name="formulaire" type="hidden" value="4">
                    <p><?php echo($message_erreur); ?></p>
                    <input type="submit" value="Suivant">
                </fieldset>
            </form>
        </section>
    </main>
</body>
</html>
        <?php 
        } 
        ?>
<?php if(isset($_POST["submit"]) && $_POST["formulaire"] == 5 || $code == 5){
            $_SESSION["formulaire"] = 5;
        ?>
        <section>
            
            <form id="formulaire" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                <fieldset>
                    <input type="submit" value="Retour">
                    <input name="formulaire" type="hidden" value="3">
                </fieldset>
            </form>
            <h4>Bientôt fini</h4>
            <p>Tu as ici 2 choix.</p>
<p>Tu peux fournir un pr&eacute;nom / surnom uniquement</p>
<p> o&ugrave;</p>
<p> un pr&eacute;nom et un nom. (Dans cet ordre)</p>
            <form id="formulaire" action="../../includes/connexion_inscription.php" method="POST">
                <fieldset>
                    <div>
                        <span><i class="bi bi-person-fill"></i></span>
                        <input type="text" id="prenom" name="prenom" required placeholder="Prénom">
                    </div>
                    <div>
                        <span><i class="bi bi-plus"></i></span>
                        <input type="text" id="nom" name="nom" placeholder="nom">
                    </div>
                
                    <input name="formulaire" type="hidden" value="6">
                    <p><?php echo($message_erreur); ?></p>
                    <!-- <hr> -->
                    <input type="submit" value="Terminer">
                </fieldset>
            </form>
        </section>
    </main>
</body>
</html>
        <?php 
        } 
        ?>
<?php if(isset($_POST["submit"]) && $_POST["formulaire"] == 7 || $code == 7){
            $_SESSION["formulaire"] = 7;
        ?>
        <section>
            <h4>Terminer</h4>
            <p><?php echo($message_erreur); ?></p>
        </section>
    </main>
</body>
</html>
        <?php
        sleep(1);
        unset($_SESSION["formulaire"]);
        header('Location: connexion.php');
        } 
        ?>