<?php

require('models/Login.php');
if(isset($_GET['action'])) {
    if ($_GET['action'] == 'connect') {

        if (!empty($_POST)) {
            if (empty($_POST['mail']) || empty($_POST['password'])) {

                if (empty($_POST['mail'])) {
                    $_SESSION['messages'][] = 'Le champ adresse est obligatoire !';
                }
                if (empty($_POST['password'])) {
                    $_SESSION['messages'][] = 'Le champ mail est obligatoire !';
                }

                $_SESSION['old_inputs'] = $_POST;
                header('Location:index.php?page=Login');
                exit;
            } else {

                $logIn = getLogin();

                if ($logIn) {
                    if(!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] == 0){
                        $_SESSION['messages'][] = 'Bienvenu !';
                        header('Location:index.php?page=Login');
                        exit;
                    } else {
                        header('Location:admin/index.php');
                        exit;
                    }
                } else {
                    $_SESSION['messages'][] = 'Erreur de connexion !';
                    header('Location:index.php?page=Login');
                    exit;
                }
            }
        }
    }
}

require 'views/login.php';