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