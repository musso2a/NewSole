<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <title>Login</title>
</head>
<?php require 'partials/header.html'; ?>
<body>

<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach;?>
    </div>
<?php endif;?>

<div class="form-container">
    <div class="connect">
        <h2>CONNEXION</h2>
        <form action="index.php?page=Login&action=connect" method="post">

            <label for="mail"></label>
            <input id="email" type="mail" name="mail" required placeholder="Email" value=""><br>

            <label for="password"></label>
            <input id="password" type="password" name="password" required placeholder="Mot de passe"><br>

            <button type="submit" class="about-button">Connexion</button>

        </form>
    </div>

    <div class="inscription">

        <h2>INSCRIPTION</h2>
        <p>Prêt a rentrer dans la famille ?</p>
        <a href="index.php?page=register&action=new" class="about-button">S'inscrire</a>

    </div>
</div>

<?php require 'partials/footer.html'?>
</body>
</html>
