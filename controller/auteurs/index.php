<?php
require_once ROOT . '/model/auteurs.model.php';

if (isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'list':
        case 'delete':
        case 'add':
        case 'update':
            $action = $_GET['action'];
            break;
        default:
            $action = ROOT . 'controller/404/index.php';
    }
}
else {
    $action = 'list';
}

require_once __DIR__ . '/' . $action . '.php';