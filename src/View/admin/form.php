<?php
[$lastname, $firstname] = explode(" ", $admin->getName() ?? " ");
?>
<form method="post">
    <div class="form-group">
        <div>
            <label for="email">Rôle:</label>
            <select name="role" value="<?= $admin->getRole() ?>">
                <option value="ROLE_ADMIN">Administrateur</option>
                <option value="ROLE_SUPER_ADMIN">Super administrateur</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div>
            <label for="lastname">Nom:</label>
            <input name="lastname" value="<?= $lastname ?>"/>
        </div>
        <div>
            <label for="firstname">Prénom:</label>
            <input name="firstname" value="<?= $firstname ?>"/>
        </div>
    </div>

    <div class="form-group">
        <div>
            <label for="email">Adresse email:</label>
            <input type="email" name="email" value="<?= $admin->getEmail() ?>"/>
        </div>
    </div>
    <div class="form-group">
        <div>
            <label for="phone">Numéro de téléphone:</label>
            <input name="phone" value="<?= $admin->getPhone() ?>"/>
        </div>
    </div>

    <div class="button-list">
        <button class="submit-btn">
            Enregistrer
        </button>
        <?php if ($admin->getId()) { ?>
            <a type="button" class="delete-button" href="/admin/user/<?= $admin->getId() ?>/delete">
                Supprimer
            </a>
        <?php } ?>
    </div>
</form>
