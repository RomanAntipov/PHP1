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
// $_POST = NULL;
$link = mysqli_connect('localhost:3307', 'root', '', 'quotas');
$quotasquery = mysqli_query($link, "SELECT * FROM quotas.quotas;");
// var_dump($quotasquery);
$allquotas = [];
$result = '';
while ($row = mysqli_fetch_assoc($quotasquery)) {
    // var_dump($row);
    $allquotas[] = $row;
};

foreach ($quotasquery as $key => $quotatext) {
    $result .= '<div>ID отзыва: '.$quotatext['id'].' дата: '.$quotatext['datetime'].'<br>Имя: '.$quotatext['username'].'<br>'.$quotatext['quotatext'].'<br><hr></div>';
};

?>

<body>
   <!-- container start   -->
    <div class="container">
        <footer>
            <h2>
                Ваши отзывы
            </h2>
            <div class="quotas">
                <?=$result?>
            </div>
            <form method="post">
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
                    <div>Имя:</div>
                    <div><input type="text" name="username" placeholder="Ваше имя"></div>
                    <div>Ваш отзыв:</div>
                    <div><textarea type="text" name="text" placeholder="Напишите несколько слов о нас" rows="20" cols="80"></textarea></div>
                    <div>
                        <button type="submit">Отправить отзыв</button>
                    </div>
                </div>
            </fieldset>
            </form>
              
        </footer>
        <!-- container finish  -->
    </div>
<?
// var_dump($_POST);
if ($_POST && ($_POST['username'] !== '') && ($_POST['text'] !=='')) {
    $querystring = 'INSERT INTO quotas.quotas (username, quotatext) VALUES (\''.$_POST['username'].'\', \''.$_POST['text'].'\');';
    echo '<br>'.$querystring;
    $addquotas = mysqli_query($link, $querystring);
    var_dump($addquotas);
    $_POST = [];
    // echo '<br> name: ', $_POST['username'];

};



?>

</body>



</html>