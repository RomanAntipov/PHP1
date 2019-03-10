<?php

$products = makePrList();
// var_dump($products);
if (count($_GET) > 0) {
    header('location: mksess.php');
    // var_dump($_GET);
};

?>