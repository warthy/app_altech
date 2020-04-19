<?php
    [$lastname, $firstname] = explode(" ", $admin->getName() ?? " ");
?>
<form method="post">
    <div class="form-group">
        <label for="email">Rôle:</label>
        <select name="role" value="<?= $admin->getRole() ?>">
            <option value="ROLE_ADMIN">Administrateur</option>
            <option value="ROLE_SUPER_ADMIN">Super administrateur</option>
        </select>
    </div>

    <div class="form-group">
        <label for="lastname">Nom:</label>
        <input name="lastname" value="<?= $lastname ?>"/>
        <label for="firstname">Prénom:</label>
        <input name="firstname" value="<?= $firstname ?>"/>
    </div>

    <div class="form-group">
        <label for="email">Adresse email:</label>
        <input type="email" name="email" value="<?= $admin->getEmail() ?>"/>
    </div>
    <div class="form-group">
        <label for="phone">Numéro de téléphone:</label>
        <input name="phone" value="<?= $admin->getPhone() ?>"/>
    </div>

    <div class="button-list">
        <button class="save-button">
            Enregistrer
        </button>
        <?php if($admin->getId()) { ?>
            <a type="button" class="delete-button" href="/admin/user/<?= $admin->getId() ?>/delete">
                Supprimer
            </a>
        <?php } ?>
    </div>
</form>
