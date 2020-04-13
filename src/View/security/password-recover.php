<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> ALTHEC CORP </title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="css/password-recover.css">
</head>
<body>
<div class="password_forget">
    <div class="inner_width">
        <form method="post">
            <img class="logo" src="Images\logo.jpg" alt="Logo_page"/>
            <h1>Récupérer
                <br/>
                son mot de passe
            </h1>
            <input type="email" name="email" placeholder="email" class="email">

            <button>
                Récupérer
                <br/>
                mon mot de passe
            </button>
        </form>
        <?php if($status){?>
            <h6>Un email a été envoyé à cette adresse afin de récupérer votre email.</h6>
        <?php } ?>
    </div>
</div>
</body>
</html>
