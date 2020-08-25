<?
	include("lib/php/data/adodb5/adodb.inc.php");
	include("lib/js/Mounting.php");
	header("Content-Type:text/html; charset=utf-8");		//強制php轉碼
	$db = ADONewConnection('mysql');
	
	$dbhost = '127.0.0.1';
	$dbuser = 'test';
	$dbpass = 'test123';
	$dbtable = 'employees';
	$connect = $db -> Connect($dbhost, $dbuser, $dbpass, $dbtable);
	$db->setCharset('utf8');								//強制ADOdb轉碼
	
//	$connect = mysql_connect($dbhost,$dbuser,$dbpass) or die('Error with SQL connection');
//	mysql_select_db($dbtable);
/*
	mysql_query("set character set utf8",$connect);
	mysql_query("SET CHARACTER_SET_database= utf8",$connect);
	mysql_query("SET CHARACTER_SET_CLIENT= utf8",$connect);
	mysql_query("SET CHARACTER_SET_RESULTS= utf8",$connect);
	mysql_query("SET NAME 'utf8_general_ci'");
*/
?>