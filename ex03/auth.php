<?php

function auth($login, $passwd)
{
	$file = '../private/passwd';
	$data = file_get_contents($file);
	$arr = unserialize($data);

	foreach($arr as $key => $value)
	{
		if ($value[login] === $login)
		{
			if ($value[passwd] === hash('sha256', 'suolaa' . $passwd))
			{
				return TRUE;
			}
			else
				return FALSE;
		}
	}
	return FALSE;
}

?>
