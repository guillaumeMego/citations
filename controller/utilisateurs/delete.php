<?php 

require_once ROOT . '/model/utilisateurs.model.php';

// supprimer le profil
if($_GET['id_utilisateurs']) {
    if (deleteUser($pdo, $_GET['id_utilisateurs'])) {
        $_SESSION['msg'] = [
            'css' => 'success',
            'txt' => 'Le profil a été supprimé'
        ];
        header('Location: index.php?controller=utilisateurs&action=list');
        
    } else {
        $_SESSION['msg'] = [
            'css' => 'warning',
            'txt' => 'Une erreur est survenue'
        ];
    }
    
}