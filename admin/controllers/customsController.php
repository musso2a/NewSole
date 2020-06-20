<?php

require('models/Custom.php');
require('models/Category.php');

if ($_GET['action'] == 'list') {
    $customs = getAllCustoms();
    require('views/customList.php');

} elseif ($_GET['action'] == 'new') {
    $categories = getAllCategories();
    require('views/customForm.php');

} elseif ($_GET['action'] == 'add') {

    if (empty($_POST['name']) || empty($_POST['size']) || empty($_POST['price']) || empty($_POST['quantity'])) {

        if (empty($_POST['name'])) {
            $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
        }
        if (empty($_POST['size'])) {
            $_SESSION['messages'][] = 'Le champ taille est obligatoire !';
        }
        if (empty($_POST['price'])) {
            $_SESSION['messages'][] = 'Le champ prix est obligatoire !';
        }
        if (empty($_POST['quantity'])) {
            $_SESSION['messages'][] = 'Le champ quantité est obligatoire !';
        }

        $_SESSION['old_inputs'] = $_POST;
        header('Location:index.php?controller=customs&action=new');
        exit;
    } else {
        $resultAdd = addCustom($_POST, $_FILES);

        $_SESSION['messages'][] = $resultAdd ? 'Nouvelle paire enregistré !' : "Erreur lors de l'enregistrement de la paire... :(";

        header('Location:index.php?controller=customs&action=list');
        exit;
    }
} elseif ($_GET['action'] == 'edit') {

    if (!empty($_POST)) {
        if (empty($_POST['name']) || empty($_POST['size']) || empty($_POST['price']) || empty($_POST['quantity'])) {

            if (empty($_POST['name'])) {
                $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
            }
            if (empty($_POST['size'])) {
                $_SESSION['messages'][] = 'Le champ taille est obligatoire !';
            }
            if (empty($_POST['price'])) {
                $_SESSION['messages'][] = 'Le champ prix est obligatoire !';
            }
            if (empty($_POST['quantity'])) {
                $_SESSION['messages'][] = 'Le champ quantité est obligatoire !';
            }

            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=customs&action=edit&id=' . $_GET['id']);
            exit;
        } else {
            $result = updateCustom($_GET['id'], $_POST, $_FILES);
            $_SESSION['messages'][] = $result ? 'Produits mis à jour !' : 'Erreur lors de la mise à jour... :(';
            header('Location:index.php?controller=customs&action=list');
            exit;
        }
    } else {
        if (!isset($_SESSION['old_inputs'])) {
            if (isset($_GET['id'])) {
                $custom = getCustom($_GET['id']);
                if ($custom == false) {
                    header('Location:index.php?controller=customs&action=list');
                    exit;
                }
            } else {
                header('Location:index.php?controller=customs&action=list');
                exit;
            }
        }
        $categories = getAllCategories();
        require('views/customForm.php');
    }

} elseif ($_GET['action'] == 'delete') {
    if (isset($_GET['id'])) {
        $result = deleteCustom($_GET['id']);
    } else {
        header('Location:index.php?controller=customs&action=list');
        exit;
    }

    $_SESSION['messages'][] = $result ? 'Prroduit supprimé !' : 'Erreur lors de la suppression... :(';

    header('Location:index.php?controller=customs&action=list');
    exit;
}

