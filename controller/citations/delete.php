<?php 

if(isset($_GET['id_citations'])){
    citations_delete($pdo, $_GET['id_citations']);
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
header('Location: index.php?controller=citations&action=list');

?>