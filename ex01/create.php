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
	if (file_exists($file) === TRUE)
	{
		$data = file_get_contents($file);
		$arr = unserialize($data);
	}
	$last = -1;
	foreach($arr as $key => $value)
	{
		if ($value[login] === $_POST['login'])
			return_error();
		$last++;
	}
	$arr[$last + 1]['login'] = $_POST['login'];
	$arr[$last + 1]['passwd'] = hash('sha256', 'suolaa' . $_POST['passwd']);
	

	$data = serialize($arr);
	file_put_contents($file, $data);
	echo "OK\n";
}

?>