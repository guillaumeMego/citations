<?php
require_once ROOT . '/model/citations.model.php';

if (isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'auth':
        case 'deconnexion':
        case 'update':
        case 'add':
        case 'delete':
        case 'token':
        case 'verifier':
        case 'mdp':
            $action = $_GET['action'];
            break;
        default:
            $action = ROOT . 'controller/404/index';
    }
}
else {
    $action = 'auth';
}

require_once __DIR__ . '/' . $action . '.php';


