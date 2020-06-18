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

<h2>ici la liste complète des Chaussures : </h2>

<a href="index.php?controller=shoes&action=new">Ajouter une nouvelle Chaussure</a>

<?php foreach($shoes as $shoe): ?>
    <p><?=  htmlspecialchars($shoe['name']) ?>
        <a href="index.php?controller=shoes&action=edit&id=<?= $shoe['id'] ?>">modifier</a>
        <a href="index.php?controller=shoes&action=delete&id=<?= $shoe['id'] ?>">supprimer</a></p>
<?php endforeach; ?>
</body>
</html>