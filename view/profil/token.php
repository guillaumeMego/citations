<?php 
$title = 'Mot de passe oublié';
ob_start();

?>

<form action="index.php?controller=profil&action=token" method="post" class="form-control mx-auto p-4 shadow w-25">
    <div class="form-group">
        <label for="mail">Mail</label>
        <input type="email" name="mail" id="mail" class="form-control" required>
    </div><br>
    <div class="submit d-flex justify-content-evenly">
        <a href="index.php" class="btn btn-outline-dark">Précédent</a>
        <input type="submit" value="Envoyer token" class="btn btn-outline-dark">

    </div>
</form>

<?php
$content = ob_get_clean();
require ROOT . '/view/template_connect.php';
?>