<?php 
/**
 * Composant d'acces aux données de la table citations
 */
require_once __DIR__ . '/pdo.php';  
require_once ROOT . '/tools/tools.php';
/**
 * Retourne toutes les citations
 * @param PDO $pdo
 * @return array $citation
 */
function citations_fetchAll(PDO $pdo) 
{
    $sql = 'SELECT citations.id, citations.citation, citations.explication, DATE_FORMAT(citations.date_modif, "%d-%m-%Y") as date_modif, auteurs.auteur FROM citations
            LEFT JOIN auteurs ON auteurs.id = citations.auteurs_id';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Retourne une citation par son id
 * @param PDO $pdo
 * @param int $id
 * @return array | false
 */
function citations_fetchById(PDO $pdo, int $id){
    $sql = 'SELECT * FROM citations WHERE citations.id = :id';
    $q = $pdo->prepare($sql);
    $q->execute([
        ':id' => $id
    ]);
    return $q->fetch(PDO::FETCH_ASSOC);
}

/**
 * Verifie si une citation existe
 * @param PDO $pdo
 * @param int $id
 * @return array | false
 */
function citations_exist(PDO $pdo, string $citation){
    $sql = 'SELECT * FROM citations WHERE citations.citation = :citation';
    $q = $pdo->prepare($sql);
    $q->execute([
        ':citation' => $citation
    ]);
    return $q->fetch(PDO::FETCH_ASSOC);
}

/**
 * Ajoute une citation
 * @param PDO $pdo
 * @param string $citation
 * @param string $explication
 * @param int $auteurs_id
 * @return bool
 */
function citations_add(PDO $pdo, string $citation, string $explication = NULL, int $auteurs_id = NULL){
    $sql = 'INSERT INTO citations (citation, explication, auteurs_id) VALUES (:citation, :explication, :auteurs_id)';
    $q = $pdo->prepare($sql);
    return  $q->execute([
        ':citation' => $citation,
        ':explication' => $explication,
        ':auteurs_id' => $auteurs_id
    ]);
}

/**
 * Supprime une citation
 * @param PDO $pdo
 * @param int $id
 * @return bool
 */
function citations_delete(PDO $pdo, int $id){
    $sql = 'DELETE FROM citations WHERE id = :id';
    $q = $pdo->prepare($sql);
    return $q->execute([
        ':id' => $id
    ]);
}

/**
 * Met a jour la citation
 * @param PDO $pdo
 * @param int $id
 * @return array
 */
function updateCitation(PDO $pdo, string $citation, int $id){
    $sql = 'UPDATE citations SET citation = :citation, date_modif = NOW() WHERE id = :id';
    $q = $pdo->prepare($sql);
    return $q->execute([
        ':citation' => $citation,
        ':id' => $id
    ]);
}


/**
 * Met a jour l'auteur d'une citation
 * @param PDO $pdo
 * @param int $id
 * @return array
 */
function updateAuteur(PDO $pdo, int $auteur_id = NULL, int $id){
    $sql = 'UPDATE citations SET auteurs_id = :auteurs_id, date_modif = NOW() WHERE id = :id';
    $q = $pdo->prepare($sql);
    return $q->execute([
        ':auteurs_id' => $auteur_id,
        ':id' => $id
    ]);
}


/**
 * Met a jour l'explication d'une citation
 * @param PDO $pdo
 * @param int $id
 * @return array
 */
function updateExplication(PDO $pdo, string $explication = NULL, int $id){
    $sql = 'UPDATE citations SET explication = :explication, date_modif = NOW() WHERE id = :id';
    $q = $pdo->prepare($sql);
    return $q->execute([
        ':explication' => $explication,
        ':id' => $id
    ]);
}