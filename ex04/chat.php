<?php

date_default_timezone_set('Europe/Helsinki');

$file = '../private/chat';
if (file_exists($file))
{
	$data = file_get_contents($file);
	$arr = unserialize($data);

	foreach($arr as $key => $value)
        echo "[" . date('h:i', $value['time']). "] <b>". $value['login'] . "</b>: " . $value['msg'] . "<br />\n";
}

?>