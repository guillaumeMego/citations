<?php  
require ROOT . '/model/profil.model.php';


if(isset($_GET['action']) && $_GET['action'] === 'deconnexion') {
    unset($_SESSION['profil']);
}
header('Location: index.php');