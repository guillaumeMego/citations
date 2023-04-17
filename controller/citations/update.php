<?php
require_once ROOT . '/model/citations.model.php';
require_once ROOT . '/model/auteurs.model.php';
require_once ROOT . '/tools/tools.php';

$citation = citations_fetchById($pdo, $_GET['id_citations']);
$auteurId = auteurById($pdo, $_GET['id_citations']);
$auteurs = auteurs_fetchAll($pdo);

if (isset($_POST['citation']) && isset($_POST['auteur_id']) && isset($_POST['explication'])) {

    if (!empty($_POST['citation'])) {
        $citation = htmlspecialchars($_POST['citation']);
        if (updateCitation($pdo, $citation, $_GET['id_citations'])) {
            $auteurId = empty($_POST['auteur_id']) ? NULL : $_POST['auteur_id'];
            if (updateAuteur($pdo, $auteurId, $_GET['id_citations'])) {
                $explication = empty($_POST['explication']) ? NULL : $_POST['explication'];
                if (updateExplication($pdo, $explication, $_GET['id_citations'])) {
                    $_SESSION['msg'] = [
                        'css' => 'success',
                        'txt' => 'Citation modifiée'
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
                'txt' => 'Une erreur est survenue'
            ];
        }
    } else {
        $_SESSION['msg'] = [
            'css' => 'warning',
            'txt' => 'Veuillez remplir le nom de la citation'
        ];
        
    }
    header('Location: index.php?controller=citations&action=list');
    exit;
}


require_once ROOT . '/view/citations/update.php';
