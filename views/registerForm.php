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
    <title>Formulaire d'inscription</title>
</head>
<body>

<?php require ('partials/header.html'); ?>

<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach;?>
    </div>
<?php endif;?>

<h1>ici formulaire des d'inscription</h1><br><br>

<form action="index.php?page=register&action=<?= isset($user) ||  (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

    <label for="last_name">Nom :</label>
    <input  type="text" name="last_name" id="last_name" value="" /><br>

    <label for="first_name">Prénom :</label>
    <input  type="text" name="first_name" id="first_name" value="" /><br>

    <label for="adress">Adresse :</label>
    <input  type="text" name="adress" id="adress" value="" /><br>

    <label for="city">Ville :</label>
    <input  type="text" name="city" id="city" value="" /><br>

    <label for="mail">Email :</label>
    <input  type="text" name="mail" id="mail" value="" /><br>

    <label for="password">Mot de passe :</label>
    <input  type="text" name="password" id="password" value="" /><br>

    <input type="submit" value="S'incrire" />

</form>

</body>
<?php require ('partials/footer.html'); ?>

</html>