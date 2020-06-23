<?php

include 'auth.php';

function return_error()
{
	echo "ERROR\n";
	exit();
}

function return_ok()
{
	echo "OK\n";
	exit();
}

session_start();

if (!$_GET['login'] || !$_GET['passwd'])
	return_error();

if (auth($_GET['login'], $_GET['passwd']) === TRUE)
{
	$_SESSION['loggued_on_user'] = $_GET['login'];
	return_ok();
}	
else
{
	$_SESSION['loggued_on_user'] = '';
	return_error();
}

?>