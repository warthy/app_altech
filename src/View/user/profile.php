<?php

use App\KernelFoundation\Security;

?>
<div class="index-wrapper">
    <div class="card general-form">
        <h1>Modifier son profil</h1>
        <form method="post" action="/profile/edit" enctype="multipart/form-data">
            <div class="image-picker">
                <img id="user-picture" src="<?= $user->getPicture() ?>" />
                <div class="form-group">
                    <div>
                        <input type="file" name="picture" id="picture-upload" accept="image/*" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="mail email">Email</label> :
                    <input type="email" name="email" id="mail entreprise" value="<?= $user->getEmail() ?>" required/>
                </div>
                <div>
                    <label for="telephone entreprise">Téléphone :</label>
                    <input type="tel" name="phone" id="telephone entreprise" value="<?= $user->getPhone() ?>" required/>
                </div>
            </div>
            <?php if (Security::hasPermission(Security::ROLE_ADMIN)) {
                [$lastname, $firstname] = explode(" ", $user->getName() ?? " ");
                ?>
                <h1>Informations personnelles</h1>
                <div class="form-group">
                    <div>
                        <label for="firstname">Prénom</label> :
                        <input name="firstname" id=firstname" value="<?= $firstname ?>" required/>
                    </div>
                    <div>
                        <label for="lastname">Téléphone :</label>
                        <input name="lastname" id="lastname" value="<?= $lastname ?>" required/>
                    </div>
                </div>
            <?php } else { ?>
                <h1>Représentant légal</h1>

                <div class="form-group">
                    <div>
                        <label for="nom representant">Nom :</label>
                        <input type="text" name="r_lastname" id="nom representant"
                               value="<?= $user->getRepresentativeFirstName() ?>" required/>
                    </div>
                    <div>
                        <label for="prenom representant">Prénom :</label>
                        <input type="text" name="r_firstname" id="prenom representant"
                               value="<?= $user->getRepresentativeLastName() ?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="mail representant">Email :</label>
                        <input type="mail" name="r_email" id="mail representant"
                               value="<?= $user->getRepresentativeEmail() ?>" required/>
                    </div>
                    <div>
                        <label for="telephone representant">Téléphone :</label>
                        <input type="tel" name="r_phone" id="telephone representant"
                               value="<?= $user->getRepresentativePhone() ?>" required/>
                    </div>
                </div>
            <?php } ?>

            <button class="submit-btn">
                Enregistrer
            </button>
        </form>
    </div>
    <div class="card password-form">
        <h1>Modifier mot de passe</h1>
        <form method="post" action="/profile/password">
            <div class="form-group">
                <div>
                    <label for="subject">Mot de passe actuel</label>
                    <input id="subject" name="password" placeholder="Mot de passe actuel"/>
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="newpass">Nouveau mot de passe</label>
                    <input id="newpass" name="newpass" placeholder="Nouveau mot de passe..."/>
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="newpass_confirm">Réentrer votre nouveau mot de passe</label>
                    <input id="newpass_confirm" name="newpass_confirm" placeholder="Confirmer mot de passe..."/>
                </div>
            </div>

            <button class="submit-btn">
                Modifier
            </button>
        </form>
    </div>
</div>

<script>
    const input = document.getElementById('picture-upload');
    input.addEventListener('change', (event) => {
        const output = document.getElementById('user-picture');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    })
</script>