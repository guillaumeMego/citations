<?php 

require_once ROOT . '/model/token.model.php';
require_once ROOT . '/model/profil.model.php';
 // verifi si le token est correct

if(isset($_GET['token'])){
    if(tokenExist($pdo, tokenExist($pdo, $_GET['token']))){
        if(!empty($_POST['password']) && !empty($_POST['passwordconfirm'])){
            if($_POST['password'] == $_POST['passwordconfirm']){
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $id = idToken($pdo, $token);
                if(updatePassword($pdo, $password, $id)){
                    $_SESSION['msg'] = [
                        'css' => 'success',
                        'txt' => 'Mot de passe modifié, veuillez vous reconnecter'
                    ];
                    header('Location: index.php');
                }else{
                    $_SESSION['msg'] = [
                        'css' => 'warning',
                        'txt' => 'Une erreur est survenue'
                    ];
                }
            }
        }else{
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'Les mots de passe ne correspondent pas'
            ];
        }
        
    }
    require_once ROOT . '/view/profil/verifier.php';
}else{
    header('Location: index.php');
}


