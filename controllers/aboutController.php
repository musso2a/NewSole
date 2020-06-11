<?php
if(!isset($_GET['']) || !ctype_digit($_GET[''])){
    header('Location:index.php');
    exit;
}

include 'views/about.php';