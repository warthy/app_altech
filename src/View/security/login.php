<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> ALTHEC CORP </title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'/>
    <link rel="stylesheet" href="/css/password.css"/>
</head>
<body>
<div class="password-form">
    <div class="inner-width">
        <form method="post">
            <?php if ($error) { ?>
                <h6 class="error">Email ou mot de passe invalide</h6>
            <?php } ?>
            <img class="logo" src="/img/logo.jpg" alt="Logo_page"/>
            <h1>
                Se connecter
            </h1>
            <input type="email" name="email" placeholder="Adresse email">
            <input type="password" name="password" placeholder="Mot de passe">
            <button>Se Connecter</button>
        </form>
    </div>
</div>
</body>
</html>

