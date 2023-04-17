<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title><?= $title ?>- Citations</title>
</head>

<body>
    <?php if (isset($_SESSION['msg'])) : ?>
        <div class="msg alert text-center alert-<?= $_SESSION['msg']['css'] ?>">
            <?= $_SESSION['msg']['txt'] ?>
        </div>
    <?php endif;
    unset($_SESSION['msg']) ?>
    <header class="mb-4">
        <h1 class="display-2 text-center">Citations</h1>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Bienvenue <?= ucfirst($_SESSION['profil']['prenom']) ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="index.php?controller=citations">Les citations</a></li>
                        <li class="nav-item">
                            <a href="index.php?controller=auteurs&action=list" class="nav-link active">Auteurs</a>
                        </li>
                        <?php if($_SESSION['profil']['is_admin'] == 1) : ?>
                        <li class="nav-item">
                            <a href="index.php?controller=utilisateurs&action=list" class="nav-link active">Utilisateurs</a>
                        </li>
                        <?php endif ?>
                        <li class="nav-item">
                            <a href="index.php?controller=profil&action=update" class="nav-link active">Modifier son profil</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?controller=citations&action=json" class="nav-link active">Format JSON</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?controller=profil&action=deconnexion" class="nav-link active">Se deconnecter</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <h2 class="display-6 text-center"><?= $title ?></h2>
        <div class="content">
            <?= $content ?>
        </div>
    </main>
</body>

</html>