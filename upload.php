<?php
$authExtension = array('jpg', 'jpeg', 'gif', 'png');
$maxFileSize = 1000000;
$fileToUpload = $_FILES['monfichier'];
$fileSize = $_FILES['monfichier']['size'];
$fileError = $_FILES['monfichier']['error'];
$fileName = $_FILES['monfichier']['name'];
$tempLocation = 'uploads/';
$tempLocation = $_FILES['monfichier']['tmp_name'];


if (isset($fileToUpload) AND $fileError == 0){
    if ($fileSize <= $maxFileSize){

        $infosfichier = pathinfo($fileName);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_upload, $authExtension))
                {
                move_uploaded_file($tempLocation, $tempLocation . basename($fileName));
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
  elseif($fileError != 0)
  {
     $codeErreur = $fileError;
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



