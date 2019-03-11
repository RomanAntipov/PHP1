<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="styles/style.css">
</head>

<?php 
// var_dump($_GET);

$result = 0;

if ($_GET) {
    $result = mathOperation($_GET['arg1'], $_GET['arg2'], $_GET['optype']); }
else {
    $result = 0;
};


function sum($x,$y) {
    return $x + $y;
};

function dif($x,$y) {
    return $x - $y;
};

function mult($x,$y) {
    return $x * $y;
};

function div($x,$y) {
    if ($y == 0) return 'error';
    return $x / $y;
};

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case 'sum':
            return sum ($arg1,$arg2);
            break;
        case 'dif':
            return dif ($arg1,$arg2);
            break;
        case 'mult':
            return mult ($arg1,$arg2);
            break;
        case 'div':
            return div ($arg1,$arg2);
            break;
        default:
            return 'error';

    }
};


?>

<body>
   <!-- container start   -->
    <div class="container">
        <footer>
            <h2>
                Калькулятор
            </h2>
            <div class="output">
                <?=$result?>
            </div>
            <form method="get">
                <fieldset><legend>Введите аргументы:</legend>
                <div class="grid">
<!--                     <div><label for="city">Тип операции:</label></div>
                    <div>
                        <input name="optype" list="optype">
                        <datalist id="optype">
                            <option label="Сложение" value="sum"></option>
                            <option label="Вычитание" value="dif"></option>
                            <option label="Умножение" value="mult"></option>
                            <option label="Деление" value="div"></option>
                        </datalist>
                    </div> -->
                    <div>Аргумент 1:</div>
                    <div><input type="number" name="arg1" value="arg1"></div>
                    <div>Аругмент 2:</div>
                    <div><input type="number" name="arg2" value="arg2"></div>
                    <div>
                        <button name="optype" value="sum" type="submit">+</button>
                        <button name="optype" value="dif" type="submit">-</button>
                        <button name="optype" value="mult" type="submit">*</button>
                        <button name="optype" value="div" type="submit">/</button>
                    </div>
                </div>
            </fieldset>
            </form>
              
        </footer>
        <!-- container finish  -->
    </div>
</body>
</html>