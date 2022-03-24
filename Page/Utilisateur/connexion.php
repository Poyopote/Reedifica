<?php
session_start();
    if(isset($_SESSION["message_erreur"])) 
    {
        $message_erreur = $_SESSION["message_erreur"];
    }
    else
    {
        $message_erreur = "";
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
    
    <title>Page Connexion "Ravi de te voir" - Ré.édifica</title>
    <!-- SEO  -->
    <!-- <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/> -->
    <meta property="og:region" content="fr_FR"/>
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="Ré.édifica"/>
    <meta name="description" content="Ré.édifica, le forum RP. "/>
</head>
<body id="connexion-body">
    <main id="connexion-main">
        <nav>
            <a href="../../index.php">Retour à l'accueil</a>
            <a href="inscription.php">Je veux m'inscrire</a>
        </nav>
        <section>
            <form id="formulaire" action="../../includes/connexion_inscription.php" method="POST">
                <fieldset>
                    <label for="login"><i class="bi bi-person-fill"></i> Pseudo :</label>
                    <input type="text" id="login" name="login" required>
                    <label for="mdp"><i class="bi bi-lock-fill"></i> Mot de passe :</label>
                    <input type="password" id="mdp" name="mdp" required>
                    <input name="formulaire" type="hidden" value="0">
                    <p><?php printf($message_erreur); ?></p>
                    <!-- <hr> -->
                    <input type="submit" value="Valider">
                </fieldset>
            </form>
        </section>
    </main>
</body>
</html>