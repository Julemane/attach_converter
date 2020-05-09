<?php

function fileUpload($fileName, $fileSize, $fileError, $tempLocation, $fileExtension){

$authExtension = array('pdf');
$maxFileSize = 1000000;
$fileSavingLocation = 'uploads/';
//TO DO find how to set the app name dynamic unless converter bellow
$fileURL = $_SERVER['HTTP_HOST']."/converter/public/uploads/".$fileName;

var_dump($fileURL);
if ($fileError == 0){
    if ($fileSize <= $maxFileSize){

        $infosfichier = pathinfo($fileName);
        $extension_upload = $infosfichier['extension'];
            if (in_array($extension_upload, $authExtension))
                {
                move_uploaded_file($tempLocation, $fileSavingLocation . basename($fileName));
                $status = "Chargement du fichier ".$fileName. " effectué";
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
     switch ($fileError) {
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
$result = ["Url" => $fileURL,"status" => $status, "code" => $fileError, "name"=> $fileName];
return $result;
}


function convertFile($fileUrl){

  $ilovepdf = new Ilovepdf\Ilovepdf('project_public_d51204a4bf4e8db7965f27b1b20e24e2_2gDGw8785f071bcfb98d3af4ae440662c5bc3','secret_key_12a577086e98fb43a930d1c92588bb81_1VAvTe547f3c81ca5b7cbc8068d3679792684');
  $ilovepdf->verifySsl(false);

  $task = $ilovepdf->newTask('compress');

  //Compression values values: ["extreme"|"recommended"|"low"]
  $task->setCompressionLevel("recommended");

  //To use relative path use this function : uploadFile($task, $filepath)
  //Here we use the file URL
  //$file = $task->addFileFromUrl('http://www.jeremy-hennebique.com/telechargement/cv_2018.pdf');
  $task->execute();
  //lunch download auto after convertion
  $task->toBrowser();

  //stock the file into a folder for download later
  //$task->download('../public/download');


}






