<?php
session_start();
require_once dirname(__DIR__) . '/tools/tools.php';
require '../inc/config.php';




    if (isset($_GET['controller'])) {
        switch ($_GET['controller']) {
            case 'citations':
            case 'profil':
            case 'auteurs':
            case 'utilisateurs':
                $controller = $_GET['controller'];
                break;
            default:
                $controller = '404';
        }
    } else {
        $controller = 'citations';
    }
 if(!isset($_SESSION['profil']))
    {
        $controller = 'profil';
    }
require_once ROOT . '/controller/' . $controller . '/index.php';
