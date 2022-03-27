<?php
//INCLUSION DES FONCTIONS

include("fonctions - Copie.php");

//INCLUSION DE LA BDD

  include("init_BDD.php");
  $bdd = connexion_bdd();
     

  $id_monde = intval($_GET['q']);

    

    $monde = recherche_monde($bdd,$id_monde);


    echo "<h4>".$monde["name_world"]."</h4>";
    echo "<img src='../../img/".$monde["media"]."' alt='illustration'>";
    echo "<p>".$monde["bio_world"]."</p>";

    // print_r($choix);

?>
    
