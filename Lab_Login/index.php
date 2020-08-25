<?php 
session_start();
if (isset($_SESSION["uid"])){
  $userName = $_SESSION["uid"];
}  
else{
  $userName = "Guest";
}

// if (isset($_COOKIE["uid"])){
//   $userName = $_COOKIE["uid"];
// }  
// else{
//   $userName = "Guest";
// } 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<style>
body {
  background-color: lightblue;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Lab - index</title>
</head>
<body>

<table width="500" height="200" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2" style="background-color:Violet;">
  <tr>
    <td align="center" bgcolor="#CCCCCC" style="background-color:SlateBlue;"><font color="#FFFFFF" >會員系統 - 首頁</font></td>
  </tr>
  <tr>
  <?php if ($userName == "Guest") { ?>
    
    <td align="center"><font color="#FFFFFF"><a href="login.php"><font color="#FFFFFF">登入</a> |
    <?php } else { ?>
    <td align="center"><a href="login.php?logout=1"><font color="#FFFFFF">登出</a> | 
    <?php } ?>   
    <a href="secret.php"><font color="#FFFFFF">會員專用頁</a></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC" style="background-color:SlateBlue;"><font color="#FFFFFF" ><?= "Welcome! " .$userName ?></td>
  </tr>
</table>


</body>
</html>