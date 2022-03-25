<?php
    $text = $_POST["text"];
    $user_pseudo = $_POST["user"];
    $text = html_entity_decode($text);
    echo($user_pseudo);
    echo($text);
?>