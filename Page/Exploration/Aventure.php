<?php
include("../../includes/fonctions.php");
// require "../../includes/init_twig.php";
//INCLUSION DE LA BDD

  include("../../includes/init_BDD.php");
  $bdd = connexion_bdd();
    session_start();
    $user_pseudo = user_connect();


    if(!isset($_GET["num"])){
        header("Location: Mondes.php");
    }
    $numero_H = $_GET["num"];

    $aventure = recherche_histoire($bdd,$numero_H);
    $message = "";
    $sous_monde = get_sous_monde($bdd,$aventure["id_under_world"]);
    $monde = recherche_monde($bdd,$sous_monde["id_world"]);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>

    </main>
</body>
</html>