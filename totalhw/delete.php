<?
	include("config.php");
	$_GET["number"];

	/*
	echo "<pre>";
		print_r($db);
	echo "</pre>";
	*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<?  /*
	$sql = "DELETE FROM person WHERE number = '".$_GET["number"]."'";
	$result = mysql_query($sql) or die("MYSQL QUERY ERROR");
	*/
	$sql = "select * from person where number = ".$_GET["number"];
	$result = mysql_query($sql) or die("MYSQL QUERY ERROR");
	$row = mysql_fetch_assoc($result);
//	echo $sql;
//	echo $row["Image"];
	if($row["Image"] != "未上傳檔案"){
		$server_path = dirname(__FILE__)."/images";
		unlink($server_path.'/'.$row['Image']);
	}else{
		@unlink;
	}
	
	$sql = $db -> execute("DELETE FROM person WHERE number = ".$_GET["number"]);
	$db->execute($sql);
	

	header("Location: http://127.0.0.1/?totalhw=totalhw&exam=exam");
	exit;

?>



</body>
</html>