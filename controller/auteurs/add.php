<?php 


if(isset($_POST['auteur'], $_POST['bio'])){
    if(!empty($_POST['auteur'])){
        
        $bio = empty($_POST['bio']) ? NULL : $_POST['bio'];
        $auteur = htmlspecialchars($_POST['auteur']);
        if(auteur_exist($pdo, $auteur)){
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'Cet auteur existe déjà'
            ];
        }else{
            if(auteur_add($pdo, $auteur, $bio)){
                $_SESSION['msg'] = [
                    'css' => 'success',
                    'txt' => 'Auteur ajoutée'
                ];
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
            'txt' => 'Veuillez remplir le nom de l\'auteur'
        ];
    }
}
header('Location: index.php?controller=auteurs&action=list');