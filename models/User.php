<?php

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