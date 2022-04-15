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

    if (isset($_POST["submit"])) {
        $_SESSION["formulaire"] = $_POST["formulaire"];
    }
    else $_SESSION["formulaire"] = "";
    
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
    
    <title>Page Connexion "Ravi de te voir" - Ré.édifica</title>
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
        <?php if(!isset($_POST["submit"])){

        ?>
        <section>
            <h2>Avant de commencer...</h2>
            <article>
                <h3>CONDITIONS GENERALES D'UTILISATION</h3>
                
                <h4>Responsabilit&eacute; de l'utilisateur</h4>
                <p>
                    <strong>S&eacute;curit&eacute; de son compte</strong> &ndash; A l'inscription sur un forum,
                    l'Utilisateur est amen&eacute; &agrave; choisir un nom d'utilisateur et un mot de passe.
                    L'Utilisateur est seul responsable de la confidentialit&eacute; de ses identifiants,
                    et le demeure en cas d'actions non autoris&eacute;es effectu&eacute;es par un tiers gr&acirc;ce &agrave; ceux-ci.
                    Il est conseill&eacute;, &agrave; ce titre, de mettre fin &agrave;
                    la session (d&eacute;connexion) &agrave; l'issue de l'utilisation des services. 
                    En cas d'utilisation frauduleuse de ses identifiants,
                    l'Utilisateur a l'obligation d'informer sans d&eacute;lai Ré.édifica en indiquant les violations ayant pu &ecirc;tre commises.
                </p>
 
                <p><strong>Dommages caus&eacute;s</strong> &ndash; L'Utilisateur est responsable des dommages de toute nature,
                 mat&eacute;riels ou immat&eacute;riels, directs ou indirects, caus&eacute;s &agrave; tout tiers, ainsi qu'&agrave;
                  forumactif.com du fait de l'utilisation ou de l'exploitation illicite des services, quels que soient la cause et
                   le lieu de survenance de ces dommages et garantit forumactif.com des cons&eacute;quences des r&eacute;clamations
                    ou actions dont elle pourrait faire l'objet. L'Utilisateur renonce en outre &agrave; exercer tout recours contre
                     forumactif.com dans le cas de poursuites diligent&eacute;es par un tiers &agrave;
                 son encontre du fait de l'utilisation et/ou de l'exploitation illicite des services.</p>

                 <h4>Donn&eacute;es recueillies</h4>
<p>L&rsquo;utilisation des services fournis par Forumactif n&eacute;cessite de recueillir des donn&eacute;es vous concernant, notamment au cours de la cr&eacute;ation d&rsquo;un forum, de l&rsquo;inscription ou de la participation &agrave; l&rsquo;une de ces discussions. La plupart de ces donn&eacute;es n&rsquo;ont pas le caract&egrave;re de donn&eacute;es personnelles au sens du <a href="https://www.cnil.fr/fr/reglement-europeen-protection-donnees/chapitre1" target="_blank" rel="noopener">r&egrave;glement n&deg;2016/679, dit r&egrave;glement g&eacute;n&eacute;ral sur la protection des donn&eacute;es</a> (RGPD). Toutefois, certaines sont effectivement des donn&eacute;es &agrave; caract&egrave;re personnelle et b&eacute;n&eacute;ficie d&rsquo;une protection sp&eacute;cifique.</p>
<p>Ce recueil des donn&eacute;es est effectu&eacute; soit par le biais des <strong>informations que vous nous communiquez</strong>, (essentiellement votre identifiant, adresse e-mail, et mot de passe), soit par <strong>l&rsquo;utilisation des services elle-m&ecirc;me</strong>, pour des donn&eacute;es techniques n&eacute;cessaires au bon fonctionnement de nos forums (informations relatives &agrave; l&rsquo;appareil utilis&eacute;, adresse IP, &hellip;).</p>
<p>Forumactif met en &oelig;uvre les mesures techniques et organisationnelles appropri&eacute;es pour garantir que, par d&eacute;faut, seules les donn&eacute;es &agrave; caract&egrave;re personnel qui sont n&eacute;cessaires au regard de chaque finalit&eacute; sp&eacute;cifique du traitement sont trait&eacute;es.</p>
<p>Les donn&eacute;es ainsi recueillies seront conserv&eacute;es aussi longtemps que l&rsquo;utilisation des services le n&eacute;cessitera, et pour certaines d&rsquo;entre elles, pour une dur&eacute;e minimale impos&eacute;e par la loi et la r&egrave;glementation.</p>
<p>&nbsp;</p>
            </article>
            <form id="formulaire" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                <input type="checkbox" id="scales" name="scales" required>
                <label for="scales">J'accepte les conditions générales</label>
                <input name="formulaire" type="hidden" value="1">
                <input type="submit" name="submit" value="Valider">
            </form>
        </section>
    </main>
</body>
</html>

        <?php 
                } 
        ?>

        <?php if(isset($_POST["submit"]) && $_SESSION["formulaire"] == 1){

        ?>

        <section>
            <form id="formulaire" action="../../includes/connexion_inscription.php" method="POST">
                <fieldset>
                    <label for="login"><i class="bi bi-person-fill"></i> Pseudo :</label>
                    <input type="text" id="login" name="login" required>
                    <label for="mdp"><i class="bi bi-lock-fill"></i> Mot de passe :</label>
                    <input type="password" id="mdp" name="mdp" required>
                    <input name="formulaire" type="hidden" value="8">
                    <p><?php echo($message_erreur); ?></p>
                    <!-- <hr> -->
                    <input type="submit" value="Valider">
                </fieldset>
            </form>
        </section>
    </main>
</body>
</html>
        <?php 
        } 
        ?>
        