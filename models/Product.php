<?php
function getProducts()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM products');
    $products = $query->fetchAll();

    return $products;
}
function getProduct($id)
{
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM products WHERE id = ?");
    $query->execute([
        $id
    ]);

    $selectedProduct = $query->fetch();

    return $selectedProduct;
}