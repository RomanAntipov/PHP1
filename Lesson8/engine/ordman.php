<?php
    session_start();
    // include 'db.php';
    // include 'cart.php';

$ordersList = getAllOrders($_SESSION['username']);
// var_dump($ordersList);

// var_dump($cart);

if (count($_GET) > 0) {		
		killOrderProduct($_GET['OrderId'], $_GET['ProductId']);
		header ('location: administration.php');
    };