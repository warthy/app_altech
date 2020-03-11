<!DOCTYPE html>
<html>
<head>
    <title>Infinite Measures | Dashboard </title>
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-left">
            <input class="burger" type="checkbox"
                   onClick="document.getElementById('sidebar').classList.toggle('hidden')"
            />
            <img src="/img/logo.png" height="50"/>
        </div>
        <div class="header-right">
            <span class="user-name"> Auto école de Castres </span>
            <div class="user-img">
                v <img src=""/>
            </div>
        </div>
    </header>
    <div class="wrapper">
        <div id="sidebar" class="hidden">
            <a href="#">
                <i class="material-icons">home</i> Home
            </a>
            <a href="#">
                <i class="material-icons">settings_remote</i> Effectuer une mesure
            </a>
            <a href="#">
                <i class="material-icons">backup</i> Consulter les mesures
            </a>
            <a href="#">
                <i class="material-icons">error_outline</i> Ouvrir un ticket
            </a>
            <a href="#">
                <i class="material-icons">question_answer</i> Consulter la FAQ
            </a>
            <a href="#">
                <i class="material-icons">group</i> Consulter les candidats
            </a>

        </div>
        <div class="content">
            <?= $body ?>
        </div>
    </div>
    </body>
</html>
