<?
	include("config.php");
	include("lib/php/page/MY_Pagination.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>無標題文件</title>

<script>
	$(document).ready(function(){
		$(".img").colorbox({rel:'img', transition:"elastic", width:"75%", height:"75%"});
	});	//圖片黑幕效果
</script>

</head>
<style type="text/css">
.pagination li{
	display: inline;
	font-weight: bold;
	margin-right: 20px;
}
</style>
<body>

<? 

	$sql = "select * from person"; 
	$result = mysql_query($sql) or die("MYSQL query Error");
	
	$total = mysql_num_rows($result);
	
	$pagination = new MY_Pagination;
/*
	echo "<pre>";
		print_r($pagination);
	echo "</pre>";
*/
	if(isset($_GET['page']) )
	{
		$page = $_GET['page'];
			} else {
		$page = 1;
	}
	
	$admin_limit = 5;
	
	$pagination->total = $total;
	$pagination->page = $page;
	$pagination->limit = $admin_limit;
//	$pagination->text = "";						//隱藏Showing 6 to 6 of 6 (2 Pages)
	$pagination->style_links = "yy";

	$url = "";
	$url .= 'http://127.0.0.1/?folder=totalhw&file=exam&page={page}';
//	$url .= '&a=1';

	$pagination->url = $url;

//	echo $_GET["a"];
	
	$start = ($page - 1) * $admin_limit;
	
    $sql = "SELECT * FROM person limit ".$start.",5";
	$result = mysql_query($sql) or die('MySQL query error');


    $sql = "SELECT * FROM person ";						//搜尋
	if(isset($_POST["Id"])){
		$sql .= "where Id like '%".$_POST["Id"]."%' ";
		$sql .= "limit ".$start.",5";
	}else{
		$sql .= "limit ".$start.",5";
	}
	
	$result = mysql_query($sql) or die("MYSQL query Error");
?>
<form action="http://127.0.0.1/?folder=totalhw&file=exam" method="post" id="f" name="f">
<input name="Id" id="Id" type="text" placeholder="搜尋員工編號"><br/>
<input name="su" id="su" value="搜尋" type="submit" class="btn btn-default">
</form>

<table width="200%" border="1" class="container-fluid">
  <tr align="center">
  	<td></td>
    <td></td>
    <td>圖片</td>
    <td>員工編號</td>
    <td>中文姓名</td>
    <td>英文姓名</td>
    <td>性別</td>
    <td>身份證號</td>
    <td>任職狀態</td>
    <td>國籍</td>
    <td>生日</td>
    <td>家裡電話</td>
    <td>手機</td>
    <td>Email</td>
    <td>通訊城市</td>
    <td>通訊區域</td>
    <td>通訊郵遞區號</td>
    <td>通訊住址</td>
    <td>戶籍城市</td>
    <td>戶籍區域</td>
    <td>戶籍郵遞區號</td>
    <td>戶籍地址</td>
    <td>緊急聯絡人</td>
    <td>連絡電話</td>
    <td>婚姻</td>
    <td>兵役</td>
    <td>特殊身分</td>
    <td>駕駛執照</td>
  </tr>
  <?
  	while($row = mysql_fetch_assoc($result)){
  ?>
  <tr>
    <td align="center"><a href="http://127.0.0.1/totalhw/testfix.php?totalhw=totalhw&exam=exam&number=<? echo $row["number"] ?>">編輯</a></td>
    <td align="center"><a href="totalhw/delete.php?number=<? echo $row["number"] ?>">刪除</a></td>
    <td width="150" align="center"><? 
		if($row["Image"] == "未上傳照片"){
			echo "未上傳照片";
		}else{
			echo "<a class='img' href='totalhw/images/".$row["Image"]."'><img src= totalhw/images/".$row["Image"]." width='150' height='100' class='img-responsive' alt='Responsive image' /></a>";
		};
	?></td>
    <td><? echo $row["Id"] ?></td>
    <td><? echo $row["Name"] ?></td>
    <td><? echo $row["EName"] ?></td>
    <td><? echo $row["Sex"] ?></td>
    <td><? echo $row["Id_Card"] ?></td>
    <td><? echo $row["Office"] ?></td>
    <td><? echo $row["Country"] ?></td>
    <td><? echo $row["Birthday"] ?></td>
    <td><? echo $row["Telephone"] ?></td>
    <td><? echo $row["Cellphone"] ?></td>
    <td><? echo $row["Email"] ?></td>
    <td><? echo $row["Letter_city"] ?></td>
    <td><? echo $row["Letter_towns"] ?></td>
    <td><? echo $row["Letter_postal"] ?></td>
    <td><? echo $row["Letter"] ?></td>
    <td><? echo $row["Address_city"] ?></td>
    <td><? echo $row["Address_towns"] ?></td>
    <td><? echo $row["Address_postal"] ?></td>
    <td><? echo $row["Address"] ?></td>
    <td><? echo $row["Person"] ?></td>
    <td><? echo $row["Connection"] ?></td>
    <td><? echo $row["Wedding"] ?></td>
    <td><? echo $row["Soldier"] ?></td>
    <td><? echo $row["Special"] ?></td>
    <td><? echo $row["Driver1"] ?>　<? echo $row["Driver2"] ?>　<? echo $row["Driver3"] ?>　<? echo $row["Driver4"] ?></td>
 	
  </tr>
  <?
	}
  ?>
</table>
  	<form action="http://127.0.0.1/totalhw/testfix.php?totalhw=totalhw&exam=exam" method="post" name="test" id="test">
  		<br />
        <input name="sub" id="sub" value="新增" type="submit" class="btn btn-default" />
  	</form>
<table align="center">
	<tr>
   	  <td align="center"><? echo $pagination->render(); ?></td>
    </tr>
</table>

</body>
</html>