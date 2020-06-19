<?php


require('models/Order.php');

if ($_GET['action'] == 'list') {
    $orders = getAllOrderss();
    require('views/orderList.php');
}