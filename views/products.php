<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <title>Produits</title>
</head>
<?php require 'partials/header.html'; ?>
<body>
<div class="title-category">
    <h1 class="product-title">Nos Produits</h1>


    <label for="category_id" class="category-choice">Categories :</label>
    <select name="category_id" id="category_id" class="select-category">

        <?php foreach($categories as $category): ?>
            <option value="<?= $category['id']; ?>" selected="selected"><?= $category['name']; ?></option>
        <?php endforeach; ?>

    </select>
</div>
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
<?php require 'partials/footer.html'?>
</body>
</html>
