<?php

$link = mysqli_connect('localhost:3307', 'root', '', 'webshop');

$allprod = mysqli_query($link, "SELECT * FROM webshop.products;");
// var_dump($products);

// setcookie('name', 'mycart', time() + 3600 * 24 * 7);


$products = [];
while ($row = mysqli_fetch_assoc($allprod)) {
    // var_dump($row);
    $products[] = $row;
};

// проверяем, что функция отработала и массив сформирован, в продуктовой версии данную строчку закомментировать.
// var_dump($products);

// var_dump($_SESSION);

$prodtags = '';
$prodtable = [];
foreach ($products as $item) {
    // тест - проверяем, как функция перебирает значения в массиве. В продуктовой версии строчку закомментировать.
    // echo 'Ключ: '.$id.', имя файла: '.$item['id'].'<br/>'.$item['product_name'].'<br/>'.$item['prod_image'].'<br/>';
    // echo $_SESSION[$item['id']].'<br>';
    $prodname = $item['product_name'];
    $id = $item['id'];
    if (!isset($_SESSION[$id])) $_SESSION[$id] = 0;
    $currentitem = '<div><img src="'.$item['prod_image'].'" alt="'.$prodname.'" title="'.$prodname.'"><br><h2>'.$prodname.'</h2><p>Price: $'.$item['price'].'</p><p><form method="get"><input type="number" name="'.$id.'" class="input"><button type="submit">Купить</button></form></p></div>';
    $prodtags .= $currentitem;
    $prodtable [$id] = ['prodname' => $prodname, 'price' => $item['price']];  // формируем двумерный массив, в котором ключи ячеек равны id, вложенные массивы содержат инфо о наименовании и цене товара.
};

// var_dump($prodtable);

mysqli_close($link);

// $cartitems = [];

// $_SESSION[] = $_GET;
// var_dump($_GET);
foreach ($_GET as $id => $count) {
	$_SESSION[$id] += $count;
};
// var_dump($_SESSION); 

foreach ($_SESSION as $id => $count) {
	if ($count > 0)
	echo $id.' - '.$prodtable[$id]['prodname'].' - количество:'.$count.' шт., цена: '.$prodtable[$id]['price'].', сумма: '.$prodtable[$id]['price']*$count;
};


?>