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

<body class="vh-100 vw-100 d-flex align-items-center justify-content-center">
    <main class="w-100">
    <?php if (isset($_SESSION['msg'])) : ?>
        <div class="msg mx-auto w-25 alert text-center alert-<?= $_SESSION['msg']['css'] ?>">
            <?= $_SESSION['msg']['txt'] ?>
        </div>
    <?php endif;
    unset($_SESSION['msg']) ?>
        <h2 class="display-3 text-center mb-4"><?= $title ?></h2>
        <div class="content ">
            <?= $content ?>
        </div>
    </main>
</body>

</html>