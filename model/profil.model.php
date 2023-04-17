<?php

require __DIR__ . '/pdo.php';

/**
 * Permet de recuperer un mot de passe en fonction d'un mail
 * @param PDO $pdo
 * @param string $mail
 * @return string|false
 */
function getPassword(PDO $pdo, string $mail): string | false
{
    $sql = 'SELECT utilisateurs.mot_de_passe FROM utilisateurs WHERE utilisateurs.mail = :mail';
    $q = $pdo->prepare($sql);
    $q->bindValue(':mail', $mail);
    $q->execute();

    return $q->fetchColumn();
}

/**
 * Permet de recuperer les infos d'un utilisateur en fonction d'un mail
 * @param PDO $pdo
 * @param string $mail
 * @return array|false
 */
function fetchAllByMail(PDO $pdo, string $mail)
{
    $sql = 'SELECT id, prenom, nom, mail, is_admin FROM utilisateurs WHERE utilisateurs.mail = :mail';
    $q = $pdo->prepare($sql);
    $q->bindValue(':mail', $mail);
    $q->execute();
    return $q->fetch(PDO::FETCH_ASSOC);
}

/**
 * Permet de recuperer les infos de tous les utilisateurs
 * @param PDO $pdo
 * @param string $mail
 * @return array|false
 */
function fetchAllUsers(PDO $pdo)
{
    $sql = 'SELECT id, prenom, nom, mail, is_admin, DATE_FORMAT(utilisateurs.date_modif, "%d-%m-%Y") as date_modif FROM utilisateurs';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Permet de recuperer les infos d'un utilisateur en fonction d'un id
 * @param PDO $pdo
 * @param string $mail
 * @return array|false
 */
function fetchAllById(PDO $pdo, int $id)
{
    $sql = 'SELECT id, prenom, nom, mail, is_admin FROM utilisateurs WHERE utilisateurs.id = :id';
    $q = $pdo->prepare($sql);
    $q->bindValue(':id', $id);
    $q->execute();
    return $q->fetch(PDO::FETCH_ASSOC);
}

/**
 * Permet d'ajouter un utilisateur
 * @param PDO $pdo
 * @param string $mail
 * @return array|false
 */
function addUser(PDO $pdo, string $prenom = NULL, string $nom = NULL, string $mail, string $password = NULL): bool
{
    $sql = 'INSERT INTO utilisateurs (prenom, nom, mail, mot_de_passe) VALUES (:prenom, :nom, :mail, :mot_de_passe)';
    $q = $pdo->prepare($sql);
    return $q->execute([
        ':prenom' => $prenom,
        ':nom' => $nom,
        ':mail' => $mail,
        ':mot_de_passe' => $password
    ]);
}

/**
 * Permet de modifier le nom d'un utilisateur
 * @param PDO $pdo
 * @param string $mail
 * @return array|false
 */
function updateName(PDO $pdo, string $nom, int $id): bool
{
    $sql = 'UPDATE utilisateurs SET nom = :nom WHERE id = :id';
    $q = $pdo->prepare($sql);
    return $q->execute([
        ':nom' => $nom,
        ':id' => $id
    ]);
}

/**
 * Permet de modifier le prenom d'un utilisateur
 * @param PDO $pdo
 * @param string $mail
 * @return array|false
 */
function updateFirstName(PDO $pdo, string $prenom, int $id): bool
{
    $sql = 'UPDATE utilisateurs SET prenom = :prenom WHERE id = :id';
    $q = $pdo->prepare($sql);
    return $q->execute([
        ':prenom' => $prenom,
        ':id' => $id
    ]);
}

/**
 * Permet de modifier le mail d'un utilisateur
 * @param PDO $pdo
 * @param string $mail
 * @return array|false
 */
function updateMail(PDO $pdo, string $mail, int $id): bool
{
    $sql = 'UPDATE utilisateurs SET mail = :mail WHERE id = :id';
    $q = $pdo->prepare($sql);
    return $q->execute([
        ':mail' => $mail,
        ':id' => $id
    ]);
}

/**
 * Permet de modifier le mot de passe d'un utilisateur
 * @param PDO $pdo
 * @param string $mail
 * @return array|false
 */
function updatePassword(PDO $pdo, string $password, int $id): bool
{
    $sql = 'UPDATE utilisateurs SET mot_de_passe = :mot_de_passe WHERE id = :id';
    $q = $pdo->prepare($sql);
    return $q->execute([
        ':mot_de_passe' => $password,
        ':id' => $id
    ]);
}

/**
 * Permet de modifier le statut d'un utilisateur
 * @param PDO $pdo
 * @param string $mail
 * @return array|false
 */
function updateStatus(PDO $pdo, int $is_admin, int $id): bool
{
    $sql = 'UPDATE utilisateurs SET is_admin = :is_admin WHERE id = :id';
    $q = $pdo->prepare($sql);
    return $q->execute([
        ':is_admin' => $is_admin,
        ':id' => $id
    ]);
}

/**
 * Permet de supprimer un utilisateur
 * @param PDO $pdo
 * @param string $mail
 * @return array|false
 */
function deleteUser(PDO $pdo, int $id): bool
{
    $sql = 'DELETE * FROM utilisateurs WHERE id = :id LIMIT 1';
    $q = $pdo->prepare($sql);
    return $q->execute([
        ':id' => $id
    ]);
}
