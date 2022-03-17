<?php
//CONNEXION A LA BASE DE DONNEES
	function connexion_bdd()
	{
        $host = "localhost";    // Adresse de la base de données (par défaut : "localhost")
        $db   = "reedifica_bdd";    // Nom de la base de données (par défaut : "reedifica_bdd")
        $user = "root";    // Identifiant de connexion (par défaut : "root")
        $pass = "";    // Mot de passe de connexion (par défaut : "")
        $charset = "utf8"; // Encodage des caractères (par défaut : "utf8")
        $port = "3306";    // Port de connexion (par défaut : "3306" sur MySQL et "3307" sur MariaDB)Z


		$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
		$options = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];
		try {
			return new PDO($dsn, $user, $pass, $options);
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}
	}
?>