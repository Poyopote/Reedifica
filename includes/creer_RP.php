<?php
include("fonctions.php");
//INCLUSION DE LA BDD

  include("init_BDD.php");
  $bdd = connexion_bdd();
    session_start();

    $user_pseudo = user_connect();
    $tableau_utilisateur = info_utilisateur_profil($bdd,$user_pseudo);

if ( array_key_exists('text', $_POST) ) {
    $table_histoire = $_SESSION["histoire"];
    $table_rp = $_SESSION["rp"];
    
    $text = $_POST["text"];
    $text = urldecode($text);
    // do stuff with params  echo($text);
    


    
$file = $_SERVER['DOCUMENT_ROOT']. "/reedifica/docs/rp/".$table_rp["id_rp"].'.txt';

    file_put_contents($file, $text);


    echo $table_histoire["id_story"];
    // echo 'Yes, it works!';

} else {
    echo 'Invalid parameters!';
}
?>
