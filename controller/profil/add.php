<?php 


// Traiter le formulaire d'inscription
require ROOT . '/model/profil.model.php';
if(isset($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['mot_de_passe'])){
    if(!empty($_POST['mail'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $password = $_POST['mot_de_passe'];

        $password = password_hash($password, PASSWORD_DEFAULT);
        if(addUser($pdo, $prenom, $nom, $mail, $password)){
            header('Location: index.php');
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