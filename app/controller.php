<?php

function uploadFile($fileName, $fileSize, $fileError, $tempLocation, $fileExtension){


$authExtension = array('jpg', 'jpeg', 'gif', 'png');
$maxFileSize = 1000000;
$fileSavingLocation = 'uploads/';
//TO DO find how to set the app name dynamic unless converter bellow
$fileURL = $_SERVER['HTTP_HOST']."/converter/public/uploads/".$fileName;

var_dump($fileURL);
if ($fileError == 0){
    if ($fileSize <= $maxFileSize){

        $infosfichier = pathinfo($fileName);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_upload, $authExtension))
                {
                move_uploaded_file($tempLocation, $fileSavingLocation . basename($fileName));
                $status = "L'envoi a bien été effectué !";
                }
        }
       //Si le fichier dépasse la taille spécifié
      else
      {
          $status = 'Fichier trop volumineux';
      }
    }
  //cas d'erreurs
  elseif($fileError != 0)
  {
     $codeErreur = $fileError;
     switch ($codeErreur) {
         case '1':
            $status = ' La taille du fichier téléchargé excède la valeur de upload_max_filesize, configurée dans le php.ini';
             break;

         case '2':
            $status = ' La taille du fichier téléchargé excède la valeur de MAX_FILE_SIZE, qui a été spécifiée dans le formulaire HTML';
             break;

          case '3':
            $status = 'Erreur lors du téléchargement';
             break;

          case '4':
            $status ='Aucun fichier selectionné';
             break;

          case '6':
            $status ='Dossier temporaire manquant';
             break;

          case '7':
            $status ='Échec de l\'écriture du fichier sur le disque';
             break;

          case '8':
            $status = 'Une extension PHP a arrêté l\'envoi de fichier';
             break;
        }
  }
//insert into an array the var to return
$result = ["Url" => $fileURL,"status" => $status];
return $result;
}




