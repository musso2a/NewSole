<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <title>Réparation</title>
</head>
<?php require 'partials/header.html'; ?>
<body>
<div class="form-line">
    <div class="repair-carrousel">
        <img src="" alt="" class="">
    </div>
    <form class="repair-form">
        <h1>Réparation</h1>
        <p class="">Remplissez le formulaire et nous vous enverrons un devis.</p>
        <br>
        <label for="image">Image :</label><br>
        <input  type="file" name="image" id="image"/><br>

        <label for="sole_id" class="sole-choice">Semmelle choisie :</label>
        <select name="sole_id" id="sole_id" class="select-sole">

            <?php foreach($soles as $sole): ?>
                <option value="<?= $sole['id']; ?>" selected="selected"><?= $sole['name']; ?></option>
            <?php endforeach; ?>

        </select><br>
        <label for="email">Email :</label><br>
        <input id="email" type="email" name="email" required placeholder="Email" value=""><br>

        <button type="submit" class="repair-form-button">Envoyer</button>

    </form>

        <h1 class="product-title">Nos Semelles</h1>

    <div class="product-line">
        <div class="product-container">
            <div class="product-img">
                <img src="assets/img/semelle-4.jpg" alt="" class="shoes-img">
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

</div>
<?php require 'partials/footer.html'?>
</body>
</html>
