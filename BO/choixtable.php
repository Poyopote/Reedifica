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
</head>
<body>
	<header id="header">
		<section>
			<h1>Navigation</h1>
			<input onclick="bouton_menu()" type="image" src="../img/menu.png" alt="menu">
			<!-- <div class="logo"></div> -->
			<nav class="nav-menu" style="display: none;">
				<a href="../page/presentation.php" class="nav-lien"><img src="../img/menu-presenation.png" alt="menu"></a>
				<a href="../page/competence-et-etude.php" class="nav-lien"><img src="../img/menu-competence.png" alt="menu"></a>
				<a href="../index.php" class="nav-lien"><img src="../img/menu-home.png" alt="home"></a>
				<a href="../page/realisation.php" class="nav-lien"><img src="../img/menu-projet.png" alt="menu"></a>
				<a href="../page/contact.php" class="nav-lien"><img src="../img/menu-contact.png" alt="menu"></a>
			</nav>
			<div id="overlay" style="display: none;"></div>
		</section>		
	</header>
	<main>
		<section class="navig">
			<?php
				include "veriflogin.php";
			?>

			<h2>Formulaire généré automatiquement</h2>

			<form method="POST" action="editable.php">
				<fieldset>
				<?php
					echo "<legend>Sélectionnez une table :</legend>";
					$tables_req = $bdd->query("SHOW TABLES;");
					$lignes_tables = $tables_req->fetchAll();
					$retour_ligne = 0;
					foreach($lignes_tables as $ligne) {
							$retour_ligne++;
							if($retour_ligne%3==0)
								echo "<br/>\n";
							echo "\t<input type='submit' name='valider' value='".$ligne[0]."' '>"."\n"; // $ligne[0] contient le nom de la table
					}
				?>
				</fieldset>
			</form>
			<form method="POST" action="deconnexion.php">
			<input type='submit' name='Deco' value='Déconnexion'/>
			</form>
		</section>
	</main>
</body>
</html>
