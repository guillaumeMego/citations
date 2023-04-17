<?php 

require ROOT . '/model/profil.model.php';


if (isset($_POST['mail'], $_POST['mot_de_passe'])) {
    if (!empty($_POST['mail'])) {
        $hash = getPassword($pdo, $_POST['mail']);
        if (is_string($hash)) {
            if (password_verify($_POST['mot_de_passe'], $hash)) {
                $_SESSION['profil'] = fetchAllByMail($pdo, $_POST['mail']);
                header('Location: index.php');
            } else {
                $_SESSION['msg'] = [
                    'css' => 'warning',
                    'txt' => 'Les identifiants ne correspondent pas'
                ];
            }
        } else {
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'Les identifiants ne correspondent pas'
            ];
        }
    } else {
        $_SESSION['msg'] = [
            'css' => 'warning',
            'txt' => 'Merci de completer tous les champs'
        ];
    }
}
require ROOT . '/view/profil/connexion.php';