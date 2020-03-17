<?php

session_start();

if ($_GET['submit'] && $_GET['submit'] === 'OK')
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['pw'] = $_GET['passwd'];
}

?>
<html><body>
<form method="get">
Username: <input type="text" name="login" value="<?= $_SESSION['login']?>" />
<br />
Password: <input type="text" name="passwd" value="<?= $_SESSION["pw"]?>" />
<input type="submit" name="submit" value="OK" />
</form>
</body></html>
