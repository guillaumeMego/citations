<?php
$title = 'Modifier une citation';
ob_start();
?>

<form action="index.php?controller=citations&action=update&id_citations=<?= $_GET['id_citations'] ?>" method="post" class="form-control w-75 mx-auto p-3 mb-5">
    <div class="fields">
        <div class="field">
            <label for="citation" class="form-label">Citation</label><br>
            <input type="text" name="citation" class="form-control" id="citation" value="<?= $citation['citation'] ?>">
        </div><br>
        <div class="field">
            <label for="auteur_id" class="form-label">Auteur</label><br>
            <select name="auteur_id" id="auteur_id" class="form-select">
                <option value="">Auteur inconnu</option>
                <?php foreach ($auteurs as $auteur) : ?>
                    <?php $selected = ($auteur['id'] == $auteurId['id']) ? 'selected' : ''; ?>
                    <option value="<?= htmlspecialchars($auteur['id']) ?>" <?= $selected ?>><?= htmlspecialchars($auteur['auteur']) ?></option>
                <?php endforeach ?>

            </select>
        </div><br>
        <div class="field">
            <label for="explication" class="form-label">Description</label><br>
            <textarea name="explication" id="explication" class="form-control" value="<?= $citation['explication'] ?>"><?= $citation['explication'] ?></textarea>
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