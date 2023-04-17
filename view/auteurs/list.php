
<?php
$title = 'Liste des auteurs';
ob_start();
?>

<div class="content">
<form action="index.php?controller=auteurs&action=add" method="post" class="col-10 mx-auto m-4 shadow p-3 rounded">
    <div class="fields">
        <div class="field">
            <label for="auteur" class="form-label">Auteur</label><br>
            <input type="text" name="auteur" id="auteur" class="form-control">
        </div><br>
        <div class="field">
            <label for="bio" class="form-label">Biographie</label><br>
            <textarea name="bio" id="bio" class="form-control"></textarea>
        </div>
    </div>
    <div class="submit">
        <input type="submit" class="btn btn-outline-dark mt-3">
    </div>
</form>
<table class="table table-light table-hover w-75 mx-auto shadow-lg">
    <thead class="border-dark">
        <tr>
            <th>Auteurs</th>
            <th>Bio</th>
            <th>Date modif</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($auteurs as $auteur) : ?>
            <tr>
                <td><?= $auteur['auteur'] ?></td>
                <td><?= $auteur['bio'] ?></td>
                <td><?= $auteur['date_modif'] ?></td>
                <td>
                    <a href="index.php?controller=auteurs&action=update&id_auteurs=<?= $auteur['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg></a>&nbsp;
                                        <a href="index.php?controller=auteurs&action=delete&id_auteurs=<?= $auteur['id'] ?>" class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                    </svg></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
</div>
<?php
$content = ob_get_clean();
require ROOT . '/view/template.php';
?>