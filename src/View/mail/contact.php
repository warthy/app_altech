<!DOCTYPE html>
<html>
<head>
    <title>Demande de contatc</title>
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
<h3><span class="primary-color"> Nouvelle demande de contact :</span> <?= $name ?> </h3>
<p><?= $email ?></p>
<p> message: </p>
<blockquote>
    "<?= $message ?>"
</blockquote>
</body>
</html>

