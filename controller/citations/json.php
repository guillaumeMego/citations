<?php 
header('Access-Control-Allow-Origin: localhost:8888'); 
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
require ROOT . '/model/auteurs.model.php';


$data = [];
$data['date'] = date('c');
$data['citations'] = citations_fetchAll($pdo);
$data['auteurs'] = auteurs_fetchAll($pdo);


$citations = citations_fetchAll($pdo);
$auteurs = auteurs_fetchAll($pdo);

echo json_encode($data);






