<?php
    // session_start();
    $_SESSION = ['1' => 0, '3' => 0, '4' => 0, '5' => 0];
    // var_dump($_SESSION);

	foreach ($_GET as $id => $count) {
        // var_dump($id);
        // var_dump($count);
    	$_SESSION[$id] += $count;
        };
	header ('location: index.php');



