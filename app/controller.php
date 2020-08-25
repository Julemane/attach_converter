<?php

function fileUpload($fileName, $fileSize, $fileError, $tempLocation, $fileExtension){

$authExtension = array('pdf');
$maxFileSize = 1000000;
$fileSavingLocation = 'uploads/';
//generate an unique fileName
$randomId = uniqid();
$renamedFile = $randomId."_".$fileName;
//TO DO find how to set the app name dynamic unless converter bellow
$fileURL = $_SERVER['HTTP_HOST']."/converter/public/uploads/".$renamedFile;

if ($fileError == 0){
    if ($fileSize <= $maxFileSize){

        $infosfichier = pathinfo($fileName);
        $extension_upload = $infosfichier['extension'];
            if (in_array($extension_upload, $authExtension)){
                if(!file_exists($fileSavingLocation.$renamedFile)){
                  move_uploaded_file($tempLocation, $fileSavingLocation . basename($renamedFile));
                  $status = "Chargement du fichier ".$fileName. " effectué";
                  }
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
//convert size in ko
$fileSize = explode(".",$fileSize/1000);
//insert into an array the var to return
$result = ["Url" => $fileURL,"status" => $status, "code" => $fileError, "name"=> $fileName,"renamedfile"=>$renamedFile , "size"=>$fileSize[0]];
return $result;
}


function convertFile($fileUrl,$compressionLevel, $fileName){
  //add config file to handle key
  $ilovepdf = new Ilovepdf\Ilovepdf('project_public_d51204a4bf4e8db7965f27b1b20e24e2_2gDGw8785f071bcfb98d3af4ae440662c5bc3','secret_key_12a577086e98fb43a930d1c92588bb81_1VAvTe547f3c81ca5b7cbc8068d3679792684');
  $ilovepdf->verifySsl(false);
  $task = $ilovepdf->newTask('compress');
  //Compression values values: ["extreme"|"recommended"|"low"]
  $task->setCompressionLevel($compressionLevel);
  //To use relative path use this function : uploadFile($task, $filepath)
  //Here we use the file URL

  $file = $task->addFileFromUrl($fileUrl);
  $task->execute();
  //delete file from local upload folder
  deleteFileFromServer($fileName);
  //lunch download auto after convertion
  $task->toBrowser();
  //delete file on IlovePdf server
  $task->delete();
  //stock the file into a folder for download later
  //$task->download('../public/download');

}

function deleteFileFromServer($fileName){

unlink("../public/uploads/".$fileName);

}









