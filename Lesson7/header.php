<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>&#9776; Каталог</title>
    <!-- <script src="script.js" defer></script> -->

    <style>
      /*  table {
             border-spacing: 0;
        }
        td {
            border: 0.5px solid white;
            text-align: center;
        }
        #bigView {
            text-align: center;
            margin: 20px 50px;
        }
        .preViewCl {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            flex-wrap: wrap;
            align-self: flex-start;
            width: 800px;
            margin: 20px auto;
        }*/

        #cart {
            min-height: 200px;
            width: calc(100%-30px);
            margin: auto; 
        }

        .catCl {
            overflow: hidden;

        }

        .catCl div {
            border: 2px solid darkblue;
            width: 150px;
            min-height: 271px;
            display: inline-block;
            margin: 10px;
            padding: 10px;
            text-align: center;
            float: left;

        }

        .catCl div img {
            height: 70px;
        }

        .input {
            width: 30px;
        }

    </style>

</head>

<body>

<div>
    <div id="cart">  
        <?php
            // var_dump($_SESSION);
            if (count($_SESSION) > 0)
                foreach ($_SESSION as $id => $count) {
                    if ($count > 0)        
                    echo $id.' - '.$products[$id]['product_name'].' - количество:'.$count.' шт., цена: '.$products[$id]['price'].', сумма: '.$products[$id]['price']*$count;
                    };
        ?>
    </div>
    <div id="catalog" class="catCl">
    <?php
        foreach ($products as $id => $item) {
            $prodname = $item['product_name'];?>
            <div>
                <img src="<?=$item['prod_image']?>" alt="<?=$prodname?>" title="<?=$prodname?>"><br>
                <h2><?=$prodname?></h2>
                <p>Price: $<?=$item['price']?></p>
                <p>
                    <form method="get">
                        <input type="number" name="<?=$id?>" class="input">
                        <button type="submit">Купить</button>
                    </form>
                </p>
            </div> <?
        };
    ?>
    </div>
</div>
</body>
</html>