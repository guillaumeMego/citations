<?php
require ROOT . '/model/profil.model.php';

// modifier les données d'un utilisateur une par une 
if (isset($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['mot_de_passe'])) {
    if (!empty($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);
        if (updateName($pdo, $nom, $_SESSION['profil']['id'])) {
            $_SESSION['msg'] = [
                'css' => 'success',
                'txt' => 'Les données ont été modifiées'
            ];
        } else {
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'Une erreur est survenue'
            ];
        }
    }
    if (!empty($_POST['prenom'])) {
        $prenom = htmlspecialchars($_POST['prenom']);

        if (updateFirstName($pdo, $prenom, $_SESSION['profil']['id'])) {
            $_SESSION['msg'] = [
                'css' => 'success',
                'txt' => 'Les données ont été modifiées'
            ];
        } else {
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'Une erreur est survenue'
            ];
        }
    }
    if (!empty($_POST['mail'])) {
        $mail = htmlspecialchars($_POST['mail']);

        if (updateMail($pdo, $mail, $_SESSION['profil']['id'])) {
            $_SESSION['msg'] = [
                'css' => 'success',
                'txt' => 'Les données ont été modifiées'
            ];
        } else {
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'Une erreur est survenue'
            ];
        }
    }
    if (!empty($_POST['mot_de_passe'])) {
        $password = htmlspecialchars($_POST['mot_de_passe']);
        $password = password_hash($password, PASSWORD_DEFAULT);
        if (updatePassword($pdo, $password, $_SESSION['profil']['id'])) {
            $_SESSION['msg'] = [
                'css' => 'success',
                'txt' => 'Les données ont été modifiées'
            ];
        } else {
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'Une erreur est survenue'
            ];
        }
    } 
    $_SESSION['profil'] = fetchAllById($pdo, $_SESSION['profil']['id']);
}

require ROOT . '/view/profil/modifier.php';
