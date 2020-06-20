<?php


function getAllShoes()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM shoes');
    $shoes = $query->fetchAll();

    return $shoes;
}

function getShoe($id)
{
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM shoes WHERE id = ?");
    $query->execute([
        $id
    ]);

    $result = $query->fetch();

    return $result;
}

function updateShoe($id, $informations, $img)
{
    $db = dbConnect();

    $query = $db->prepare('UPDATE shoes SET name = ?, size = ?, price = ? , category_id = ? WHERE id = ?');

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
            $destination = '../assets/img/shoes/' . $new_file_name;
            $result = move_uploaded_file($img['image']['tmp_name'], $destination);

            $db->query("UPDATE shoes SET image = '$new_file_name' WHERE id = $id");
        }
    }

    return $result;
}

function addShoe($informations, $img)
{
    $db = dbConnect();

    $query = $db->prepare("INSERT INTO shoes (name, size, price, category_id) VALUES( :name, :size, :price, :category_id)");
    $result = $query->execute([
        'name' => $informations['name'],
        'size' => $informations['size'],
        'price' => $informations['price'],
        'category_id' => $informations['category_id'],
    ]);

    if ($result && isset($_FILES['image']['tmp_name'])) {
        $shoeId = $db->lastInsertId();

        $allowed_extensions = array('jpg', 'jpeg', 'gif', 'png');
        $my_file_extension = pathinfo($img['image']['name'], PATHINFO_EXTENSION);
        if (in_array($my_file_extension, $allowed_extensions)) {
            $new_file_name = $shoeId . '.' . $my_file_extension;
            $destination = '../assets/img/shoes/' . $new_file_name;
            $result = move_uploaded_file($img['image']['tmp_name'], $destination);

            $db->query("UPDATE shoes SET image = '$new_file_name' WHERE id = $shoeId");
        }
    }

    return $result;
}

function deleteShoe($id)
{
    $db = dbConnect();

    $query = $db->prepare('DELETE FROM shoes WHERE id = ?');
    $result = $query->execute([$id]);


    return $result;
}