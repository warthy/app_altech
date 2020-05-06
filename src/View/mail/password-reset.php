<!DOCTYPE html>
<html>
<head>
    <title>Réinitialisation mot de passe</title>
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
<h1 class="primary-color">Bonjour, </h1>
<p>
    Vous avez fait une demande de réinitialiser votre mot de passe.
    Afin de terminer la procédure veuillez cliquez sur le lien ci-dessous pour choisir un nouveau mot de passe
</p>
<a href="<?= $host ?>/password-reset/<?= $token ?>">cliquez ici</a>

<p class="warning">si vous n'avez jamais fait la demande d'une telle procédure, veuillez simplement ignorer cet email.</p>
<h2 class="primary-color">Cordialement,</h2>
<p class="primary-color">l'équipe InfiniteMeasures</p>
</body>
</html>
