<?php 
require ROOT . '/model/auteurs.model.php';
require_once ROOT. '/tools/tools.php';
$citations = citations_fetchAll($pdo);
$auteurs = auteurs_fetchAll($pdo);



require ROOT . '/view/citations/list.php';