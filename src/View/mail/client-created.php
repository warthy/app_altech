<!DOCTYPE html>
<html>
<head>
    <title>Création de votre compte</title>
    <style>
        body {
            font-family: Helvetica, sans-serif;
            margin: 10px auto;
            padding: 30px;
            max-width: 1000px;
        }

        .img-box {
            text-align: center;
        }
        .primary-color {
            color: #E5B03C;
        }
        .warning {
            font-size: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="img-box">
    <img src="<?= $host ?>/img/logo.png" height="150" alt="logo"/>
</div>
<h1 class="primary-color">Félicitations <?= $name ?>, </h1>
<p>
    Nous sommes ravis de vous accueillir parmi nous.
</p>
<p>
    Suite à la signature du contrat, votre compte vient d'être créer sur la plateforme Infinite Measures de mesures psychotechniques !
    Avant de pouvoir accéder à la plateforme et de pouvoir profiter pleinement de toutes ses fonctionnalités, il vous reste une dernière étape.
    Afin d'assure une sécurité maximum envers votre compte, vous devez choisir le mot de passe qui vous permettra de vous connecter à la plateforme.
</p>
<a href="<?= $host ?>/password-reset/<?= $token ?>">cliquez ici pour définir votre mot de passe</a>


<p class="warning">si vous n'avez jamais fait la demande d'une telle procédure, veuillez simplement ignorer cet email.</p>
<h2 class="primary-color">Cordialement,</h2>
<p class="primary-color ">l'équipe InfiniteMeasures</p>
</body>
</html>

