<?php
require_once ROOT . '/model/citations.model.php';

if (isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'list':
        case 'add':
        case 'delete':
        case 'update':
        case 'json' :
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