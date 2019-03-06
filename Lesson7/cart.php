<?php

$link = mysqli_connect('localhost:3307', 'root', '', 'webshop');

$products = mysqli_query($link, "SELECT * FROM webshop.products;");
// var_dump($products);

// setcookie('name', 'mycart', time() + 3600 * 24 * 7);
session_start();

$productslist = [];
while ($row = mysqli_fetch_assoc($products)) {
    // var_dump($row);
    $productslist[] = $row;
}

// проверяем, что функция отработала и массив сформирован, в продуктовой версии данную строчку закомментировать.
// var_dump($productslist);

$prodtags = '';
foreach ($productslist as $item) {
    // тест - проверяем, как функция перебирает значения в массиве. В продуктовой версии строчку закомментировать.
    // echo 'Ключ: '.$id.', имя файла: '.$item['id'].'<br/>'.$item['product_name'].'<br/>'.$item['prod_image'].'<br/>';
    if (!isset($_SESSION[$item['id']])) $_SESSION[$item['id']] = 0;
    $prodname = $item['product_name'];
    $currentitem = '<div><img src="'.$item['prod_image'].'" alt="'.$prodname.'" title="'.$prodname.'"><br><h2>'.$prodname.'</h2><p>Price: $'.$item['price'].'</p><p><form method="get"><input type="number" name="'.$item['id'].'" class="input"><button type="submit">Купить</button></form></p></div>';
    
    $prodtags .= $currentitem;
};

// var_dump($_SESSION);

mysqli_close($link);

// $cartitems = [];

// $_SESSION[] = $_GET;
// var_dump($_GET);
foreach ($_GET as $id => $count) {
	$_SESSION[$id] += $count;
};
var_dump($_SESSION); 
?>