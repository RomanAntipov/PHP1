<?php
    session_start();

    // создаём массив содержащий все товары из БД
    $products = makePrList($mysql);

    if (count($_GET) > 0) {

        foreach ($_GET as $id => $count) {
            if ($_SESSION['cart'][$id] <= 0) $_SESSION['cart'][$id] = $count;
            else $_SESSION['cart'][$id] += $count;
        };

    };

    $cart = [];
    if (count($_SESSION['cart']) > 0)
        foreach ($_SESSION['cart'] as $id => $count) {
            if ($count > 0) {
                $cart[$id] = $count;
                $total += $products[$id]['price'] * $count; 
                };

            };

?>