<?php 

if(isset($_GET['id_auteurs'])){
    auteur_delete($pdo, $_GET['id_auteurs']);
    $_SESSION['msg'] = [
        'css' => 'success',
        'txt' => 'Citation supprimée'
    ];
}else{
    $_SESSION['msg'] = [
        'css' => 'warning',
        'txt' => 'Action impossible'
    ];
}
header('Location: index.php?controller=auteurs&action=list');

?>