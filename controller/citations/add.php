<?php 


if(isset($_POST['citation'], $_POST['auteur_id'], $_POST['explication'])){
    if(!empty($_POST['citation'])){
        $auteurs_id = empty($_POST['auteur_id']) ? NULL : $_POST['auteur_id'];
        $explication = empty($_POST['explication']) ? NULL : $_POST['explication'];
        $citation = htmlspecialchars($_POST['citation']);
        if(citations_exist($pdo, $citation)){
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'Cette citation existe déjà'
            ];
        }else{
            if(citations_add($pdo, $citation, $explication, $auteurs_id)){
                $_SESSION['msg'] = [
                    'css' => 'success',
                    'txt' => 'Citation ajoutée'
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
            'txt' => 'Veuillez remplir la citation'
        ];
    }
}
header('Location: index.php?controller=citations&action=list');

?>