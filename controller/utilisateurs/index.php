<?php


require_once ROOT . '/model/citations.model.php';

if (isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'update':
        case 'add':
        case 'delete':
        case 'list' :
            $action = $_GET['action'];
            break;
        default:
            $action = ROOT . '/controller/404/index.php';
    }
}
else {
    $action = 'list';
}

require_once __DIR__ . '/' . $action . '.php';

