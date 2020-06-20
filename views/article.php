<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?= $selectedProduct['name']; ?></title>
</head>
<?php require 'partials/header.html'; ?>
<body>
<div class="">
    <div class="">
        <main class="">
            <h1><?= $selectedProduct['name']; ?></h1>
            <div class="">Catégorie :
                <?php foreach($categories as $category): ?>
                    <?php if($category['id'] == $selectedProduct['category_id']): ?>
                        <?= $category['name']; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div><?= $selectedProduct['description']; ?></div>
            <h3><?= $selectedProduct['price']; ?> €</h3>
            <div class="row mt-4">
                <?php foreach($selectedProduct['image'] as $image): ?>
                    <div class="col-lg-4">
                        <img class="img-fluid mb-4" src="images/products/<?= $image; ?>" alt="<?= $product['name']; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
</div>
</body>
</html>