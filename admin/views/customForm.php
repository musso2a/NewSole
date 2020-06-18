<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <title></title>
</head>
<body>

<?php require ('partials/header.php'); ?>

<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach;?>
    </div>
<?php endif;?>

ici formulaire des customs<br><br>

- nom (champ text)<br>
- size <br><br>
- price <br>
- category <br>
- img


<form action="index.php?controller=customs&action=<?= isset($custom) ||  (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

    <label for="name">Nom :</label>
    <input  type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($custom) ? $custom['name'] : '' ?>" /><br>

    <label for="size">Taille :</label>
    <input  type="text" name="size" id="size" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['size'] : '' ?><?= isset($custom) ? $custom['size'] : '' ?>" /><br>

    <label for="price">Prix :</label>
    <input  type="text" name="price" id="price" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['price'] : '' ?><?= isset($custom) ? $custom['price'] : '' ?>" /><br>

    <label for="quantity">Quantité :</label>
    <input  type="text" name="quantity" id="quantity" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['quantity'] : '' ?><?= isset($custom) ? $custom['quantity'] : '' ?>" /><br>

    <label for="artist_id">Categorie :</label>
    <select name="category_id" id="category_id">

        <?php foreach($categories as $category): ?>
            <option value="<?= $category['id']; ?>" <?php if(isset($custom) && $custom['category_id'] == $category['id']): ?>selected="selected"<?php endif; ?>><?= $category['name']; ?></option>
        <?php endforeach; ?>

    </select><br>

    <label for="image">Image :</label><br>
    <input  type="file" name="image" id="image"/><br>

    <input type="submit" value="Enregistrer" />

</form>

</body>

</html>