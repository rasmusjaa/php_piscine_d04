<?php

if ($_POST['submit'] !== 'OK' || !$_POST['login'] || !$_POST['oldpw']|| !$_POST['newpw'])
	exit("ERROR\n");
else
{
	$file = '../private/passwd';
	$user = $_POST['login'];

	$data = file_get_contents($file);
	$arr = unserialize($data);

	foreach($arr as $key => $value)
	{
		if ($value['login'] === $user)
		{
			if ($value['passwd'] === hash('sha256', 'suolaa' . $_POST['oldpw']))
			{
				$arr[$key]['passwd'] = hash('sha256', 'suolaa' . $_POST['newpw']);
				$data = serialize($arr);
				file_put_contents($file, $data);
				echo "OK\n";
				header('Location: index.html');
				exit();
			}
			else
				exit("ERROR\n");
		}
	}
	exit("ERROR\n");
}

?>