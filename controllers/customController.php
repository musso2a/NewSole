<?php
//if(!isset($_GET['Customisation']) || !ctype_digit($_GET['Customisation'])){
//    header('Location:index.php');
//    exit;
//}

require 'models/Sole.php';
require 'models/Shoe.php';

$soles = getAllSoles();
$shoes = getAllShoes();

include 'views/custom.php';