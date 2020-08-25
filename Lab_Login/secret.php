<?php 
session_start();
// if (!isset($_COOKIE["uid"])){
if (!isset($_SESSION["uid"])){

  // setcookie("lastPage", "secret.php");
  $_SESSION["lastPage"]="secret.php";
    echo $_SESSION["lastPage"];
    unset($_SESSION["lastPage"]);

	header("Location: login.php");
	exit();	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<style>
body {
  background-color: lightblue;
}
td{
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Lag - Member Page</title>
</head>
<body>

<table width="500" height="200" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2" style="background-color:Violet;">
  <tr>
    <td align="center" bgcolor="#CCCCCC" style="background-color:SlateBlue;"><font color="#FFFFFF">會員系統 － 會員專用</font></td>
  </tr>
  <tr>
    <td align="center"><font color="#FFFFFF">歡迎來到會員專用頁</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC"style="background-color:SlateBlue;"><a href="index.php"><font color="#FFFFFF">回首頁</a></td>
  </tr>
</table>


</body>
</html>