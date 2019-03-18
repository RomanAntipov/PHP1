<?php
    session_start();

    // создаём массив содержащий все товары из БД
    $products = makePrList();

    if (count($_GET) > 0) {
        // var_dump($_GET);
        // header('location: mksess.php');
        // foreach ($_GET as $id => $count) {
        //     if ($_SESSION['id_'.$id] <= 0) $_SESSION['id_'.$id] = $count;
        //     else $_SESSION['id_'.$id] += $count;
        // };

        foreach ($_GET as $id => $count) {
            if ($_SESSION['cart'][$id] <= 0) $_SESSION['cart'][$id] = $count;
            else $_SESSION['cart'][$id] += $count;
        };

        // header ('location: index.php');
        };

    // $cart = $_SESSION['cart'];

    $cart = [];
    if (count($_SESSION['cart']) > 0)
        foreach ($_SESSION['cart'] as $id => $count) {
            if ($count > 0) {
                $cart[$id] = $count;
                $total += $products[$id]['price'] * $count; 
                };

            };

?>