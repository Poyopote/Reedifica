<?php
include("../../includes/fonctions.php");
// require "../../includes/init_twig.php";
//INCLUSION DE LA BDD

  include("../../includes/init_BDD.php");
  $bdd = connexion_bdd();
    session_start();
    $user_pseudo = user_connect();
    
?>