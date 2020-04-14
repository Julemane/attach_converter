<?php
  // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur

  if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
      {
      // Testons si le fichier n'est pas trop gros

          if ($_FILES['monfichier']['size'] <= 1000000)

          {
          // Testons si l'extension est autorisée

          $infosfichier = pathinfo($_FILES['monfichier']['name']);

          $extension_upload = $infosfichier['extension'];

          $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

              if (in_array($extension_upload, $extensions_autorisees))
                  {

                  // On peut valider le fichier et le stocker définitivement

                  move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));

                  $result = "L'envoi a bien été effectué !";
                  }


          }
           //Si le fichier dépasse la taille spécifié
          else
          {
              $result = 'Fichier trop volumineux';
          }


      }
  //Si erreur on affiche l'erreur correspondante au code
  elseif($_FILES['monfichier']['error'] != 0)
  {
     $codeErreur = $_FILES['monfichier']['error'];
     switch ($codeErreur) {
         case '1':
            $result = ' La taille du fichier téléchargé excède la valeur de upload_max_filesize, configurée dans le php.ini';
             break;

         case '2':
            $result = ' La taille du fichier téléchargé excède la valeur de MAX_FILE_SIZE, qui a été spécifiée dans le formulaire HTML';
             break;

          case '3':
            $result = 'Erreur lors du téléchargement';
             break;

          case '4':
            $result ='Aucun fichier selectionné';
             break;

          case '6':
            $result ='Dossier temporaire manquant';
             break;

          case '7':
            $result ='Échec de l\'écriture du fichier sur le disque';
             break;

          case '8':
            $result = 'Une extension PHP a arrêté l\'envoi de fichier';
             break;
     }
  }

echo($result);

