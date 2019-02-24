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
        #counter {
            text-align: center;
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
$link = mysqli_connect('localhost:3307', 'root', '', 'mygallery');

$images = mysqli_query($link, "SELECT * FROM mygallery.images;");
// var_dump($images);

$fileslist = [];
while ($row = mysqli_fetch_assoc($images)) {
    // var_dump($row);
    $fileslist[] = $row;
}

// проверяем, что функция отработала и массив сформирован, в продуктовой версии данную строчку закомментировать.
// var_dump($fileslist);

$imgtags = '';
foreach ($fileslist as $key => $file) {
    // тест - проверяем, как функция перебирает значения в массиве. В продуктовой версии строчку закомментировать.
    // echo 'Ключ: '.$key.', имя файла: '.$file.'<br/>';

    $currentitem = '<img src="'.$file['filename'].'" alt="'.$file['imagename'].'" height="100px" id="'.$file['filename'].' '.$file['viewcounter'].'"/>';
    $imgtags .= $currentitem;
};

mysqli_close($link);
?>



<body>

<div>
    <div id="bigView">  
        <img src="<? echo $fileslist[0]['filename']?>" width="750px"/>
    </div>
    <div id="counter">
        <? echo $fileslist[0]['viewcounter']?>
    </div>
    <div id="preView" class="preViewCl">
    <? echo $imgtags;?>
    </div>
</div>

</body>
</html>