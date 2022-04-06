<?php
if ( array_key_exists('text', $_POST) ) {

    $text = $_POST["text"];
    $text = html_entity_decode($text);
    // do stuff with params  echo($text);

    echo 'Yes, it works!';

} else {
    echo 'Invalid parameters!';
}
?>

<h1>Histoire du jour</h1>
<p>je parle <span style="text-decoration: underline;">ici</span></p>
<p>je peux changer de <span style="color: #3598db;">couleur </span>et de <strong>profondeur</strong>.</p>
