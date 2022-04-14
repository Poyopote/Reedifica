<?php
    /* login = login, mdp = mdp */
	
	$login = "";
	$mdp = "";
	if(isset($_POST['validelogin'])) {
		if(isset($_POST['login']))
			$login = $_POST['login'];
		if(isset($_POST['mdp']))
			$mdp = $_POST['mdp'];
	} 
	if(isset($_POST['Deco'])){
		unset($_SESSION['login']);
	}
	else {
	    if(isset($_SESSION['login']))
		  $checklogin = $_SESSION['login'];
	    else
		  $checklogin = false;
        // A peaufiner sur le plan sécurité ... ca pique un peu!
	    if($login == 'login' && $mdp == 'mdp') {
		  echo "Bonjour utilisateur $login<BR/>\n";
		  $checklogin=true;
		  $_SESSION['login'] = true;
	      } else if(isset($_POST['validelogin'])) {
		      echo "Echec de connexion<BR/>\n";
	         }
        if(!$checklogin) {
?>
	<form method='post' action='<?php echo $_SERVER['PHP_SELF'];?>'>
		<fieldset>
			<legend>Entrez login et mot de passe</legend>
			identifiant  : <input type="text" name='login'/>
			mot de passe : <input type="password" name='mdp'/>
			<input type='submit' name='validelogin' value='Soumettre'>
		</fieldset>
	</form>
</body>
</html>
<?php
	exit(0);
	}}
?>
