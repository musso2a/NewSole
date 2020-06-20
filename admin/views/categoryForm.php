<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
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

ici formulaire des Categories<br><br>

<form action="index.php?controller=categories&action=<?= isset($category) || (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

    <label for="name">Nom :</label>
    <input  type="text" name="name" id="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($category) ? $category['name'] : '' ?>" /><br>

    <label for="description">Bio :</label>
    <textarea name="description" id="description"><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['description'] : '' ?><?= isset($category) ? $category['description'] : '' ?></textarea><br>

    <label for="image">Image :</label><br>
    <input  type="file" name="image" id="image"/><br>

    <input type="submit" value="Enregistrer" />

</form>

</body>

</html>

