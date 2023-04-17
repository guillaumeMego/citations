
<?php 
$title = 'Se connecter';
ob_start();
?>
        <form action="index.php?controller=profil&action=auth" method="post" class="form-control mx-auto p-4 shadow w-25">
            <div class="fields">
                <div class="field">
                    <label for="mail" class="form-label">Mail</label><br>
                    <input type="email" name="mail" id="mail" class="form-control" required>
                </div><br>
                <div class="field">
                    <label for="mot_de_passe" class="form-label">Mot de passe</label><br>
                    <input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control">
                </div><br>
            </div>
            <div class="submit d-flex justify-content-evenly">
                <input type="submit" value="Se connecter" class="btn btn-outline-dark">
                <a href="index.php?controller=profil&action=add" class="btn btn-outline-dark">S'inscrire</a>
            </div><br>
            <div class="mdp text-center">
            <a href="index.php?controller=profil&action=token" class="nav-link text-primary">Mot de passe oublié ?</a>
            </div>
        </form>     
<?php 
$content = ob_get_clean();
require ROOT . '/view/template_connect.php';
?>