<?php

require_once 'models/Category.php';
require_once 'models/Product.php';

$selectedProduct = false;

if(isset($_GET['product_id']) ){

    if(!ctype_digit($_GET['product_id'])) {
        header('Location:index.php');
        exit;
    }

    $selectedProduct = getProduct($_GET['product_id']);
}

if($selectedProduct == false ){
    header('Location:index.php');
    exit;
}
$categories = getAllCategories();
include 'views/article.php';