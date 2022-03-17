<?php
//CONNEXION A LA BASE DE DONNEES
	function connexion_bdd($nom_db, $host, $charset, $port, $login, $mdp)
	{
		$dsn = "mysql:dbname=$nom_db;host=$host;charset=$charset;port=$port";
		$user = $login;
		$password = $mdp;
		$options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            return new PDO($dsn, $user, $mdp, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
	}
?>