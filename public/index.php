<?php
require_once('../app/controller.php');
require_once('../app/ilovepdf/init.php');

//add config file to handle dynamic path of upload folder
$domainName = "http://www.pdf-converter.jeremy-hennebique.com";

//if there is an action to do we retrieve it else we redirect uploadView
if(isset($_GET['action'])){
    $action = $_GET['action'];
}else{
     $action = 1;
};

switch($action){
   case '1' :
       require('views/uploadView.php');
       break;

    case 'upload':
        if(isset($_FILES['monfichier'])){
            //$result is an array who contain info about the file uploaded
             $result = fileUpload($_FILES['monfichier']['name'],
                         $_FILES['monfichier']['size'],
                         $_FILES['monfichier']['error'],
                         $_FILES['monfichier']['tmp_name'],
                         pathinfo($_FILES['monfichier']['name'])['extension']
                     );
            };
        require('views/uploadView.php');
        break;

    case 'convert':
        if(isset($_POST['fileName'])){
        $fileName = strval($_POST['fileName']);
        var_dump($fileName);
        $fileUrl = $domainName."/public/uploads/".$fileName;
            if(isset($_POST["compressionLevel"]) AND
                $_POST["compressionLevel"] == "recommended" OR
                $_POST["compressionLevel"] == "low" OR
                $_POST["compressionLevel"] == "extreme"){

                    $compressionLevel = $_POST["compressionLevel"];
                    convertfile($fileUrl, $compressionLevel, $fileName);

                }
        }

        break;

    case 'delete':
        deleteFileFromServer(($_GET['fileName']));
        header('location:?action=1');

        break;


    default:
        http_response_code(404);
        require('views/uploadView.php');
        break;

}






