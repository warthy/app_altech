<div class="boite">
    <form method="post" enctype="multipart/form-data">
        <h1>Informations générales</h1>
        <div class="form-group">
            <div>
                <label for="nom entreprise">Nom de l'entreprise :</label>
                <input type="text" name="name" id="nom entreprise" required/>
            </div>
        </div>
        <div class="form-group">
            <div>
                <label for="adresse postale">Adresse postale :</label>
                <input type="text" name="addresse" id="adresse postale" required/>
            </div>
        </div>
        <div class="form-group">
            <div>
                <label for="ville">Ville: </label>
                <input type="text" name="city" id="ville" required/>
            </div>

            <div>
                <label for="code postal">Code postal :</label>
                <input type="text" name="zipcode" id="code postal" required/>
            </div>
        </div>
        <hr />
        <h1>Contacts de l'entreprise </h1>
        <div class="form-group">
            <div>
                <label for="mail email">Email</label> :
                <input type="email" name="email" id="mail entreprise" required/>
            </div>
            <div>
                <label for="telephone entreprise">Téléphone :</label>
                <input type="tel" name="phone" id="telephone entreprise" required/>
            </div>
        </div>

        <h1>Représentant légal</h1>

        <div class="form-group">
            <div>
                <label for="nom representant">Nom :</label>
                <input type="text" name="nom_representant" id="nom representant" required/>
            </div>
            <div>
                <label for="prenom representant">Prénom :</label>
                <input type="text" name="prenom_representant" id="prenom representant" required/>
            </div>
        </div>
        <div class="form-group">
            <div>
                <label for="mail representant">Email :</label>
                <input type="mail" name="mail_representant" id="mail representant" required/>
            </div>
            <div>
                <label for="telephone representant">Téléphone :</label>
                <input type="tel" name="telephone_representant" id="telephone representant" required/>
            </div>
        </div>


        <div class="form-group">
            <div>
                <label for="CGU">Consentement CGU</label> :
                <input type="file" name='cgu_approvement' id="CGU" accept=".pdf, .doc, .docx, .jpeg, .png" required/>
            </div>
        </div>

        <button class="submit-btn">Enregistrer</button>
    </form>

</div>


</body>
</html>