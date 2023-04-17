<?php 
$title = 'Modifier son profil';
ob_start();
?>
        <form action="index.php?controller=profil&action=update" method="post" class="form-control mx-auto p-4 shadow w-25 ">
            <div class="fields">
                <div class="field">
                    <label for="nom" class="form-label">Nom</label><br>
                    <input type="text" name="nom" id="nom" class="form-control" placeholder="<?= $_SESSION['profil']['nom'] ?>">
                </div><br>
                <div class="field">
                    <label for="prenom" class="form-label">Prénom</label><br>
                    <input type="text" name="prenom" id="prenom" class="form-control" placeholder="<?= $_SESSION['profil']['prenom'] ?>">
                </div><br>
                <div class="field">
                    <label for="mail" class="form-label">Mail</label><br>
                    <input type="mail" name="mail" id="mail" class="form-control" placeholder="<?= $_SESSION['profil']['mail'] ?>">
                </div><br>
                <div class="field">
                    <label for="mot_de_passe" class="form-label">Mot de passe</label><br>
                    <input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control">
                </div><br>
            </div>
            <div class="submit d-flex justify-content-evenly mb-2">
                <a href="index.php?controller=citations" class="btn btn-outline-dark">Précédent</a>
                <input type="submit" value="Modifier" class="btn btn-outline-dark">
            </div>
            <div class="delete w-100 d-flex justify-content-center">
                <a href="index.php?controller=profil&action=delete" class="btn btn-sm btn-outline-danger">Supprimer mon compte</a>
            </div>
        </form>
<?php 
$content = ob_get_clean();
require ROOT . '/view/template_connect.php';
?>