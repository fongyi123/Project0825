<?php
session_start();
if( isset( $_GET["logout"])){

  // setcookie("uid", "Guest",time() -60 * 60 * 24 * 7);
  $_SESSION["uid"]=$userName;
  echo $_SESSION["logout"];
  unset($_SESSION["logout"]);

  header("Location: index.php");
  exit();
}
if (isset($_POST["btnHome"])){
	header("Location: index.php");
	exit();
}

if (isset($_POST["btnOK"])){
  $userName = $_POST["txtUserName"];
  if (trim($userName) != ""){

    // setcookie("uid", $userName);
    $_SESSION["uid"]=$userName;
    echo $_SESSION["lastPage"];
    unset($_SESSION["lastPage"]);

    // 網頁紀錄憑證
    // if (isset($_COOKIE["lastPage"]))
    //   header(sprintf("Location: %s", $_COOKIE["lastPage"]));
    if (isset($_SESSION["lastPage"]))
      header(sprintf("Location: %s", $_SESSION["lastPage"]));
      
		else
		   header("Location: index.php");
    exit();
  }
}
?>

<html>
<head>
<style>
body {
  background-color: lightblue;
}

</style>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Lab - Login</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="login.php" >
  <table width="500" height="200" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2" style="background-color:Violet;">
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC" style="background-color:SlateBlue;"><font color="#FFFFFF">會員系統 - 登入</font></td>
    </tr>
    <tr>
      <td width="80" align="center" ><font color="#FFFFFF">帳號 :</td>
      <td><input type="text" name="txtUserName" id="txtUserName" pattern="\w{7,14}" required/></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline"><font color="#FFFFFF">密碼 :</td>
      <td valign="baseline"><input type="password" name="txtPassword" id="txtPassword" pattern="\w{7,14}" required/></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC" style="background-color:SlateBlue;"><font color="#FFFFFF" >
      <input type="submit" name="btnOK" id="btnOK" value="登入" />
      <input type="reset" name="btnReset" id="btnReset" value="重設" />
      <input type="submit" name="btnHome" id="btnHome" value="回首頁" />
      </td>
    </tr>
  </table>
</form>
</body>
</html>