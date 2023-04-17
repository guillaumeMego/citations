<?php 

require __DIR__ . '/pdo.php';


/**
 * Récupère tous les auteurs
 * @param PDO $pdo
 * @return array
 */
function auteurs_fetchAll(PDO $pdo){
    $sql = 'SELECT * FROM auteurs ORDER BY auteur';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

// recuperer les info d'n auteurs par son id
function auteurs_fetchById(PDO $pdo, int $id){
    $sql = 'SELECT * FROM auteurs WHERE id = :id';
    $q = $pdo->prepare($sql);
    $q->execute([
        ':id' => $id
    ]);
    return $q->fetch(PDO::FETCH_ASSOC);
}

/**
 * Récupère un auteur par son id
 * @param PDO $pdo
 * @param int $id
 * @return array
 */
function auteurById(PDO $pdo, int $id){
    $sql = 'SELECT auteurs.id FROM auteurs
            LEFT JOIN citations ON citations.auteurs_id = auteurs.id
            WHERE citations.id = :id';
    $q = $pdo->prepare($sql);
    $q->execute([
        ':id' => $id
    ]);
    return $q->fetch(PDO::FETCH_ASSOC);
}



/**
 * Modifie le nom d'un auteur
 * @param PDO $pdo
 * @param string $auteur
 * @return array
 */
function auteur_update(PDO $pdo, string $auteur, int $id){
    $sql = 'UPDATE auteurs SET auteur = :auteur, date_modif = NOW() WHERE id = :id';
    $q = $pdo->prepare($sql);
    return $q->execute([
        ':auteur' => $auteur,
        ':id' => $id
    ]);
}

/**
 * Modifie la bio d'un auteur
 * @param PDO $pdo
 * @param string $bio
 * @return array
 */
function auteurBio_update(PDO $pdo,  string $bio = NULL ,int $id){
    $sql = 'UPDATE auteurs SET bio = :bio, date_modif = NOW() WHERE id = :id';
    $q = $pdo->prepare($sql);
    return $q->execute([
        ':bio' => $bio,
        ':id' => $id
    ]);
}

/**
 * Ajoute un auteur
 * @param PDO $pdo
 * @param string $auteur
 * @param string $bio
 * @return array
 */
function auteur_add(PDO $pdo, string $auteur, string $bio = NULL){
    $sql = 'INSERT INTO auteurs (auteur, bio) VALUES (:auteur, :bio)';
    $q = $pdo->prepare($sql);
    return  $q->execute([
        ':auteur' => $auteur,
        ':bio' => $bio
    ]);
}

// Vreifi si unauteur exist
function auteur_exist(PDO $pdo, string $auteur){
    $sql = 'SELECT * FROM auteurs WHERE auteurs.auteur = :auteur';
    $q = $pdo->prepare($sql);
    $q->execute([
        ':auteur' => $auteur
    ]);
    return $q->fetch(PDO::FETCH_ASSOC);
}

/**
 * Supprime un auteur
 * @param PDO $pdo
 * @param int $id
 * @return array
 */
function auteur_delete(PDO $pdo, int $id){
    $sql = 'DELETE FROM auteurs WHERE id = :id';
    $q = $pdo->prepare($sql);
    return $q->execute([
        ':id' => $id
    ]);
}


?>