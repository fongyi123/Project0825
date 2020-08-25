<? session_start(); 
header("Content-Type:text/html; charset=utf-8");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>員工人員管理系統
</p>
<p>帳號:root</p>
<p>密碼:root<?
/*	echo "<pre>";
		print_r($_SESSION);
	echo "</pre>";

	echo "<pre>";
		print_r($_COOKIE);
	echo "</pre>";*/

	if(isset($_POST["login"]) && !empty($_POST["user"]) && !empty($_POST["pass"])){
		if($_POST["user"] == "test" && $_POST["pass"] == "test"){
			$_SESSION["result"] = true;
			$_SESSION["username"] = $_POST["user"];
			$_SESSION["password"] = $_POST["pass"];
			
			setcookie("name",$_POST["user"]);
			
			header("Refresh:2; URL = scuess.php");
			echo "登入成功，2秒後跳入使用者介面";
			
		}else if($_POST["user"] == "root" && $_POST["pass"] == "root"){
			$_SESSION["result"] = true;
			$_SESSION["username"] = $_POST["user"];
			$_SESSION["password"] = $_POST["pass"];
			
//			header("Refresh:2; URL = ../?folder=totalhw&file=exam");
			header("Refresh:2; URL = http://127.0.0.1/?folder=totalhw&file=exam");
			echo "登入成功，2秒後跳入使用者介面";
			
		}else{
			echo "帳號或密碼有錯誤";
		}
	}


?>
  
</p>
<form action="<? echo $_SERVER["PHP_SELF"]; ?>" id="f" name="f" method="post">
	帳號：<input name="user" id="user" type="text" placeholder="請輸入帳號" /><br />
    密碼：<input name="pass" id="pass" type="password" placeholder="請輸入密碼" /><br />
    <input name="login" id="login" type="submit" value="登入" />
</form>


</body>
</html>