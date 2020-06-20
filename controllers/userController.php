<?php

require('models/User.php');

if ($_GET['action'] == 'new') {
    require('views/registerForm.php');

} elseif ($_GET['action'] == 'add'){
    if (!empty($_POST)) {
        if (empty($_POST['last_name']) || empty($_POST['first_name']) || empty($_POST['adress']) || empty($_POST['mail']) || empty($_POST['password'])) {

            if (empty($_POST['last_name'])) {
                $_SESSION['messages'][] = 'Le champ Nom est obligatoire !';
            }
            if (empty($_POST['first_name'])) {
                $_SESSION['messages'][] = 'Le champ Prénom est obligatoire !';
            }
            if (empty($_POST['adress'])) {
                $_SESSION['messages'][] = 'Le champ adresse est obligatoire !';
            }
            if (empty($_POST['mail'])) {
                $_SESSION['messages'][] = 'Le champ mail est obligatoire !';
            }
            if (empty($_POST['password'])) {
                $_SESSION['messages'][] = 'Le champ Mot de passe est obligatoire !';
            }

            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?page=register&action=new');
            exit;
        }else {
            $user = getUser();

            if($user){
                $_SESSION['messages'][] = 'E-mail déja utilisé !';
                header('Location:index.php?page=register&action=new');
                exit;
            }
            else {
                $resultAdd = addUser();
                $_SESSION['messages'][] = $resultAdd ? 'Bienvenue Dans la famille !' : "Erreur lors de l'enregistrement... :(";
                if($user)
                    $_SESSION['user'][] = $user;

                header('Location:index.php');
                exit;
            }


        }
    }
}
?>