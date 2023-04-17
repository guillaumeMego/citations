<?php 
require ROOT . '/model/profil.model.php';

$utilisateurs = fetchAllUsers($pdo);



require ROOT . '/view/utilisateurs/list.php';