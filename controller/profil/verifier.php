<?php 

require_once ROOT . '/model/token.model.php';
require_once ROOT . '/model/profil.model.php';
 // verifi si le token est correct

if(isset($_GET['token'])){
    if(tokenExist($pdo, tokenExist($pdo, $_GET['token']))){
    
    
    }
    require_once ROOT . '/view/profil/verifier.php';
}else{
    header('Location: index.php');
}


