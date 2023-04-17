<?php 
require_once ROOT . '/model/auteurs.model.php';

$auteurs = auteurs_fetchAll($pdo);



require ROOT . '/view/auteurs/list.php';