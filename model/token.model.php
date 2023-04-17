<?php 


require __DIR__ . '/pdo.php';
// verifier email existe
function verifieMail($pdo, $mail){
    $sql = "SELECT * FROM utilisateurs WHERE mail = :mail";
    $query = $pdo->prepare($sql);
    $query->execute([
        'mail' => $mail
    ]);
    $result = $query->fetch();
    return $result;
}

// fonction qui créé un token
function token($pdo, $mail){
    $token = md5(uniqid(rand(), true));
    $sql = 'UPDATE utilisateurs SET token = :token WHERE mail = :mail';
    $query = $pdo->prepare($sql);
    $query->execute([
        'token' => $token,
        'mail' => $mail
    ]);
    return $token; 
}

// verifier si le token est correct
function verifieToken($pdo, $mail, $token){
    $sql = 'SELECT * FROM utilisateurs WHERE token = :token AND mail = :mail';
    $query = $pdo->prepare($sql);
    $query->execute([
        'token'=> $token,
        'mail' => $mail
    ]);
    $result = $query->fetch();
    return $result;
}

//verifier si le token exist
function tokenExist($pdo, $token){
    $query = $pdo->prepare('SELECT token FROM utilisateurs WHERE token = :token');
    $query->execute([
        'token' => $token
    ]);
    $result = $query->fetch();
    return $result !== false;
}

// id part rapport au token
function idToken($pdo, $token){
    $query = $pdo->prepare('SELECT id FROM utilisateurs WHERE token = :token');
    $query->execute([
            'token' => $token
        ]);
    $result = $query->fetch();
    return intval($result['id']); // convertir l'id en entier avec la fonction intval()
}

// fonction qui supprime le token
function deleteToken($pdo, $id){
    $sql = 'DELETE token FROM utilisateurs WHERE id = :id LIMIT 1';
    $query = $pdo->prepare($sql);
    $query->execute([
        'id' => $id
    ]);
    return $query;
}