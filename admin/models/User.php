<?php
function getAllUsers()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM users');
    $users = $query->fetchAll();

    return $users;
}

function getUser($id)
{
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM users WHERE id = ?");
    $query->execute([
        $id
    ]);

    $result = $query->fetch();

    return $result;
}

function updateUser($id, $informations)
{
    $db = dbConnect();

    $query = $db->prepare('UPDATE users SET last_name = ?, first_name = ?, mail = ?, password = ? , adress = ?, is_admin = ? WHERE id = ?');

    $result = $query->execute(
        [
            $informations['last_name'],
            $informations['first_name'],
            $informations['mail'],
            $informations['password'],
            $informations['adress'],
            $informations['is_admin'],
            $id,
        ]
    );

    return $result;
}

function addUser($informations)
{
    $db = dbConnect();

    $query = $db->prepare("INSERT INTO users (last_name, first_name, mail, password, adress, is_admin) VALUES( :last_name, :first_name, :mail, :password, :adress, :is_admin)");
    $result = $query->execute([
        'last_name' => $informations['last_name'],
        'first_name' => $informations['first_name'],
        'mail' => $informations['mail'],
        'password' => $informations['password'],
        'adress' => $informations['adress'],
        'is_admin' => $informations['is_admin'],

    ]);

    return $result;
}

function deleteUser($id)
{
    $db = dbConnect();

    $query = $db->prepare('DELETE FROM users WHERE id = ?');
    $result = $query->execute([$id]);


    return $result;
}