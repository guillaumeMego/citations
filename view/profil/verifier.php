<?php
$title = 'Mot de passe oublié';
ob_start();

?>

<form action="index.php?controller=profil&action=verifier" method="post" class="form-control mx-auto p-4 shadow w-25">
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div><br>
    <div class="form-group">
        <label for="passwordconfirm">Confirmation de mot de passe</label>
        <input type="password" name="passwordconfirm" id="passwordconfirm" class="form-control" required>
    </div><br>
    <input type="submit" value="Modifier mot de passe" class="btn btn-outline-dark">
</form>

<?php
$content = ob_get_clean();
require ROOT . '/view/template_connect.php';
?>