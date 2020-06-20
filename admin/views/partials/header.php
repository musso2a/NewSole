<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="icon" href="../assets/vendors/favicon.ico" type="image/x-icon">
    <title>Document</title>
</head>
<body>
<div class="nav-container">
    <nav class="nav-bar">
        <a href="index.php" class="logo">
            <img src="../assets/img/logo_clair.png" alt="logo">
        </a>
        <div class="navigation">
            <a href="index.php?controller=shoes&action=list">Chaussures</a>
            <a href="index.php?controller=soles&action=list">Semelles</a>
            <a href="index.php?controller=customs&action=list">Customs</a>
            <a href="index.php?controller=orders&action=list">Commandes</a>
            <a href="index.php?controller=users&action=list">Users</a>
            <a href="index.php?controller=categories&action=list">Categories</a>
        </div>
        <div class="logout">
            <a href="index.php?page=Login&action=disconnect"><img src="../assets/img/logout.png" alt="user logo"></a>
        </div>
    </nav>
</div>
</body>
</html>