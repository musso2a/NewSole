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

ici formulaire d'un Utilisateur<br><br>

- nom <br>
- Prénom <br><br>
- email <br>
- mot de passe<br>
- adresse<br>
- privilége<br>


<form action="index.php?controller=users&action=<?= isset($user) || (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

    <label for="last_name">Nom :</label>
    <input  type="text" name="last_name" id="last_name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['last_name'] : '' ?><?= isset($user) ? $user['last_name'] : '' ?>" /><br>

    <label for="first_name">Prénom :</label>
    <input  type="text" name="first_name" id="first_name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['first_name'] : '' ?><?= isset($user) ? $user['first_name'] : '' ?>" /><br>

    <label for="mail">Email :</label>
    <input  type="text" name="mail" id="mail" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['mail'] : '' ?><?= isset($user) ? $user['mail'] : '' ?>" /><br>

    <label for="password">Mot de passe :</label>
    <input  type="text" name="password" id="password" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['password'] : '' ?><?= isset($user) ? $user['password'] : '' ?>" /><br>

    <label for="adress">Adresse :</label>
    <input  type="text" name="adress" id="adress" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['adress'] : '' ?><?= isset($user) ? $user['adress'] : '' ?>" /><br>

    <label for="is_admin">Privilége :</label>
    <input  type="text" name="is_admin" id="is_admin" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['is_admin'] : '' ?><?= isset($user) ? $user['is_admin'] : '' ?>" /><br>

    <input type="submit" value="Enregistrer" />

</form>

</body>

</html>