<?php

	if(!isset($_SESSION))
		session_start();


	if (empty($_SESSION['parle'])){ //si la session n'a pas de valeur langue
		if (empty($_GET["lang"])){ //on regarde si get lang est vide
			$lang = "fr";			//alors on met en francais
		}
		else {						//sinon
			$lang = $_GET["lang"]; 	// la langue = le paramettre get
			$_SESSION['parle'] = $lang; 	// et la session mémorise la langue
		}
	}
	else {							// mais si la session a une valeur langue
		if (empty($_GET["lang"])){ // si le get langue est vide
			$lang = $_SESSION['parle'];			// la langue prendre prend la langue memoriser
		}
		else {						// sinon
			$lang = $_GET["lang"]; 	// la langue = le paramettre get
			$_SESSION['parle'] = $lang; 	// et la session mémorise encore la langue
		}
	}
