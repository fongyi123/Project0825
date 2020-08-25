<? session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<?
	echo "<pre>";
		print_r($_SESSION);
	echo "</pre>";
	
	echo "<pre>";
		print_r($_COOKIE);
	echo "</pre>";
?>

<form action="logout.php" method="post">
<input name="s" id="s" type="submit" value="登出" />
</form>

</body>
</html>