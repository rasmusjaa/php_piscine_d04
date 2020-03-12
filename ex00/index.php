<?php
if ($_GET['login'])
{
	$login = $_GET['login'];
	echo "login $login\n";
}
if ($_GET['passwd'])
{
	$pw = $_GET['passwd'];
	echo "password $pw\n";
}
if ($_GET['submit'] && $_GET['submit'] === 'OK')
{
	$submit = $_GET['submit'];
	echo "submit $submit\n";
}
?>
<html><body>
<form method="get">
Username: <input type="text" name="login" value="<?= $login?>" />
<br />
Password: <input type="text" name="password" value="<?= $pw?>" />
<input type="submit" name="submit" value="<?= $submit?>" />
</form>
</body></html>
