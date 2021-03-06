<?php

session_start();

//if(!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] == 0){
//    header('Location:index.php');
//    exit;
//}

require ('../helpers.php');

if(isset($_GET['controller'])){
	switch ($_GET['controller']){
		case 'shoes' :
            require 'controllers/shoesController.php';
            break;
        case 'soles' :
            require 'controllers/solesController.php';
            break;
        case 'customs' :
            require 'controllers/customsController.php';
            break;
        case 'orders' :
            require 'controllers/ordersController.php';
            break;
        case 'users' :
            require 'controllers/usersController.php';
            break;

        case 'categories' :
            require 'controllers/categoriesController.php';
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
