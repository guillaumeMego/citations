<?php

require_once ROOT . '/model/profil.model.php';

$utilisateur = fetchAllById($pdo, $_GET['id_utilisateurs']);
// modifier les données d'un utilisateur une par une 
if (isset($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['mot_de_passe'])) {
    if (!empty($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);
        if (updateName($pdo, $nom, $_GET['id_utilisateurs'])) {
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
        if (updateFirstName($pdo, $prenom, $_GET['id_utilisateurs'])) {
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
        if (updateMail($pdo, $mail, $_GET['id_utilisateurs'])) {
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
        if (updatePassword($pdo, $password, $_GET['id_utilisateurs'])) {
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
    if(isset($_POST['is_admin'])) {
        // recuperer le is_admin de l'utilisateur sous forme de radio
        $is_admin = $_POST['is_admin'];
        if (updateStatus($pdo, $is_admin, $_GET['id_utilisateurs'])) {
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
    header('Location: ' . $_SERVER['REQUEST_URI']);
}

require ROOT . '/view/utilisateurs/update.php';
