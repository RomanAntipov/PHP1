<?php
	session_start();
	$login = '';
	$password = '';

	if (isset($_POST['login'], $_POST['password'])) {

	$login = $_POST['login'];
	$password = $_POST['password'];
	};
	var_dump($login);
	var_dump($password);
?>