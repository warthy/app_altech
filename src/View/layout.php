<?php use App\KernelFoundation\Security; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Infinite Measures | Dashboard </title>
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="/css/datatable.css" />
    <link rel="stylesheet" type="text/css" href="/css/form.css" />

    <link rel="stylesheet" type="text/css" href="/css/faq.css" />
    <link rel="stylesheet" type="text/css" href="/css/dashpanel.css" />
    <link rel="stylesheet" type="text/css" href="/css/profile.css" />
    <link rel="stylesheet" type="text/css" href="/css/ticket.css" />
    <link rel="stylesheet" type="text/css" href="/css/candidate.css" />
    <link rel="stylesheet" type="text/css" href="/css/new-client.css"/>
    <link rel="stylesheet" type="text/css" href="/css/measures.css"/>
    <link rel="icon" type="image/png" href="/img/roundlogo.png" />
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f170de025b.js" crossorigin="anonymous"></script>
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
            <div class="dropdown">
                <a class="dropbtn user-name">
                    <img class="user-img" src="<?= $user->getPicture() ?>"/>
                    <?= $user->getName() ?>
                </a>
                <div class="dropdown-content">
                    <a href="#" class="user-role"><?= $user->getReadableRole() ?></a>
                    <a href="/profile"><i class="fas fa-sliders-h"></i> Paramètres</a>
                    <a href="/logout"><i class="fas fa-sign-out-alt"></i> Se déconnecter </a>
                </div>
            </div>
        </div>
    </header>
    <div class="wrapper">
        <div id="sidebar">
            <?php if(Security::hasPermission("ROLE_ADMIN")) { ?>
            <a href="/">
                <i class="material-icons">home</i> Home
            </a>
            <?php }else{ ?>
                <a href="/">
                    <i class="material-icons">home</i> Home
                </a>
            <?php } ?>
            <?php
            if(Security::hasPermission("ROLE_CLIENT")) { ?>
                <a href="/newmeasure">
                    <i class="material-icons">settings_remote</i> Effectuer une mesure
                </a>
                <a href="/measures">
                    <i class="material-icons">backup</i> Consulter les mesures
                </a>
                <a href="/ticket">
                    <i class="material-icons">error_outline</i> Gérer ses ticket
                </a>
                <a href="/faq">
                    <i class="material-icons">question_answer</i> Consulter la FAQ
                </a>
                <a href="/candidate">
                    <i class="material-icons">group</i> Consulter les candidats
                </a>
            <?php }?>
            <?php if(Security::hasPermission("ROLE_ADMIN")) { ?>
                <a href="/ticket">
                    <i class="material-icons">error_outline</i> Gérer les tickets
                </a>
                <a href="/faq">
                    <i class="material-icons">question_answer</i> Consulter la FAQ
                </a>
                <a href="/client">
                    <i class="material-icons">group</i> Consulter les clients
                </a>
            <?php }?>
            <?php if(Security::hasPermission("ROLE_SUPER_ADMIN")) {?>
                <a href="/admin/user">
                    <i class="material-icons">group</i> Gérer les administrateurs
                </a>
            <?php }?>
            <a class="cgu-link" href="/cgu.pdf" download>
                CGU 2020
            </a>
        </div>
        <div class="content">
            <h1 class="content-title"><?= $title ?? "" ?></h1>
            <?= $body  ?>
        </div>
    </div>

    <script src="/js/main.js"></script>
    <script src="/js/measure.js"></script>
</body>
</html>
