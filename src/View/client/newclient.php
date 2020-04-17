<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/newclient.css" />
        
    </head>

    <body>
        <div class="titre">
            <h1>Création d'un nouveau client :</h1>
        </div>

        <div class="boite">
            <div class="champs">
                <h3>Informations générales</h3>

                <form method="post" action="newclientprocess.php" enctype="multipart/form-data">
                    
                    <fieldset>
                        <p>
                            <label for="nom entreprise">Nom de l'entreprise</label> :      <input type="text" name="nom_entreprise" id="nom entreprise" required />
                        </p>
                        <p>
                            <label for="adresse postale">Adresse postale</label> :      <input type="text" name="adresse_postale" id="adresse postale" required />
                        </p>
                        <p>
                            <label for="ville">Ville</label> :      <input type="text" name="ville" id="ville" required />
                        </p>
                        <p>
                            <label for="code postal">Code postal</label> :      <input type="text" name="code_postal" id="code postal" required />
                        </p>
                    </fieldset>

                    <h3>Contacts de l'entreprise </h3>
                    <fieldset>
                        <p>
                            <label for="mail entreprise">Email</label> :      <input type="email" name="mail_entreprise" id="mail entreprise" required />
                        </p>
                        <p>
                            <label for="telephone entreprise">Téléphone</label> :      <input type="tel" name="telephone_entreprise" id="telephone entreprise" required />
                        </p>
                        
                    </fieldset>

                    <h3>Représentant légal</h3>

                    <fieldset>
                        <p>
                            <label for="nom representant">Nom</label> :      <input type="text" name="nom_representant" id="nom representant" required />
                        </p>
                        <p>
                            <label for="prenom representant">Prénom</label> :      <input type="text" name="prenom_representant" id="prenom representant" required />
                        </p>
                        <p>
                            <label for="mail representant">Email</label> :      <input type="mail" name="mail_representant" id="mail representant" required />
                        </p>
                        <p>
                            <label for="telephone representant">Téléphone</label> :      <input type="tel" name="telephone_representant" id="telephone representant" required />
                        </p>
                        <br/>
                    </fieldset>

                    <fieldset>
                        <p>
                            <label for="CGU">Consentement CGU</label> :      <input type="file" name='CGU' id="CGU" accept=".pdf, .doc, .docx, .jpeg, .png" required />
                        </p>

                    </fieldset>

                    <div class="bouton">
                        <button>Enregistrer</button>
                    </div>

                </form>
            
            </div>          

        </div> 
    </body>
</html>