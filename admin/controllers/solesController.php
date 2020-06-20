<?php


require('models/Sole.php');

if ($_GET['action'] == 'list') {
    $soles = getAllSoles();
    require('views/soleList.php');

} elseif ($_GET['action'] == 'new') {
    require('views/soleForm.php');

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
        header('Location:index.php?controller=soles&action=new');
        exit;
    } else {
        $resultAdd = addSole($_POST, $_FILES);

        $_SESSION['messages'][] = $resultAdd ? 'Nouvelle paire enregistré !' : "Erreur lors de l'enregistrement de la paire... :(";

        header('Location:index.php?controller=soles&action=list');
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
            header('Location:index.php?controller=soles&action=edit&id=' . $_GET['id']);
            exit;
        } else {
            $result = updateSole($_GET['id'], $_POST, $_FILES);
            $_SESSION['messages'][] = $result ? 'Semelles mise à jour !' : 'Erreur lors de la mise à jour... :(';
            header('Location:index.php?controller=soles&action=list');
            exit;
        }
    } else {
        if (!isset($_SESSION['old_inputs'])) {
            if (isset($_GET['id'])) {
                $sole = getSole($_GET['id']);
                if ($sole == false) {
                    header('Location:index.php?controller=soles&action=list');
                    exit;
                }
            } else {
                header('Location:index.php?controller=soles&action=list');
                exit;
            }
        }
        require('views/soleForm.php');
    }

} elseif ($_GET['action'] == 'delete') {
    if (isset($_GET['id'])) {
        $result = deleteSole($_GET['id']);
    } else {
        header('Location:index.php?controller=soles&action=list');
        exit;
    }

    $_SESSION['messages'][] = $result ? 'Semelles supprimé !' : 'Erreur lors de la suppression... :(';

    header('Location:index.php?controller=soles&action=list');
    exit;
}

