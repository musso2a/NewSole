<?php
require('helpers.php');

session_start();

if(isset($_GET['page'])):
    switch ($_GET['page']):
        case 'Customisation' :
            require 'controllers/customController.php';
            break;

        case 'Reparation' :
            require 'controllers/repairController.php';
            break;

        case 'Produits' :
            require 'controllers/productsController.php';
            break;

        case 'Apropos' :
            require 'controllers/aboutController.php';
            break;

        case 'Panier' :
            require 'controllers/cartController.php';
            break;

        case 'MentionsLégales' :
            require 'controllers/legalController.php';
            break;

        case 'Login' :
            require 'controllers/loginController.php';
            break;

        case 'register' :
            require 'controllers/userController.php';
            break;

        case 'product' :
            require 'controllers/articleController.php';
            break;

        default :
            require 'controllers/indexController.php';
    endswitch;
else:
    require 'controllers/indexController.php';
endif;