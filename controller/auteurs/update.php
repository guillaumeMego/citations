<?php 

require_once ROOT . '/model/auteurs.model.php';

$auteur = auteurs_fetchById($pdo, $_GET['id_auteurs']);
if (isset($_POST['auteur'], $_POST['bio'])) {
    if (!empty($_POST['auteur'])) {
        $auteur = htmlspecialchars($_POST['auteur']);
        if (auteur_update($pdo, $auteur, $_GET['id_auteurs'])) {
            $bio = empty($_POST['bio']) ? NULL : $_POST['bio'];
            if (auteurBio_update($pdo, $bio, $_GET['id_auteurs'])) {
                $_SESSION['msg'] = [
                    'css' => 'success',
                    'txt' => 'Auteur modifié'
                ];
            } else {
                $_SESSION['msg'] = [
                    'css' => 'warning',
                    'txt' => 'Une erreur est survenue'
                ];
            }
        } else {
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'Une erreur est survenue'
            ];
        }
    } else {
        $_SESSION['msg'] = [
            'css' => 'warning',
            'txt' => 'Veuillez remplir le nom de l\'auteur'
        ];
    }
    header('Location: index.php?controller=auteurs');
    exit;
}

require_once ROOT . '/view/auteurs/update.php';




