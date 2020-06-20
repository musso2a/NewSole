<?php

require('models/User.php');

if ($_GET['action'] == 'new') {
    require('views/registerForm.php');
}

if(!empty($_POST)){
    //si email ou mot de passe vide, ne pas insérer et écrire eine petit message
    if(empty($_POST['email']) || empty($_POST['password'])){
        echo 'email et mot de passe obligatoires';
    }
    else{
        //verifier si l'email n'est pas déjà utilisé
        $query = $db->prepare('SELECT email FROM users WHERE email = ?');
        $query->execute([
            $_POST['email']
        ]);
        $emailExists = $query->fetch();

        //si $emailExists == false, on autorise l'insertion du nouvel utilisateur
        if(!$emailExists){
            $query = $db->prepare('INSERT INTO users (email, password, first_name, last_name) VALUES (?, ?, ?, ?)');
            $result = $query->execute(
                [
                    $_POST['email'],
                    hash('md5', $_POST['password']),
                    $_POST['first_name'],
                    $_POST['last_name'],
                ]
            );
            echo 'OK bien inscrit';
        }
        else{
            echo 'email déjà utilisé';
        }
    }
}
?>