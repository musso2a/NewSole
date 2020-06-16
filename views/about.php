<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <title>À propos</title>
</head>
<?php require 'partials/header.html'; ?>
<body>
<div class="banner-container">
    <div class="inner-container">
        <h1 class="">NewSole</h1>
        <p class="banner-description"></p>
        <a href="index.php?page=Produits" class="about-button">Nos Produits</a>

    </div>
</div>
<div class="about-line">
    <div class="about-img">
        <img src="assets/img/shoe.jpg" alt="photo chaussure" class="custom-img">
    </div>
    <div class="custom-about">
    <h2 class="about-title">Customisation</h2>

        <p class="">Tu as toujours rêvé d’avoir une paire unique ? De pouvoir choisir la couleur , les lacets ou même la semelle ?
            Et bien NewSole propose ses services pour que tu puisse avoir la paire de tes rêves !Il ne te reste plus qu’a customiser ta paire !
        </p>
            <a href="index.php?page=Customisation" class="about-button">CUSTOMISATION</a>
    </div>
</div>
<div class="about-line">
    <div class="custom-about">
        <h2 class="about-title">Réparation</h2>
        <p class="">Ta paire préferée est en fin de vie ? Ton coté ecologique te limite dans tes achats ?
            NewSole te permet de réparer tes chaussures adorés et de leurs donnés un second souffle ! Avec l’ajout d’une nouvelle semelle Vibram ta chaussure sera réparée et elle aura un style unique en plus.
        </p>
        <a href="index.php?page=Reparation" class="about-button">RePARATION</a>
    </div>
    <div class="about-img">
        <img src="assets/img/shoe.jpg" alt="photo chaussure" class="custom-img">
    </div>
</div>
<?php require 'partials/footer.html'?>
</body>
</html>
