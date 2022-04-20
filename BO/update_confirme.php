<?php
//INCLUSION DES FONCTIONS

include($_SERVER['DOCUMENT_ROOT']. "/reedifica/includes/fonctions.php");
//INCLUSION DE LA BDD

include($_SERVER['DOCUMENT_ROOT']. "/reedifica/includes/init_BDD.php");
$bdd = connexion_bdd();

session_start();
$user_pseudo = user_connect();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
 	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="icon" type="image/svg" href="../img/Logo_favicon.svg" sizes="16x16">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="../script/menu-folio.js"></script>
	<title>Administration</title>

</head>
<body>
<?php
if ($user_pseudo == "") {
	header("Location: ".$_SERVER['DOCUMENT_ROOT']. "/reedifica/Page/Utilisateur/connexion.php");
}
?>
			<?php //Doit être intégré dans un fichier EstClePrimaire.php à inclure si besoin 

				// Récupération des informations
				$table_selectionnee = $_POST['table'];
				$id                = $_POST['id'];
				$cle_primaire      = '';
				$set               = [];
			?>

			<?php
				// On contrôle l'action demandée
				switch ($_POST['action']) {
					case 'insert':
						// Préparation des variables
						$colonnes = [];
						$values   = [];
						$columns_req = $bdd->query("SHOW COLUMNS FROM `$table_selectionnee`");
					    $lignes_columns = $columns_req->fetchAll();
					    foreach($lignes_columns as $column) {	// On ne compte pas les clés primaines
							if( $column['Key'] != "PRI"  ) {
								$colonne = $column['Field']; // Le nom de la colonne
								$colonnes[] = "`$colonne`";
								$value = $_POST[ $colonne ]; // La valeur qui se trouve dans POST
								// Si la colonne n'est pas de type int...
								if( !strpos($column['Type'], 'int')) {
									// on les prend en convertissant le texte en code HTML (&...;)
									$value = htmlentities($value);
									$values[] = "\"$value\"";
								}
								else {
									// Sinon, on ne prend pas en compte les guillemets
									$values[] = $value;
								}
							}
						}
						// Exécution de la modification
						$colonnes = implode(',', $colonnes);
						$values = implode(',', $values);
						$insert_sql = $bdd->query("INSERT INTO `$table_selectionnee`($colonnes) VALUES($values)");
						echo "Ajout effectué.<br />";
						break;
					case 'update':
						// Récupération du nom de la clé primaire
						$columns_req = $bdd->query("SHOW COLUMNS FROM `$table_selectionnee`");
					    $lignes_columns = $columns_req->fetchAll();
					    foreach($lignes_columns as $column) {	// Si c'est une clé primaire, on la récupère
							if( $column['Key'] == "PRI"  )
								$cle_primaire = $column['Field'];
							// Sinon, on prépare pour modifier
							else {
								$colonne = $column['Field']; // Le nom de la colonne
								$value = $_POST[ $colonne ]; // La valeur qui se trouve dans POST

								// Si la colonne n'est pas de type int...
								if( !strpos($column['Type'], 'int') ) {
									// on les prend en convertissant le texte en code HTML (&...;)
									$value = htmlentities($value);
									$set[] = "`$colonne`=\"$value\"";
								}
								else {
									// Sinon, on ne prend pas en compte les guillemets
									$set[] = "`$colonne`=$value";
								}
							}
						}
						// Exécution de la modification
						$set = implode(',', $set);
						$insert_sql = $bdd->query("UPDATE `$table_selectionnee` SET $set WHERE `$cle_primaire`=$id");
						echo "Modifications effectuées.<br />";
						break;
					case 'delete':
						// Récupération de la clé primaire
						$columns_req = $bdd->query("SHOW COLUMNS FROM `$table_selectionnee`");
					    $lignes_columns = $columns_req->fetchAll();
					    foreach($lignes_columns as $column) {	// Si c'est une clé primaire, on la récupère
							if( $column['Key'] == "PRI" )
								$cle_primaire = $column['Field'];
								
						}
						// Execution de la suppression
						$insert_sql = $bdd->query("DELETE FROM `$table_selectionnee` WHERE `$cle_primaire`=$id");
						echo "Suppression effectuée.<br />";
						break;		
					default: break;
				}

				?>	
				<form action="../Page/Utilisateur/Profil.php" method="POST">
					<input type="submit" name="valider" VALUE="<?php echo $table_selectionnee; ?>" />
				</form>

</body>
</html>