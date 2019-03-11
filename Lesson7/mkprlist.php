<?php
	function makePrList() {
		$link = mysqli_connect('localhost:3307', 'root', '', 'webshop');
		$allprod = mysqli_query($link, "SELECT * FROM webshop.products;");
		// var_dump($products);

		$products = [];
		while ($row = mysqli_fetch_assoc($allprod)) {
		    // var_dump($row);
		    // формируем двумерный массив, в котором ключи ячеек равны id, вложенные массивы содержат инфо о наименовании, цене товара и изображении.
		    $products[$row['id']] = ['product_name' => $row['product_name'], 'price' => $row['price'], 'prod_image' => $row['prod_image']];
			};
		// проверяем, что функция отработала и массив сформирован, в продуктовой версии данную строчку закомментировать.
		// var_dump($products);
		mysqli_close($link);
		return $products;
	};