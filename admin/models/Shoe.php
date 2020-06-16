<?php
function getProducts()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM products');
    $product = $query->fetchAll();

    return $product;
}