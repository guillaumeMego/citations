<?php
$title = 'Modifier une citation';
ob_start();
?>

<form action="index.php?controller=auteurs&action=update&id_auteurs=<?= $_GET['id_auteurs'] ?>" method="post" class="form-control w-75 mx-auto p-3 mb-5">
    <div class="fields">
        <div class="field">
            <label for="auteur" class="form-label">Auteur</label><br>
            <input type="text" name="auteur" class="form-control" id="auteur" value="<?= $auteur['auteur'] ?>">
        </div><br>
        <div class="field">
            <label for="bio" class="form-label">Description</label><br>
            <textarea name="bio" id="bio" class="form-control" ><?= $auteur['bio'] ?></textarea>
        </div>
    </div>
    <div class="submit">
        <input type="submit" class="btn btn-outline-dark mt-3">
    </div>
</form>

<?php
$content = ob_get_clean();
require ROOT . '/view/template.php';
?>