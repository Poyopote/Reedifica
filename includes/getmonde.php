<?php
//INCLUSION DES FONCTIONS

include("fonctions.php");

//INCLUSION DE LA BDD

  include("init_BDD.php");
  $bdd = connexion_bdd();
     

  $id_monde = intval($_GET['q']);

    

    $monde = recherche_monde($bdd,$id_monde);


    echo "<h2>".$monde["name_world"]."</h2>";
    echo "<img class='font' src='../../img/".$monde["media"]."' alt='illustration'>";
    echo "<img class='seul' src='../../img/".$monde["media"]."' alt='illustration'>";
    echo "<p>".$monde["bio_world"]."</p>";
    echo "<div class='clear'></div>";
    // print_r($choix);

?>
    
