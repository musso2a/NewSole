<?php

function getAllCategories()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM categories');
    $categories =  $query->fetchAll();

    return $categories;
}

function getCategory($id)
{
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM categories WHERE id = ?");
    $query->execute([
        $id
    ]);

    $result = $query->fetch();

    return $result;
}
function updateCategory($id, $informations, $img)
{
    $db = dbConnect();

    $query = $db->prepare('UPDATE categories SET name = ? , description = ? WHERE id = ?');

    $result = $query->execute(
        [
            $informations['name'],
            $informations['description'],
            $id,
        ]
    );

    if ($result && isset($img['image']['tmp_name'])) {

        $allowed_extensions = array('jpg', 'jpeg', 'gif', 'png');
        $my_file_extension = pathinfo($img['image']['name'], PATHINFO_EXTENSION);
        if (in_array($my_file_extension, $allowed_extensions)) {
            $new_file_name = $id . '.' . $my_file_extension;
            $destination = '../assets/img/categories/' . $new_file_name;
            $result = move_uploaded_file($img['image']['tmp_name'], $destination);

            $db->query("UPDATE categories SET image = '$new_file_name' WHERE id = $id");
        }

    }

    return $result;
}

function addCategory($informations, $img)
{
    $db = dbConnect();

    $query = $db->prepare("INSERT INTO categories (name) VALUES( :name )");
    $result = $query->execute([
        'name' => $informations['name'],
    ]);

    if ($result && isset($img['image']['tmp_name'])) {
        $categoryId = $db->lastInsertId();

        $allowed_extensions = array('jpg', 'jpeg', 'gif', 'png');
        $my_file_extension = pathinfo($img['image']['name'], PATHINFO_EXTENSION);
        if (in_array($my_file_extension, $allowed_extensions)) {
            $new_file_name = $categoryId . '.' . $my_file_extension;
            $destination = '../assets/img/categories/' . $new_file_name;
            $result = move_uploaded_file($img['image']['tmp_name'], $destination);

            $db->query("UPDATE categories SET image = '$new_file_name' WHERE id = $categoryId");
        }

    }

    return $result;
}


function deleteCategory($id)
{
    $db = dbConnect();

    $query = $db->prepare('DELETE FROM categories WHERE id = ?');
    $result = $query->execute([$id]);

    return $result;
}