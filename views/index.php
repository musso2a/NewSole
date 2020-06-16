<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <title>Acceuil</title>
</head>
<?php require 'partials/header.html'; ?>
<body>
<div class="banner-container">
    <div class="inner-container">
        <h1 class="">NewSole</h1>
        <p class="banner-description"></p>
        <a href="index.php?page=Customisation" class="about-button">Customiser</a>
        <a href="index.php?page=Reparation" class="about-button">Réparer</a>
    </div>

</div>
<h2 class="page-title">Notre Sélection</h2>
<div class="product-line">
    <div class="product-container">
        <div class="product-img">
            <img src="assets/img/shoe.jpg" alt="" class="shoes-img">
        </div>
        <br>
        <h4 class="product-name">ADADAS 3500</h4>
        <div class="price-size">
        <p class="size">42</p>
        <p class="price">350€</p>
        </div>
        <a href="#" class="add-button">+</a>

    </div>
</div>
<?php ?>

</body>
<?php require 'partials/footer.html'?>
</html>
