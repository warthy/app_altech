<form method='post' enctype="multipart/form-data">
    <div class="form-group">
        <div>
            <label for="sexe">Sexe :</label>
            <select name="sex" id="sexe">
                <?php
                    if($candidate->getSex() === 1){ ?>
                        <option value="1" selected>Homme</option>
                        <option value="0">Femme</option>
                        <option value="-1">Non-divulgué</option>
                    <?php }elseif ($candidate->getSex() === 0){ ?>
                        <option value="1">Homme</option>
                        <option value="0" selected>Femme</option>
                        <option value="-1">Non-divulgué</option>
                    <?php }else { ?>
                        <option value="1">Homme</option>
                        <option value="0">Femme</option>
                        <option value="-1" selected>Non-divulgué</option>
                    <?php } ?>
                ?>

            </select>
        </div>
    </div>
    <div class="form-group">
        <div>
            <label for="nom">Nom :</label>
            <input type="text" name="lastname" id="nom" value="<?= $candidate->getLastname() ?>" required/>
        </div>
        <div>
            <label for="prenom">Prénom :</label>
            <input type="text" name="firstname" id="prenom" value="<?= $candidate->getFirstname() ?>" required/>
        </div>
    </div>
    <div class="form-group">
        <div>
            <label for="email">Adresse email :</label>
            <input id="email" type='email' name='email' value="<?= $candidate->getEmail() ?>"/>
        </div>
        <div>
            <label for="phone">Numéro de téléphone :</label>
            <input id="phone" type='text' name='phone' value="<?= $candidate->getPhone() ?>"/>
        </div>
    </div>
    <div class="form-group">
        <div>
            <label for="taille">Taille (cm) :</label>
            <input id="taille" type='text' name='height' value="<?= $candidate->getHeight() ?>"/>
        </div>
        <div>
            <label for="poids">Poids (kg) :</label>
            <input id="poids" type='text' name='weight' value="<?= $candidate->getWeight() ?>"/>
        </div>
    </div>
    <div class="form-group">
        <div>
            <label for="CGU">Consentement CGU</label> :
            <input type="file" name='cgu_approvement' id="CGU" accept=".pdf, .doc, .docx, .jpeg, .png"
                <?= !$candidate->getCguApprovement() ? "required" : "" ?> />
            <?php if ($candidate->getCguApprovement()) { ?>
                <a href="/upload/<?= $candidate->getCguApprovement() ?>" download>Télécharger le document</a>
            <?php } ?>
        </div>
    </div>


    <button class="submit-btn">
        Enregister le candidat
    </button>

</form>

</body>

</html>