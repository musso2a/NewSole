<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <title>Customisation</title>
</head>
<?php require 'partials/header.html'; ?>
<body>

<div class="title-category">
    <h1 class="product-title">Choisi ta paire</h1>
</div>
<section class="product-line">
    <?php foreach($shoes as $shoe):?>
        <div class="product-container">
            <div class="product-img">
                <img src="assets/img/shoe.jpg" alt="" class="shoes-img">
            </div>
            <br>
            <div class="product-info">
                <h4 class="product-name"><?= $shoe['name'] ?></h4>
                <p class="size"><?= $shoe['size'] ?></p><p class="price"><?= $shoe['price'] ?></p>

            </div>
            <a href="#" class="add-button">+</a>

        </div>
    <?php endforeach;?>
</section>

<div class="title-category">
    <h1 class="product-title">Choisi ta Semelle</h1>
</div>

    <section class="product-line">
        <?php foreach($soles as $sole):?>
            <div class="product-container">
                <div class="product-img">
                    <img src="assets/img/shoe.jpg" alt="" class="shoes-img">
                </div>
                <br>
                <div class="product-info">
                    <h4 class="product-name"><?= $sole['name'] ?></h4>
                    <p class="size"><?= $sole['size'] ?></p><p class="price"><?= $sole['price'] ?></p>

                </div>
                <a href="#" class="add-button">+</a>

            </div>
        <?php endforeach;?>
    </section>

<div class="title-category">
    <h1 class="product-title">Ta custom</h1>
</div>

<?php require 'partials/footer.html'?>
</body>
</html>
