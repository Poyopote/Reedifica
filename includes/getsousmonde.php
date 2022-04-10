
<?php
//INCLUSION DES FONCTIONS

include("fonctions.php");

//INCLUSION DE LA BDD

  include("init_BDD.php");
  $bdd = connexion_bdd();
     
  $id_monde = intval($_GET['q']);

    
    $liste_sous_monde = recherche_sous_monde($bdd,$id_monde);

    $liste_sous_monde = recherche_sous_monde($bdd,$id_monde);
    foreach ($liste_sous_monde as $key => $sous_monde) {
        echo "<article class='sous_monde'>";
        echo "<h3>".$sous_monde["title"]."</h3>";
        echo "<a href='sous-monde.php?lieu=".$sous_monde["id_under_world"]."'><img src='../../img/".$sous_monde["media"]."' alt='illustration'></a>";
        echo "<p>".$sous_monde["bio"]."</p>";
        echo "</article>";
    }

?>

    
