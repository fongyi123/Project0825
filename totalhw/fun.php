<?php
$link   = mysql_connect('127.0.0.1', 'root', 'root') or die( mysql_error());//連接數據庫服務器
          mysql_select_db('xlxz');//選擇數據庫
          mysql_set_charset('utf8');//設置字符編碼

          $sql = "SELECT * FROM xlxz_cat_name";//查詢分類表

          $result = mysql_query($sql);
          $xlxz = array();//初始化一個數组
          while($row  = mysql_fetch_assoc($result))
          {
                $xlxz[$row['fid']][$row['id']] = $row['cat_name'];//創建分類數組
          }
            unset($row);

          mysql_close($link);//關閉數據庫

          var_dump($xlxz);//印出分類數组

echo "<br/>".'-------------------------------------------'."\n";

//遞迴函数

function for_category($ss = array(), $a2, $i = 1){
    echo "<ul>";
    foreach($ss as $k => $v){
        if(isset($a2[$k]) && is_array($a2[$k])){
			echo $i."<li>$k $v";
			$i++;
			for_category($a2[$k], $a2, $i);
            echo "</li>";
        	
		}
        else{
            echo $i."<li>$k $v</li>";
        }
		
    }
    echo "</ul>";
}

for_category($xlxz[0], $xlxz);


?>