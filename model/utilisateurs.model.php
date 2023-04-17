<?php 




require_once ROOT . '/model/utilisateurs.model.php';

// supprime un utilisateur par l'id

function deleteUser(PDO $pdo, int $id): bool
{
    $sql = 'DELETE FROM utilisateurs WHERE id = :id';
    $q = $pdo->prepare($sql);
    
    return $q->execute([
        ':id' => $id]);
}


/**
 * Permet d'ajouter un utilisateur
 * @param PDO $pdo
 * @param string $mail
 * @return array|false
 */
function ajoutUtilisateur(PDO $pdo, string $prenom = NULL, string $nom = NULL, string $mail, string $password = NULL, $isAdmin): bool
{
    $sql = 'INSERT INTO utilisateurs (prenom, nom, mail, mot_de_passe, is_admin) VALUES (:prenom, :nom, :mail, :mot_de_passe, :is_admin)';
    $q = $pdo->prepare($sql);
    return $q->execute([
        ':prenom' => $prenom,
        ':nom' => $nom,
        ':mail' => $mail,
        ':mot_de_passe' => $password,
        ':is_admin' => $isAdmin
    ]);
}