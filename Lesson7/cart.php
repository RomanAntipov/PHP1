<?php
    session_start();
    $products = makePrList();

    if (count($_GET) > 0) {
        
        // var_dump($_GET);
        // header('location: mksess.php');
        foreach ($_GET as $id => $count) {
            if ($_SESSION['id_'.$id] <= 0) $_SESSION['id_'.$id] = $count;
            else $_SESSION['id_'.$id] += $count;
        };

        // header ('location: index.php');
        };

    $cart = [];
    if (count($_SESSION) > 0)
        foreach ($_SESSION as $key => $count) {
            
            if ($count > 0) {
                $id = explode("_", $key)[1];
                $cart[$id] = $count;
                };     
            };

?>