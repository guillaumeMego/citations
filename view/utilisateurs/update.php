<?php 
$title = 'Modifier son profil';
ob_start();
?>
        <form action="index.php?controller=utilisateurs&action=update&id_utilisateurs=<?= $_GET['id_utilisateurs'] ?>" method="post" class="form-control mx-auto p-4 shadow w-25 ">
            <div class="fields">
                <div class="field">
                    <label for="nom" class="form-label">Nom</label><br>
                    <input type="text" name="nom" id="nom" class="form-control" placeholder="<?= $utilisateur['nom'] ?>">
                </div><br>
                <div class="field">
                    <label for="prenom" class="form-label">Prénom</label><br>
                    <input type="text" name="prenom" id="prenom" class="form-control" placeholder="<?= $utilisateur['prenom'] ?>">
                </div><br>
                <div class="field">
                    <label for="mail" class="form-label">Mail</label><br>
                    <input type="mail" name="mail" id="mail" class="form-control" placeholder="<?= $utilisateur['mail'] ?>">
                </div><br>

                <div class="field">
                    <label for="mot_de_passe" class="form-label">Mot de passe</label><br>
                    <input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control">
                </div><br>
                <div class="field">
                    <label for="is_admin">Administrateur</label>
                    <select name="is_admin" id="is_admin" class="form-select">
                        <?php if ($utilisateur['is_admin'] == 1) : ?>
                            <option value="1" selected>Administrateur</option>
                            <option value="0">Utilisateur normal</option>
                        <?php else : ?>
                            <option value="1">Administrateur</option>
                            <option value="0" selected>Utilisateur normal</option>
                        <?php endif ?>
                    </select>     
                </div><br>
            </div>
            <div class="submit d-flex justify-content-evenly mb-2">
                <a href="index.php?controller=utilisateurs" class="btn btn-outline-dark">Précédent</a>
                <input type="submit" value="Modifier" class="btn btn-outline-dark">
            </div>
        </form>
<?php 
$content = ob_get_clean();
require ROOT . '/view/template_connect.php';
?>