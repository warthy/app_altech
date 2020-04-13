<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> ALTHEC CORP </title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' />
    <link rel="stylesheet" href="/css/password.css" />
</head>
    <body>
        <div class="password-form">
            <div class="inner-width">
                <form method="post">
                    <?php if($status){?>
                        <h6>Votre mot de passe vient d'être modifié.</h6>
                    <?php } ?>
                    <img class="logo" src="Images\logo.jpg" alt="Logo_page"/>
                    <h1>Enregistrer
                        <br/>
                        son mot de passe
                    </h1>
                    <input type="password" name="password" placeholder="Nouveau mot de passe">
                    <input type="password" name="password_confirm" placeholder="Confirmation nouveau mot de passe">
                    <button>
                        Enregistrer
                        <br/>
                        mon mot de passe
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>

