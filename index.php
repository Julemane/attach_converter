<?php

$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '/' :
        require __DIR__ . '/mainView.php';
        break;
    case '' :
        require __DIR__ . '/mainView.php';
        break;
    case 'upload' :
        require __DIR__ . '/upload.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/mainView.php';
        break;
}

