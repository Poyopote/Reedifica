<?php 

//CONNEXION



//LANGUE

function accueil($pdo, $lang)
{
	return $pdo->query("SELECT `$lang` FROM `accueil`;")->fetchAll();
}

function footer($pdo, $lang)
{
	return $pdo->query("SELECT `$lang` FROM `footer`;")->fetchAll();
}

function menu($pdo)
{
	return $pdo->query("SELECT * FROM `projet` WHERE 1;")->fetchAll();
}


?>