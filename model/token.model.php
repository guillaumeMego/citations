<?php 


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
    $sql = 'SELECT id FROM utilisateurs WHERE token = :token';
    $query = $pdo->execute(
        [
            'token' => $token
        ]
        );
    $result = $query->fetch();
    return $result;
}
