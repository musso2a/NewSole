<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/vendors/favicon.ico" type="image/x-icon">
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
    <section class="product-line">

        <?php
        $selectedProducts = [];
        ?>
        <?php for($n=0;$n<3;$n++): ?>
            <?php
            do{
                $nb = rand(0, sizeof($products) - 1 );
            } while(in_array($nb , $selectedProducts));
            $product = $products[$nb];
            $selectedProducts[] = $nb;
            ?>
            <div class="product-container">
                <div class="product-img">
                <img src="images/products/<?= $product['image']; ?>" class="" alt="<?= $product['name']; ?>">
                </div>
                <h3><?= $product['name']; ?></h3>
                <div class="mb-3">Catégorie :
                    <?php foreach($categories as $category): ?>
                        <?php if($category['id'] == $product['category_id']): ?>
                            <?= $category['name']; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div><?= $product['size']; ?></div>
                <h4><?= $product['price']; ?> €</h4>
                <a href="index.php?page=product&product_id=<?= $product['id']; ?>">Voir le produit</a>
                <a href="#" class="add-button">+</a>
            </div>
        <?php endfor; ?>
    </section>
</body>
<?php require 'partials/footer.html'?>
</html>
