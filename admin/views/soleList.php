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

<h2>ici la liste complète des Semelles : </h2>

<a href="index.php?controller=soles&action=new">Ajouter une nouvelle Semelle</a>

<?php foreach($soles as $sole): ?>
    <p><?=  htmlspecialchars($sole['name']) ?>
        <a href="index.php?controller=soles&action=edit&id=<?= $sole['id'] ?>">modifier</a>
        <a href="index.php?controller=soles&action=delete&id=<?= $sole['id'] ?>">supprimer</a></p>
<?php endforeach; ?>
</body>
</html>