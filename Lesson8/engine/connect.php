<?php

function getUser($login) {

    $mysql = mysqli_connect('localhost', 'root', '', 'webshop');

    $query = sprintf('SELECT * FROM users WHERE login="%s" LIMIT 1', $login);

    $mysql_query = mysqli_query($mysql, $query);

    $user = NULL;

    while ($row = mysqli_fetch_assoc($mysql_query)) {
        $user[] = $row;
    }

    mysqli_close($mysql);

    return $user[0];
}