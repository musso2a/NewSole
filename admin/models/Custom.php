<?php

function getAllCustoms()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM products');
    $customs = $query->fetchAll();

    return $customs;
}

function getCustom($id)
{
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM products WHERE id = ?");
    $query->execute([
        $id
    ]);

    $result = $query->fetch();

    return $result;
}

function updateCustom($id, $informations, $img)
{
    $db = dbConnect();

    $query = $db->prepare('UPDATE products SET name = ?, size = ?, price = ? , category_id = ? WHERE id = ?');

    $result = $query->execute(
        [
            $informations['name'],
            $informations['size'],
            $informations['price'],
            $informations['category_id'],
            $id,
        ]
    );

    if ($result && isset($img['image']['tmp_name'])) {

        $allowed_extensions = array('jpg', 'jpeg', 'gif', 'png');
        $my_file_extension = pathinfo($img['image']['name'], PATHINFO_EXTENSION);
        if (in_array($my_file_extension, $allowed_extensions)) {
            $new_file_name = $id . '.' . $my_file_extension;
            $destination = '../assets/img/customs/' . $new_file_name;
            $result = move_uploaded_file($img['image']['tmp_name'], $destination);

            $db->query("UPDATE products SET image = '$new_file_name' WHERE id = $id");
        }

    }

    return $result;
}

function addCustom($informations, $img)
{
    $db = dbConnect();

    $query = $db->prepare("INSERT INTO products (name, size, price, quantity, category_id) VALUES( :name, :size, :price, :quantity, :category_id)");
    $result = $query->execute([
        'name' => $informations['name'],
        'size' => $informations['size'],
        'price' => $informations['price'],
        'quantity' => $informations['quantity'],
        'category_id' => $informations['category_id'],
    ]);

    if ($result && isset($img['image']['tmp_name'])) {
        $productId = $db->lastInsertId();

        $allowed_extensions = array('jpg', 'jpeg', 'gif', 'png');
        $my_file_extension = pathinfo($img['image']['name'], PATHINFO_EXTENSION);
        if (in_array($my_file_extension, $allowed_extensions)) {
            $new_file_name = $productId . '.' . $my_file_extension;
            $destination = '../assets/img/customs/' . $new_file_name;
            $result = move_uploaded_file($img['image']['tmp_name'], $destination);

            $db->query("UPDATE products SET image = '$new_file_name' WHERE id = $productId");
        }

    }

    return $result;
}

function deleteCustom($id)
{
    $db = dbConnect();

    $query = $db->prepare('DELETE FROM products WHERE id = ?');
    $result = $query->execute([$id]);


    return $result;
}