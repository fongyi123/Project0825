<?
	session_start();
	header("Content-Type:text/html; charset=utf-8");
	
	unset($_SESSION["result"]);				//session單筆刪除
	unset($_SESSION["username"]);
	unset($_SESSION["password"]);
	session_destroy();						//session全部刪除
	
	setcookie("name","");					//cookie刪除
	
	header("Refresh:2; URL = login.php");
	echo "登出成功，兩秒後轉至登入頁面";

?>