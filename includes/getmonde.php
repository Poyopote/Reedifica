
<?php
//INCLUSION DES FONCTIONS

include("fonctions - Copie.php");

//INCLUSION DE LA BDD

  include("init_BDD.php");
  $bdd = connexion_bdd();
     
    // if(!isset($_GET['q'])){
    //     $id_monde = 1;
    // }
    // else   {
        $id_monde = intval($_GET['q']);
        // echo intval($_GET['q']); 
    // }
    

    $monde = recherche_monde($bdd,$id_monde);


    echo "<h4>".$monde["name_world"]."</h4>";
    echo "<img src='../../img/".$monde["media"]."' alt='illustration'>";
    echo "<p>".$monde["bio_world"]."</p>";

    // print_r($choix);

?>
    
