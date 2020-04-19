<?php

if ($_POST['submit'] !== 'OK' || !$_POST['login'] || !$_POST['passwd'])
	exit("ERROR\n");
else
{
	$path = '../private/';
	$file = '../private/passwd';

	if (!file_exists($path))
		mkdir($path);
	if (file_exists($file))
	{
		$data = file_get_contents($file);
		$arr = unserialize($data);
	}
	foreach($arr as $key => $value)
	{
		if ($value['login'] === $_POST['login'])
			exit("ERROR\n");
	}

	$arr[] = [
		'login' => $_POST['login'],
		'passwd' => hash('sha256', 'suolaa' . $_POST['passwd'])
	];

	$data = serialize($arr);
	file_put_contents($file, $data);
	echo "OK\n";
	header('Location: index.html');
}

?>