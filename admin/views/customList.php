<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <title>Admin Board</title>
</head>
<?php require ('partials/header.php'); ?>
<body>

<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<h2>ici la liste complète des produits : </h2>

<a href="index.php?controller=customs&action=new">Ajouter un nouveau produit</a><br>
<table>
    <tr>
        <td>ID</td>
        <td>Nom</td>
        <td>Taille</td>
        <td>Prix</td>
        <td>Quantity</td>
        <td>Description</td>
        <td>Image</td>
        <td>Action</td>
    </tr>
<tbody>
<?php foreach($customs as $custom): ?>
    <tr>
        <td>
            <?= $custom['id'] ?>
        </td>
        <td>
        <?=  htmlspecialchars($custom['name']) ?>
        </td>
        <td>
            <?= $custom['size'] ?>
        </td>
        <td>
            <?= $custom['price'] ?>
        </td>
        <td>
            <?= $custom['quantity'] ?>
        </td>
        <td>
            <?= $custom['description'] ?>
        </td>
        <td>
            <?= $custom['image'] ?>
        </td>
        <td>
        <a href="index.php?controller=customs&action=edit&id=<?= $custom['id'] ?>">modifier</a>
        <a href="index.php?controller=customs&action=delete&id=<?= $custom['id'] ?>">supprimer</a></p>
        </td>
    </tr>
<?php endforeach; ?>
</table>
</div>
</body>
</html>


