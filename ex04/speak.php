<?php

session_start();

if (!($_SESSION['loggued_on_user']) || $_SESSION['loggued_on_user'] === '')
		exit("ERROR\n");
else
{
	if ($_POST['msg'])
	{
		$path = '../private/';
		$file = '../private/chat';

		if (file_exists($path) === FALSE)
			mkdir($path);
		if (file_exists($file) === FALSE)
			file_put_contents($file, null);


		$fp = fopen($file, 'r+');

		if (flock($fp, LOCK_EX))
		{
			$data = file_get_contents($file);
			$arr = unserialize($data);
			$arr[] = [
				'login' => $_SESSION['loggued_on_user'],
				'time' => time(),
				'msg' => $_POST['msg']
			];
			$data = serialize($arr);
			file_put_contents($file, $data);
			flock($fp, LOCK_UN);
		}
		else
		{
			echo "File is locked\n";
		}
		fclose($fp);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
</head>
<body>
	<form action="" method="post">
		<input type="text" name="msg" placeholder="Message" />
		<button type="submit">Send</button>
	</form>
</body>
</html>
