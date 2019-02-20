<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>&#9776; Каталог</title>
    <script src="script.js" defer></script>

    <style>
        table {
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
        }
    </style>

</head>

<?php

$dir = 'big/';

// получаем список всех файлов в директории big/ и помещаем его в массив $fileslist
$fileslist = scandir($dir);

// проверяем, что функция отработала и массив сформирован, в продуктовой версии данную строчку закомментировать.
// var_dump($fileslist);

$imgtags = '';
foreach ($fileslist as $key => $file) {
    // тест - проверяем, как функция перебирает значения в массиве. В продуктовой версии строчку закомментировать.
    // echo 'Ключ: '.$key.', имя файла: '.$file.'<br/>';


    // var_dump(strpos(mime_content_type('big/'.$file), 'image') === 0); // тест для проверки работы условия


    if (strpos(mime_content_type('big/'.$file), 'image') === 0) {    // если файл имеет тип изображение, то выполняется тело условия

    $currentitem = '<img src="big/'.$file.'" height="100px" id="'.$file.'"/>';
    $imgtags .= $currentitem;
    };
};

?>



<body>

<div>
    <div id="bigView">  
        <img src="big/<? echo $fileslist[2]?>" width="750px"/>
    </div>
    <div id="preView" class="preViewCl">
    <? echo $imgtags;?>
    </div>
</div>

</body>
</html>