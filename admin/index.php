<?php

session_start();

// pour le projet ne pas oublier de vérifier si l'utilisateur est connecté ET qu'il est admin
//sinon le renvoyer vers la page d'accueil du site

require ('../helpers.php');

if(isset($_GET['controller'])){
	switch ($_GET['controller']){
		case 'chaussures' :
            require 'controllers/shoesController.php';
            break;
        case 'semelles' :
            require 'controllers/solesController.php';
            break;
        case 'customs' :
            require 'controllers/customsController.php';
            break;
        case 'commandes' :
            require 'controllers/ordersController.php';
            break;
        case 'users' :
            require 'controllers/usersController.php';
            break;

        default :
            require 'controllers/indexController.php';
	}
}
else{
	require 'controllers/indexController.php';
}

if(isset($_SESSION['messages'])){
	unset($_SESSION['messages']);	
}
if(isset($_SESSION['old_inputs'])){
	unset($_SESSION['old_inputs']);	
}
