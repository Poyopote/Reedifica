<?php

include('initialisation.php');
include("database.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
 	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="icon" type="image/svg" href="../img/mouv_mauve_1.svg" sizes="16x16">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="../script/menu-folio.js"></script>
	<title>Administration</title>
	<style type="text/css">
		body{ background: #c1cff2; color: #31189F;}
	</style>
</head>
<body>
	<main id="main-admin">
		<section>
			<?php
		include "veriflogin.php";
		?>
		<?php //Doit être intégré dans un fichier EstClePrimaire.php à inclure si besoin
			function EstClePrimaire($nom_champ) 
			{
				return strpos($nom_champ, "id_")===0;
			}
		?>
		<?php 
		// Si une table a été sélectionnée
		if( isset($_POST['valider']) ) {
			// On récupère le nom de la table concernée
			$table_selectionnee = $_POST['valider'];
			echo "\t<h1>La table sélectionnée : <strong>$table_selectionnee</strong></h1>";
			// Bouton d'ajout
			echo "\n\t<form action=\"update.php\" method=\"POST\">
						<input type=\"hidden\" name=\"table\" value=\"$table_selectionnee\" />
						<input type=\"hidden\" name=\"id\" value=\"new\" />
						<input class=\"boutons\" type=\"submit\" name=\"insert\" value=\"Ajouter\" />
			\t</form>";
			// Construction du tableau d'affichage
			echo "\n\t<div class='table'>";
			// Récupération des en-têtes
			$columns_req = $bdd->query("SHOW COLUMNS FROM $table_selectionnee");
			$lignes_columns = $columns_req->fetchAll();
			echo "\n\t\t<div class='table-titre'>";
			foreach($lignes_columns as $column) {
				echo "\n\t\t\t<div class=\"champ\">{$column['Field']}</div>";
			}
			echo "\n\t\t\t<div class=\"champ\">*</div>";
			echo "\n\t\t</div>";
			// Affichage des données dans le tableau
			$values_req = $bdd->query("SELECT * FROM $table_selectionnee");
			$lignes_values = $values_req->fetchAll(PDO::FETCH_ASSOC);
			// Pour chaque ligne du tableau
			foreach ($lignes_values as $ligne) {
				// Pour chaque colonne
				echo "\n\t\t<div class='table-contenu'>";
				foreach ($ligne as $champ => $value){
					echo "\n\t\t\t<div class=\"table-donnee\">$value</div>";
					// Si c'est la clé primaire, on sauvegarde son id pour le POST
					if(estClePrimaire($champ)) $id=$value;
				}
				echo "\n\t\t\t<div class=\"table-donnee\">
						<form action=\"update.php\" method=\"POST\">
							<input type=\"hidden\" name=\"table\" value=\"$table_selectionnee\" />
							<input type=\"hidden\" name=\"id\" value=\"$id\" />
							<input class=\"boutons\" type=\"submit\" name=\"update\" value=\"Editer\" />
							<input class=\"boutons\" type=\"submit\" name=\"delete\" value=\"Supprimer\" />
						</form>
		\n\t\t\t</div>";
				echo "\n\t\t</div>";
			}
			// Fermeture du tableau d'affichage des champs
			echo "\n\t</div>";
		}
		?>
			<a href="choixtable.php">&lt;&lt; Retour au choix de la table</a>			
		</section>
	</main>
</body>
</html>
