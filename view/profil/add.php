<?php 
$title = 'Inscription';
ob_start();

?>
        <form action="index.php?controller=profil&action=add" method="post" class="form-control mx-auto p-4 shadow w-25">
            <div class="fields">
                <div class="field">
                    <label for="nom" class="form-label">Nom</label><br>
                    <input type="text" name="nom" id="nom" class="form-control">
                </div><br>
                <div class="field">
                    <label for="prenom" class="form-label">Prénom</label><br>
                    <input type="text" name="prenom" id="prenom" class="form-control">
                </div><br>
                <div class="field">
                    <label for="mail" class="form-label">Mail</label><br>
                    <input type="email" name="mail" id="mail" class="form-control">
                </div><br>
                <div class="field">
                    <label for="mot_de_passe" class="form-label">Mot de passe</label><br>
                    <input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control">
                </div><br>
            </div>
            <div class="submit d-flex justify-content-evenly">
                <a href="index.php" class="btn btn-outline-dark">Précédent</a>
                <input type="submit" value="S'inscrire" class="btn btn-outline-dark">
            </div>
        </form>
<?php 
$content = ob_get_clean();
require ROOT . '/view/template_connect.php';
?>