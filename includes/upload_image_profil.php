<?php
if (isset($_POST['send']) && $_POST['send'] == "Valider l'image") {

    if (file_exists($filename)) {
      $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');//limite les types de fichiers qu'on importe --> l'user ne pourra pas importer un virus
      $extensionUpload = strtolower(substr(strrchr($_FILES['userfile']['name'], '.'), 1)); //extension du fichier chargé. substr = ignorer un caractère (ici le premier de la chaîne car on a mis le 1 comme limite). strrchr = prendre l'extension du fichier (avec le point) puisqu'on prend à partir du point. '.' = caractère que la chaîne ne va pas prendre en compte. 1 = limite de la chaîne
      
      if($_FILES['userfile']['size'] <= $_POST['MAX_FILE_SIZE'] ) {
        if(in_array($extensionUpload, $extensionsValides)) {//vérifie que l'extension du fichier chargé correspond aux extensions acceptées (d'abord la variable sur laquelle on applique la fonction in_array et ensuite les variables qu'on veut tester sur la chaîne
          
          // $filename.".".$extensionUpload;//chemin où sera upload la photo
          $new_image = $user_pseudo.".".$extensionUpload;
          $resultat = move_uploaded_file($_FILES['userfile']['tmp_name'], $filename."/".$new_image);//déplacer le fichier de nom (paramètre1) jusqu'à (paramètre2). tmp_name = chemin temporaire du fichier
          
          if($resultat){//vérifier que le déplacement s'est bien effectué
              
            image_de_profil($bdd,$user_pseudo,$new_image);
              header('Location: Profil.php');
          }
          else  $error = function_alert("Erreur durant l'importation de votre photo de profil");
            
        }
        else  $error = function_alert("Votre photo de profil doit être au format jpg, jpeg, gif ou png");
      }
      else  $error = function_alert("Poids limité à 2Mo");
    }
    else {
      $error = function_alert("Une erreur est survenu, veuillez recommencer");
      mkdir($filename);
    }
  }
  if (isset($_POST['send']) && $_POST['send'] == "Valider la description"){
    bio_de_profil($bdd,$user_pseudo,$_POST['bio']);
    header('Location: Profil.php');
  }
?>