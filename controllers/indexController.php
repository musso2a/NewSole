<?php
require 'models/Product.php';
require 'models/Category.php';

$products = getProducts();
$categories = getAllCategories();
require 'views/index.php';