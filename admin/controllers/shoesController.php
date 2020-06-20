<?php


require('models/Shoe.php');
require('models/Category.php');

if ($_GET['action'] == 'list') {
    $shoes = getAllShoes();
    require('views/shoeList.php');

} elseif ($_GET['action'] == 'new') {
    $categories = getAllCategories();
    require('views/shoeForm.php');

} elseif ($_GET['action'] == 'add') {

    if (empty($_POST['name']) || empty($_POST['size']) || empty($_POST['price'])) {

        if (empty($_POST['name'])) {
            $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
        }
        if (empty($_POST['size'])) {
            $_SESSION['messages'][] = 'Le champ taille est obligatoire !';
        }
        if (empty($_POST['price'])) {
            $_SESSION['messages'][] = 'Le champ prix est obligatoire !';
        }

        $_SESSION['old_inputs'] = $_POST;
        header('Location:index.php?controller=shoes&action=new');
        exit;
    } else {
        $resultAdd = addShoe($_POST, $_FILES);

        $_SESSION['messages'][] = $resultAdd ? 'Nouvelle paire enregistré !' : "Erreur lors de l'enregistrement de la paire... :(";

        header('Location:index.php?controller=shoes&action=list');
        exit;
    }
} elseif ($_GET['action'] == 'edit') {

    if (!empty($_POST)) {
        if (empty($_POST['name']) || empty($_POST['size']) || empty($_POST['price'])) {

            if (empty($_POST['name'])) {
                $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
            }
            if (empty($_POST['size'])) {
                $_SESSION['messages'][] = 'Le champ taille est obligatoire !';
            }
            if (empty($_POST['price'])) {
                $_SESSION['messages'][] = 'Le champ prix est obligatoire !';
            }

            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=shoes&action=edit&id=' . $_GET['id']);
            exit;
        } else {
            $result = updateShoe($_GET['id'], $_POST, $_FILES);
            $_SESSION['messages'][] = $result ? 'Produits mis à jour !' : 'Erreur lors de la mise à jour... :(';
            header('Location:index.php?controller=shoes&action=list');
            exit;
        }
    } else {
        if (!isset($_SESSION['old_inputs'])) {
            if (isset($_GET['id'])) {
                $shoe = getShoe($_GET['id']);
                if ($shoe == false) {
                    header('Location:index.php?controller=shoes&action=list');
                    exit;
                }
            } else {
                header('Location:index.php?controller=shoes&action=list');
                exit;
            }
        }
        $categories = getAllCategories();
        require('views/shoeForm.php');
    }

} elseif ($_GET['action'] == 'delete') {
    if (isset($_GET['id'])) {
        $result = deleteShoe($_GET['id']);
    } else {
        header('Location:index.php?controller=shoes&action=list');
        exit;
    }

    $_SESSION['messages'][] = $result ? 'Chaussure supprimé !' : 'Erreur lors de la suppression... :(';

    header('Location:index.php?controller=shoes&action=list');
    exit;
}

