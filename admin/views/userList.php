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

<h2>ici la liste complète des Users : </h2>

<a href="index.php?controller=users&action=new">Ajouter une nouvel Utilisateur</a>
<table>
    <tr>
        <td>ID</td>
        <td>Nom</td>
        <td>Prénom</td>
        <td>Mail</td>
        <td>Privilége</td>
        <td>Action</td>
    </tr>
    <tbody>
    <?php foreach($users as $user): ?>
        <tr>
            <td>
                <?= $user['id'] ?>
            </td>
            <td>
                <?=  htmlspecialchars($user['last_name']) ?>
            </td>
            <td>
                <?= $user['first_name'] ?>
            </td>
            <td>
                <?= $user['mail'] ?>
            </td>
            <td>
                <?= $user['is_admin'] ?>
            </td>
            <td>
                <a href="index.php?controller=users&action=edit&id=<?= $user['id'] ?>">modifier</a>
                <a href="index.php?controller=users&action=delete&id=<?= $user['id'] ?>">supprimer</a></p>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>