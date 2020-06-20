<?php

require('models/User.php');

if ($_GET['action'] == 'list') {
    $users = getAllUsers();
    require('views/userList.php');

} elseif ($_GET['action'] == 'new') {
    require('views/userForm.php');

} elseif ($_GET['action'] == 'add') {

    if (empty($_POST['last_name']) || empty($_POST['first_name']) || empty($_POST['mail']) || empty($_POST['password']) || empty($_POST['adress']) || empty($_POST['is_admin'])) {

        if (empty($_POST['last_name'])) {
            $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
        }
        if (empty($_POST['first_name'])) {
            $_SESSION['messages'][] = 'Le champ prénom est obligatoire !';
        }
        if (empty($_POST['mail'])) {
            $_SESSION['messages'][] = 'Le mail est obligatoire !';
        }
        if (empty($_POST['password'])) {
            $_SESSION['messages'][] = 'Mot de passe est obligatoire !';
        }
        if (empty($_POST['adress'])) {
            $_SESSION['messages'][] = 'Le champ adresse est obligatoire !';
        }
        if (empty($_POST['is_admin'])) {
            $_SESSION['messages'][] = 'Le champ privilége est obligatoire !';
        }

        $_SESSION['old_inputs'] = $_POST;
        header('Location:index.php?controller=users&action=new');
        exit;
    } else {
        $resultAdd = addUser($_POST);

        $_SESSION['messages'][] = $resultAdd ? 'Nouvel utilisateur enregistré !' : "Erreur lors de l'enregistrement de l'utilisateur... :(";

        header('Location:index.php?controller=users&action=list');
        exit;
    }
} elseif ($_GET['action'] == 'edit') {

    if (!empty($_POST)) {
        if (empty($_POST['last_name']) || empty($_POST['first_name']) || empty($_POST['mail']) || empty($_POST['adress'] ) || empty($_POST['is_admin'] )) {

            if (empty($_POST['last_name'])) {
                $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
            }
            if (empty($_POST['first_name'])) {
                $_SESSION['messages'][] = 'Le champ prénom est obligatoire !';
            }
            if (empty($_POST['mail'])) {
                $_SESSION['messages'][] = 'Le champ mail est obligatoire !';
            }
            if (empty($_POST['adress'])) {
                $_SESSION['messages'][] = 'Le champ adress est obligatoire !';
            }
            if (empty($_POST['is_admin'])) {
            $_SESSION['messages'][] = 'Le champ privilége est obligatoire !';
            }

            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=users&action=edit&id=' . $_GET['id']);
            exit;
        } else {
            $result = updateUser($_GET['id'], $_POST);
            $_SESSION['messages'][] = $result ? 'Utilisateur mis à jour !' : 'Erreur lors de la mise à jour... :(';
            header('Location:index.php?controller=users&action=list');
            exit;
        }
    } else {
        if (!isset($_SESSION['old_inputs'])) {
            if (isset($_GET['id'])) {
                $user = getUser($_GET['id']);
                if ($user == false) {
                    header('Location:index.php?controller=users&action=list');
                    exit;
                }
            } else {
                header('Location:index.php?controller=users&action=list');
                exit;
            }
        }
        require('views/userForm.php');
    }

} elseif ($_GET['action'] == 'delete') {
    if (isset($_GET['id'])) {
        $result = deleteUser($_GET['id']);
    } else {
        header('Location:index.php?controller=users&action=list');
        exit;
    }

    $_SESSION['messages'][] = $result ? 'Utilisateur supprimé !' : 'Erreur lors de la suppression... :(';

    header('Location:index.php?controller=users&action=list');
    exit;
}

