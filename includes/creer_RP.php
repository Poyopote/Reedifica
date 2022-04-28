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
    
$file = __DIR__ . "../../docs/rp/".$table_rp["id_rp"].'.txt';

    file_put_contents($file, $text);



    echo $table_histoire["id_story"];    $_SESSION["histoire"] = null;
    // echo 'Yes, it works!';

} else {
    echo 'Invalid parameters!';
}
?>
