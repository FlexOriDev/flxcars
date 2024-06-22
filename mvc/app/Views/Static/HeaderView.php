<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flx Cars</title>
    <!-- STYLE GLOBAL -->
    <link rel="stylesheet" href="/flxcars/mvc/public/css/global.css">
    <!-- STYLE HEADER -->
    <link rel="stylesheet" href="/flxcars/mvc/public/css/header.css">
    <!-- icons footer socials -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header class="header">
    <div class="header-top-top" id="haut-haut"></div>
    <div class="header-top"></div>
    <div class="header-mid"></div>
    <div class="header-content">
        <nav class="nav_header">
            <ul>
                <li class="deroulant"><a href="/flxcars/mvc/public/">Accueil</a>
                    <ul class="sous">
                    </ul>
                </li>
                <li class="deroulant"><a href="/flxcars/mvc/public/voiture">Voitures</a>
                    <ul class="sous">
                        <?php
                        foreach ($constructeurs as $constructeur):?>

                            <li><a><?= $constructeur->getNom() ?></a></li>

                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="deroulant"><a href="/flxcars/mvc/public/profil">Mon profil &ensp;</a>
                    <ul class="sous">
                        <li><a href="flxcars/mvc/public/dashboard">Dashboard</a></li>
                        <li><a href="flxcars/mvc/public/ajoutFiche">Ajouter un fiche</a></li>
                        <li><a href="flxcars/mvc/public/deconnexion">Deconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="header-bot">

        </div>

</header>

<main>
