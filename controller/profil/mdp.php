<?php 

require_once ROOT . '/model/token.model.php';
require_once ROOT . '/model/profil.model.php';

if(!empty($_POST['password']) && !empty($_POST['passwordconfirm'])){
    if($_POST['password'] == $_POST['passwordconfirm']){
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $token = $_GET['token'];
        $id = idToken($pdo, $token);
        if(updatePassword($pdo, $password, $id)){
            deleteToken($pdo, $id);
            header('Location: index.php');
        }else{
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'Une erreur est survenue'
            ];
        }
    }else{
        $_SESSION['msg'] = [
            'css' => 'warning',
            'txt' => 'Les mots de passe ne correspondent pas'
        ];
    }
}require_once ROOT . '/view/profil/verifier.php';

?>