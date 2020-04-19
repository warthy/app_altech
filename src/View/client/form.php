<div class="boite">
    <form method="post" enctype="multipart/form-data">
        <h1>Informations générales</h1>
        <div class="form-group">
            <div>
                <label for="nom entreprise">Nom de l'entreprise :</label>
                <input type="text" name="name" id="nom entreprise" value="<?= $client->getName() ?>" required/>
            </div>
        </div>
        <div class="form-group">
            <div>
                <label for="adresse postale">Adresse postale :</label>
                <input type="text" name="addresse" id="adresse postale" value="<?= $client->getAddress() ?>" required/>
            </div>
        </div>
        <div class="form-group">
            <div>
                <label for="ville">Ville: </label>
                <input type="text" name="city" id="ville" value="<?= $client->getCity() ?>" required/>
            </div>

            <div>
                <label for="code postal">Code postal :</label>
                <input type="text" name="zipcode" id="code postal" value="<?= $client->getZipcode() ?>" required/>
            </div>
        </div>
        <hr />
        <h1>Contacts de l'entreprise </h1>
        <div class="form-group">
            <div>
                <label for="mail email">Email</label> :
                <input type="email" name="email" id="mail entreprise" value="<?= $client->getEmail() ?>" required/>
            </div>
            <div>
                <label for="telephone entreprise">Téléphone :</label>
                <input type="tel" name="phone" id="telephone entreprise" value="<?= $client->getPhone() ?>" required/>
            </div>
        </div>

        <h1>Représentant légal</h1>

        <div class="form-group">
            <div>
                <label for="nom representant">Nom :</label>
                <input type="text" name="nom_representant" id="nom representant" value="<?= $client->getRepresentativeFirstName() ?>" required/>
            </div>
            <div>
                <label for="prenom representant">Prénom :</label>
                <input type="text" name="prenom_representant" id="prenom representant" value="<?= $client->getRepresentativeLastName() ?>" required/>
            </div>
        </div>
        <div class="form-group">
            <div>
                <label for="mail representant">Email :</label>
                <input type="mail" name="mail_representant" id="mail representant" value="<?= $client->getRepresentativeEmail() ?>" required/>
            </div>
            <div>
                <label for="telephone representant">Téléphone :</label>
                <input type="tel" name="telephone_representant" id="telephone representant" value="<?= $client->getRepresentativePhone() ?>" required/>
            </div>
        </div>


        <div class="form-group">
            <div>
                <label for="CGU">Consentement CGU</label> :
                <input type="file" name='cgu_approvement' id="CGU" accept=".pdf, .doc, .docx, .jpeg, .png" required/>
            </div>
        </div>

        <div class="button-list">
            <button class="submit-btn">
                Enregistrer
            </button>
            <?php if ($client->getId()) { ?>
                <a type="button" class="delete-button" href="/admin/client/<?= $client->getId() ?>/delete">
                    Supprimer
                </a>
            <?php } ?>
        </div>
    </form>

</div>


</body>
</html>