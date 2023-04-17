<?php 

require_once ROOT . '/model/profil.model.php';

// supprimer le profil
if($_SESSION['profil']['id']) {
    if (deleteUser($pdo, $_SESSION['profil']['id'])) {
        session_unset();
        $_SESSION['msg'] = [
            'css' => 'success',
            'txt' => 'Votre profil a été supprimé'
        ];
        header('Location: index.php');
    } else {
        $_SESSION['msg'] = [
            'css' => 'warning',
            'txt' => 'Une erreur est survenue'
        ];
    }
    
}