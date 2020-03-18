<?php

function return_error()
{
	echo "ERROR\n";
	exit();
}

if ($_POST['submit'] !== 'OK' || !$_POST['login'] || !$_POST['passwd'])
{
	return_error();
}
else
{
	$path = '../private/';
	$file = '../private/passwd';

	if (file_exists($path) === FALSE)
		mkdir($path);
	if (file_exists($file) === FALSE)
		touch($file);

	$user[login] = $_POST['login'];
	$user[passwd] = hash('sha256', 'suolaa' . $_POST['passwd']);

	$data = file_get_contents($file);
	$arr = unserialize($data);

	if (empty($arr))
		$arr = array($user);
	else
	{
		foreach($arr as $key => $value)
		{
			if ($value[login] === $user[login])
				return_error();
		}
		array_push($arr, $user);
	}

	$data = serialize($arr);
	file_put_contents($file, $data);
}

?>