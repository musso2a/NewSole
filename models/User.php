<?php

function getAllUsers()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM users');
    $users = $query->fetchAll();

    return $users;
}

function getUser()
{
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM users WHERE mail = ?');
    $query->execute(
        [
            $_POST['mail'],
        ]
    );

    $result = $query->fetch();

    return $result;
}

function addUser()
{
    $db = dbConnect();

//    $query = $db->prepare('SELECT mail FROM users WHERE email = ?');
//    $query->execute([
//        'mail' => $informations['mail']
//    ]);
//    $emailExists = $query->fetch();
//
//    //si $emailExists == false, on autorise l'insertion du nouvel utilisateur
//    if(!$emailExists) {
        $query = $db->prepare('INSERT INTO users (mail, password, first_name, last_name, adress) VALUES (?, ?, ?, ?, ?)');
        $result = $query->execute(
            [
                $_POST['mail'],
                hash('md5',$_POST['password']),
                $_POST['first_name'],
                $_POST['last_name'],
                $_POST['adress'],

//                'mail' => $informations['mail'],
//                'password' => $informations['password'],
//                'first_name' => $informations['first_name'],
//                'last_name' => $informations['last_name'],
//                'adress' => $informations['adress'],
//                'city' => $informations['city'],
            ]
        );
//    $query = $db->prepare("INSERT INTO users (last_name, first_name, mail, password, adress, is_admin) VALUES( :last_name, :first_name, :mail, :password, :adress)");
//    $result = $query->execute([
//        'last_name' => $informations['last_name'],
//        'first_name' => $informations['first_name'],
//        'mail' => $informations['mail'],
//        'password' => $informations['password'],
//        'adress' => $informations['adress'],
//
//    ]);

        return $result;
//    }
}