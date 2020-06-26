<?php

session_start();
include 'auth.php';

if (!$_POST['login'] || !$_POST['passwd'])
	exit("ERROR\n");
if (auth($_POST['login'], $_POST['passwd']))
	$_SESSION['loggued_on_user'] = $_POST['login'];
else
{
	$_SESSION['loggued_on_user'] = '';
	exit("ERROR\n");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
    <iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
	<a href="logout.php">Log out</a>
</body>
</html>
