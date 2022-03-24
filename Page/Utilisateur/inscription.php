<?php 

$mdp = "1234";
$mdp_crypte = password_hash($mdp, PASSWORD_DEFAULT);

echo $mdp_crypte;
?>