<?php


function getAllSoles()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM soles');
    $soles = $query->fetchAll();

    return $soles;
}

function getSole($id)
{
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM soles WHERE id = ?");
    $query->execute([
        $id
    ]);

    $result = $query->fetch();

    return $result;
}

function updateSole($id, $informations)
{
    $db = dbConnect();

    $query = $db->prepare('UPDATE soles SET name = ?, size = ?, price = ? , quantity = ? WHERE id = ?');

    $result = $query->execute(
        [
            $informations['name'],
            $informations['size'],
            $informations['price'],
            $informations['quantity'],
            $id,
        ]
    );

    return $result;
}

function addSole($informations)
{
    $db = dbConnect();

    $query = $db->prepare("INSERT INTO soles (name, size, price, quantity) VALUES( :name, :size, :price, :quantity)");
    $result = $query->execute([
        'name' => $informations['name'],
        'size' => $informations['size'],
        'price' => $informations['price'],
        'quantity' => $informations['quantity'],

    ]);

    if ($result && isset($_FILES['image']['tmp_name'])) {
        $soleId = $db->lastInsertId();

        $allowed_extensions = array('jpg', 'jpeg', 'gif', 'png');
        $my_file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        if (in_array($my_file_extension, $allowed_extensions)) {
            $new_file_name = $soleId . '.' . $my_file_extension;
            $destination = '../assets/images/artist/' . $new_file_name;
            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            $db->query("UPDATE soles SET image = '$new_file_name' WHERE id = $soleId");
        }
    }

    return $result;
}

function deleteSole($id)
{
    $db = dbConnect();

    $query = $db->prepare('DELETE FROM soles WHERE id = ?');
    $result = $query->execute([$id]);


    return $result;
}