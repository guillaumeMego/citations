<?php 


// Traiter le formulaire d'inscription
require ROOT . '/model/utilisateurs.model.php';
if(isset($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['mot_de_passe'])){
    if(!empty($_POST['mail'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $password = $_POST['mot_de_passe'];
        $is_admin = $_POST['is_admin'];

        $password = password_hash($password, PASSWORD_DEFAULT);
        if(ajoutUtilisateur($pdo, $prenom, $nom, $mail, $password, $is_admin)){
            header('Location: index.php?controller=utilisateurs');
        }
        else {
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'Une erreur est survenue'
            ];
        }
    }
    else {
        $_SESSION['msg'] = [
            'css' => 'warning',
            'txt' => 'Merci de compléter tous les champs'
        ];
    }
}
require ROOT . '/view/profil/add.php';