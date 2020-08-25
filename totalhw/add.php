<?
	include("config.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>

<style type="text/css">
#form table tr #text{
	font-size:24px;
	color:#F00;
}
</style>
</head>

<body>

<?
	/*
	echo "<pre>";
		print_r($db);
	echo "</pre>";
	
	echo "<pre>";
		print_r($_FILES);
	echo "</pre>";
	*/
	
//	$server_path = "C:/xampp/htdocs/totalhw/images";
//	echo dirname(__FILE__)."/";							//自動抓取上層目錄
	$server_path = dirname(__FILE__)."/images";
	$ext = pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
	$current_date = date("Y-m-d");	
	if(!file_exists("images/".$current_date)){
		mkdir("images/".$current_date);
	}
	if(empty($_FILES["file"]["name"])){
		$file = "未上傳照片";
	}else{
		$file = $current_date."/".time().".".$ext;
		move_uploaded_file($_FILES["file"]["tmp_name"],$server_path."/".$file);	//上傳圖片

	}
//	echo $server_path."/".$file;	//顯示路徑
	/*
	echo "<pre>";
		print_r($_POST);
	echo "</pre>";
	*/
	if(empty($_POST["ename"])){
		$ename = NULL;
	}else{
		$ename = $_POST["ename"];
	}
	if(empty($_POST["country"])){
		$country = NULL;
	}else{
		$country = $_POST["country"];
	}
	if(empty($_POST["telephone"])){
		$telephone = NULL;
	}else{
		$telephone = $_POST["telephone"];
	}
	if(empty($_POST["cellphone"])){
		$cellphone = NULL;
	}else{
		$cellphone = $_POST["cellphone"];
	}
	if(empty($_POST["email"])){
		$email = NULL;
	}else{
		$email = $_POST["email"];
	}
	if(empty($_POST["letter_city"])){
		$letter_city = NULL;
	}else{
		$letter_city = $_POST["letter_city"];
	}
	if(empty($_POST["letter_towns"])){
		$letter_towns = NULL;
	}else{
		$letter_towns = $_POST["letter_towns"];
	}
	if(empty($_POST["letter_postal"])){
		$letter_postal = NULL;
	}else{
		$letter_postal = $_POST["letter_postal"];
	}
	if(empty($_POST["letter"])){
		$letter = NULL;
	}else{
		$letter = $_POST["letter"];
	}
	if(empty($_POST["address_city"])){
		$address_city = NULL;
	}else{
		$address_city = $_POST["address_city"];
	}
	if(empty($_POST["address_towns"])){
		$address_towns = NULL;
	}else{
		$address_towns = $_POST["address_towns"];
	}
	if(empty($_POST["address_postal"])){
		$address_postal = NULL;
	}else{
		$address_postal = $_POST["address_postal"];
	}
	if(empty($_POST["address"])){
		$address = NULL;
	}else{
		$address = $_POST["address"];
	}
	if(empty($_POST["person"])){
		$person = NULL;
	}else{
		$person = $_POST["person"];
	}
	if(empty($_POST["connection"])){
		$connection = NULL;
	}else{
		$connection = $_POST["connection"];
	}
	if(empty($_POST["wedding"])){
		$wedding = NULL;
	}else{
		$wedding = $_POST["wedding"];
	}
	if(empty($_POST["soldier"])){
		$soldier = NULL;
	}else{
		$soldier = $_POST["soldier"];
	}
	$sp = "";
	if(empty($_POST["special"])){
		$special =NULL;
	}else{
		foreach($_POST["special"] as $value){		//陣列每個項目都執行過
			$sp .= ",".$value;
		}
//		echo "<br />".$sp."<br />";
		$special = substr($sp,1);
//		echo $special;
	}
	
	if(empty($_POST["driver1"])){
		$driver1 = NULL;
	}else{
		$driver1 = $_POST["driver1"];
	}
		if(empty($_POST["driver2"])){
		$driver2 = NULL;
	}else{
		$driver2 = $_POST["driver2"];
	}
		if(empty($_POST["driver3"])){
		$driver3 = NULL;
	}else{
		$driver3 = $_POST["driver3"];
	}
		if(empty($_POST["driver4"])){
		$driver4 = NULL;
	}else{
		$driver4 = $_POST["driver4"];
	}
	
	$text = "";
	
	if(empty($_POST["id"]) or empty($_POST["name"]) or empty($_POST["sex"]) or empty($_POST["id_card"]) or empty($_POST["office"]) or empty($_POST["birthday"])){
		$text .= "必填項目未填寫";
	}else{
		$id = $_POST["id"];
		$name = $_POST["name"];
		$sex = $_POST["sex"];
		$id_card = $_POST["id_card"];
		$office = $_POST["office"];
		$birthday = $_POST["birthday"];

		$prepare = $db->execute("select * from person");
		$table = array(
			'number' => NULL,
			'Id' => $id,
			'Name' => $name,
			'EName' => $ename,
			'Sex' => $sex,
			'Id_Card' => $id_card,
			'Office' => $office,
			'Country' => $country,
			'Birthday' => $birthday,
			'Telephone' => $telephone,
			'Cellphone' => $cellphone,
			'Email' => $email,
			'Letter_city' => $letter_city,
			'Letter_towns' => $letter_towns,
			'Letter_postal' => $letter_postal,
			'Letter' => $letter,
			'Address_city' => $address_city,
			'Address_towns' => $address_towns,
			'Address_postal' => $address_postal,
			'Address' => $address,
			'Person' => $person,
			'Connection' => $connection,
			'Wedding' => $wedding,
			'Soldier' => $soldier,
			'Special' => $special,
			'Driver1' => $driver1,
			'Driver2' => $driver2,
			'Driver3' => $driver3,
			'Driver4' => $driver4,
			'Image' => $file
		);
		
		$sql = $db->getInsertSql($prepare,$table);
		echo $sql;
		if ($db->execute($sql))
		 {
			echo "寫入成功"; 
			header('Location: exam.php');
			exit;
		} else {
			echo "寫入失敗"; 
		}
		
		/*		
		$sql = "insert into person values(null,'".$id."','".$name."','".$ename."','".$sex."','".$id_card."','".$office."','".$country."','".$birthday."','".$telephone."','".$cellphone."','".$email."','".$letter_city."','".$letter_towns."','".$letter_postal."','".$letter."','".$address_city."','".$address_towns."','".$address_postal."','".$address."','".$person."','".$connection."','".$wedding."','".$soldier."','".$special."','".$driver1."','".$driver2."','".$driver3."','".$driver4."','".$file."')";


		$result = mysql_query($sql) or die("MYSQL QUERY ERROR");
		$row = mysql_fetch_assoc($result);
		
		header('Location: exam.php');
		exit;*/
		
	}
?>
<form action="test.php" id="form" name="form" method="post">
<table width="100%" border="0" align="center">
  <tr align="center">
    <td id="text"><?
		echo $text;
	?></td>
  </tr>
  <tr align="center">
    <td><input name="back" id="back" type="submit" value="回上一頁" /></td>
  </tr>
</table>
</form>



</body>
</html>