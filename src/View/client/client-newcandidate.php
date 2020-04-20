<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/client-newcandidate.css" />
    <title>Altech-new</title>
</head>

<body>
<h3>Création d'un nouveau candidat</h3>



<form action ='' method ='post'>

<table class='data-table'>

    <tr>
        <td>Numéro d'identification :</td>
        <td><input type='text' name='id'/></td>
    </tr>
    <tr>
        <td>Nom : </td>
        <td><input type='text' name='nom'/></td>
    </tr>
    <tr>
        <td>Prénom : </td>
        <td><input type='text' name='prenom'/></td>
    </tr>
    <tr>
        <td>Date de naissance :  </td>
        <td><input type='text' name='date_naissance'/></td>
    </tr>
    <tr>
        <td>Sexe : </td>
        <td><input type='radio' name='sexe_homme'/> Homme <input type='radio' name='sexe_femme' value='Femme'/> Femme</td>
    </tr>
    <tr>
        <td>Poids (Kg) : </td>
        <td><input type='text' name='poids'/></td>
    </tr>
    <tr>
        <td>Taille (cm) : </td>
        <td><input type='text' name='taille'/></td>
    </tr>
    <tr>
        <td>Adresse mail : </td>
        <td><input type='email' name='mail'/></td>
    </tr>
    <tr>
        <td>Consentement CGU : </td>
        <td><input type='file' name='cgu'/></td>
    </tr>
</table>


    <a class="enregistrer" href="/candidate/new">
        Enregister le candidat </a>



</form>

</body>

</html>