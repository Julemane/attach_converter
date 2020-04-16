<?php
require_once('../app/controller.php');

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
             $result = uploadFile($_FILES['monfichier']['name'],
                         $_FILES['monfichier']['size'],
                         $_FILES['monfichier']['error'],
                         $_FILES['monfichier']['tmp_name'],
                         pathinfo($_FILES['monfichier']['name'])['extension']
                     );
            };
        require('views/uploadView.php');
        break;

    default:
        http_response_code(404);
        require('views/uploadView.php');
        break;

}






