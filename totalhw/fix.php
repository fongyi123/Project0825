<?
	include("config.php");
	$_GET["number"];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>

<script>
$( document ).ready(function() {
  $(function() {
    $( document ).tooltip();
  });									//提示工具
	
  $(function() {
    $( "#birthday" ).datepicker({
	  changeMonth: true,
      changeYear: true
	});  
  });									//日期可用下拉式選取效
  
  $(".img").colorbox({rel:'img', transition:"elastic", width:"75%", height:"75%"});		//圖片黑幕效果
});
</script>

<style type="text/css">
.zipcode {
    font-size:16px;
	padding:8px;
	width:50px
}
.county {
	font-size:16px;
	padding:8px;
}
.district {
	font-size:16px;
	padding:8px;
}
	
</style>
</head>



<body>
<? 
	$sql = "select * from person where number = ".$_GET["number"];
	$result = mysql_query($sql) or die("MYSQL QUERY ERROR");
	$row = mysql_fetch_assoc($result);
/*
	echo "<pre>";
		print_r($row);
	echo "</pre>";
*/
?>
<form action="update.php" name="fm" id="fm" method="post" enctype="multipart/form-data">
<table width="90%" border="0" align="center">
  <tr>
    <td colspan="2" rowspan="5" align="center" width="25%">
	<? if($row["Image"] == "未上傳照片"){ ?>
    	<input name="file" id="file" type="file" />
	<? }else{?>
		<a href="http://127.0.0.1/totalhw/images/<? echo $row["Image"] ?>" class="img"><img src="http://127.0.0.1/totalhw/images/<? echo $row["Image"] ?>" height="200" width="300" /></a>
        <input name="file" id="file" type="file" />
	<? } ?>
    </td>
    <td align="right" width="10%">*員工編號</td>
    <td width="25%"><input name="id" id="id" type="text" placeholder="員工編號" style="font-size:16px;padding:8px;width:100%" title="請輸入您的員工編號(必填)" value="<? echo $row["Id"] ?>" /></td>
    <td align="right" width="10%">*生日(民國)</td>
    <td width="25%"><input name="birthday" id="birthday" type="text" placeholder="EX.67-09-12" style="font-size:16px;padding:8px;width:100%" title="請選擇您的生日(民國)(必填)" value="<? echo $row["Birthday"] ?>" /></td>
  </tr>
  <tr>
    <td align="right">*身份證號</td>
    <td><input name="id_card" id="id_card" type="text" placeholder="身份證號" style="font-size:16px;padding:8px;width:100%" title="請輸入您的身份證號(必填)" maxlength="10" value="<? echo $row["Id_Card"] ?>" /></td>
    <td align="right">家裡電話</td>
    <td><input name="telephone" id="telephone" type="text" placeholder="06-XXXXXXX" maxlength="10" style="font-size:16px;padding:8px;width:100%" maxlength="10" value="<? echo $row["Telephone"] ?>" /></td>
  </tr>
  <tr>
    <td align="right">工作性質</td>
    <td></td>
    <td align="right">手機</td>
    <td><input name="cellphone" id="cellphone" type="text" placeholder="09XXXXXXXX" maxlength="10" style="font-size:16px;padding:8px;width:100%" maxlength="10" value="<? echo $row["Cellphone"] ?>" /></td>
  </tr>
  <tr>
    <td align="right">*性別</td>
    <td>
    <? if($row["Sex"] == "男"){ ?>
    	<input name="sex" id="sex" type="radio" value="男" style="width:15px; height:15px;" checked="checked" />男<input name="sex" id="sex" type="radio" value="女" style="width:15px; height:15px;" />女
    <? }else{ ?>
    	<input name="sex" id="sex" type="radio" value="男" style="width:15px; height:15px;" />男<input name="sex" id="sex" type="radio" value="女" style="width:15px; height:15px;" checked="checked" />女
    <? } ?>
    </td>
    <td align="right">Email</td>
    <td><input name="email" id="email" type="text" placeholder="Email" style="font-size:16px;padding:8px;width:100%" value="<? echo $row["Email"] ?>" /></td>
  </tr>
  <tr>
    <td align="right">婚姻</td>
    <td>
    <? if($row["Wedding"] == "已婚"){ ?>
    	<input name="wedding" id="wedding" type="radio" value="已婚" style="width:15px; height:15px;" checked="checked" />已婚<input name="wedding" id="wedding" type="radio" value="未婚" style="width:15px; height:15px;" />未婚
    <? }else{ ?>
    	<input name="wedding" id="wedding" type="radio" value="已婚" style="width:15px; height:15px;" />已婚<input name="wedding" id="wedding" type="radio" value="未婚" style="width:15px; height:15px;"checked="checked" />未婚
    <? } ?>
    </td>
    <td align="right">通訊住址</td>
    <td>
	  <div id="twzipcode" style="display:inline;"><script type="text/javascript">
	  $(document).ready(function(){
		$('#twzipcode').twzipcode({
			'zipcodeSel'  : '<? echo $row["Letter_postal"] ?>',		//預設值
    		'countySel'   : '<? echo $row["Letter_city"] ?>',
		    'districtSel' : '<? echo $row["Letter_towns"] ?>',
			
			'countyName'   : 'letter_city',		//宣告名稱為letter_city
			'districtName' : 'letter_towns',
			'zipcodeName'  : 'letter_postal',
			'css': ['county', 'district', 'zipcode']
		});
	  });
	  </script></div>
	</td>
  </tr>
  <tr>
    <td align="right">*中文姓名</td>
    <td><input name="name" id="name" type="text" placeholder="中文姓名" style="font-size:16px;padding:8px;width:100%" title="請輸入您的中文姓名(必填)" value="<? echo $row["Name"] ?>" /></td>
    <td align="right">兵役</td>
    <td>
    <? if($row["Soldier"] == "未服役"){ ?>
    	<input name="soldier" id="soldier" type="radio" value="未服役" style="width:15px; height:15px;" checked="checked" />未服役<input name="soldier" id="soldier" type="radio" value="役畢" style="width:15px; height:15px;" />役畢<input name="soldier" id="soldier" type="radio" value="免役" style="width:15px; height:15px;" />免役
    <? }else if($row["Soldier"] == "役畢"){ ?>
    	<input name="soldier" id="soldier" type="radio" value="未服役" style="width:15px; height:15px;" />未服役<input name="soldier" id="soldier" type="radio" value="役畢" style="width:15px; height:15px;" checked="checked" />役畢<input name="soldier" id="soldier" type="radio" value="免役" style="width:15px; height:15px;" />免役
    <? }else{?>
    	<input name="soldier" id="soldier" type="radio" value="未服役" style="width:15px; height:15px;" />未服役<input name="soldier" id="soldier" type="radio" value="役畢" style="width:15px; height:15px;" />役畢<input name="soldier" id="soldier" type="radio" value="免役" style="width:15px; height:15px;" checked="checked" />免役
	<? } ?>
    </td>
    <td></td>
    <td><input name="letter" id="letter" type="text" placeholder="通訊住址" style="font-size:16px;padding:8px;width:100%" value="<? echo $row["Letter"] ?>" /></td>
  </tr>
  <tr>
    <td align="right">英文姓名</td>
    <td><input name="ename" id="ename" type="text" placeholder="英文姓名" style="font-size:16px;padding:8px;width:100%" value="<? echo $row["EName"] ?>" /></td>
    <td align="right">特殊身分</td>
    <td>
    <? 
		$u = "";
		$s = "";
//		print_r(explode(",",$row["Special"]));				//將字串轉為陣列
		$sp = explode(",",$row["Special"]);
		foreach($sp as $value){
			if($value == "原住民"){
				$u = "原住民";	
			}else if($value == "身心障礙者"){
				$s = "身心障礙者";	
			}
		}
		if($u == "原住民"){
    		echo "<input name='special[]' id='special[]' type='checkbox' value='原住民' style='width:15px; height:15px;' checked='checked' />原住民";
		}else{
			echo "<input name='special[]' id='special[]' type='checkbox' value='原住民' style='width:15px; height:15px;' />原住民";
		}
    	if($s == '身心障礙者'){
			echo "<input name='special[]' id='special[]' type='checkbox' value='身心障礙者' style='width:15px; height:15px;' checked='checked' />身心障礙者";
		}else{
    		echo "<input name='special[]' id='special[]' type='checkbox' value='身心障礙者' style='width:15px; height:15px;' />身心障礙者";
		}
	?>
    </td>
    <td align="right">戶籍地址</td>
    <td>
	  <div id="twzipcode1" style="display:inline;"><script type="text/javascript">
		$('#twzipcode1').twzipcode({
			'zipcodeSel'  : '<? echo $row["Address_postal"] ?>',		//預設值
    		'countySel'   : '<? echo $row["Address_city"] ?>',
		    'districtSel' : '<? echo $row["Address_towns"] ?>',
			
			'countyName'   : 'address_city',						//宣告名稱為address_city
			'districtName' : 'address_towns',
			'zipcodeName'  : 'address_postal',
			'css': ['county', 'district', 'zipcode']
		});
	  </script></div>
    </td>
  </tr>
  <tr>
    <td align="right">*任職狀態</td>
    <td><select name="office" id="office" style="font-size:16px;padding:8px;width:100%">
    <? if($row["Office"] == "在職"){ ?>
        <option value="在職" selected="selected">在職</option>
        <option value="無職">無職</option>
        <option value="學生">學生</option>
    <? }else if($row["Office"] == "無職"){ ?>
    	<option value="在職">在職</option>
        <option value="無職" selected="selected">無職</option>
        <option value="學生">學生</option>
    <? }else{ ?>
    	<option value="在職">在職</option>
        <option value="無職">無職</option>
        <option value="學生" selected="selected">學生</option>
    <? } ?>
    	
    </select></td>
    <td align="right">駕駛執照</td>
    <td>
    <? if($row["Driver1"] == "機車"){ ?>
    	<input name="driver1" id="driver1" type="checkbox" value="機車" style="width:15px; height:15px;" checked="checked" />機車
	<? }else{ ?>
    	<input name="driver1" id="driver1" type="checkbox" value="機車" style="width:15px; height:15px;" />機車
    <? } ?>
    <? if($row["Driver2"] == "汽車"){ ?>
    	<input name="driver2" id="driver2" type="checkbox" value="汽車" style="width:15px; height:15px;" checked="checked" />汽車
    <? }else{ ?>
    	<input name="driver2" id="driver2" type="checkbox" value="汽車" style="width:15px; height:15px;" />汽車
    <? } ?>
    <? if($row["Driver3"] == "貨車"){ ?>
    	<input name="driver3" id="driver3" type="checkbox" value="貨車" style="width:15px; height:15px;" checked="checked" />貨車
	<? }else{ ?>
    	<input name="driver3" id="driver3" type="checkbox" value="貨車" style="width:15px; height:15px;" />貨車	<? } ?>
    </td>
    <td></td>
    <td><input name="address" id="address" type="text" placeholder="戶籍地址" style="font-size:16px;padding:8px;width:100%" value="<? echo $row["Address"] ?>" /></td>
  </tr>
  <tr>
    <td align="right">國籍</td>
    <td>
    <select name="country" id="country" style="font-size:16px;padding:8px;width:100%">
	<? if($row["Country"] == "台灣"){ ?>
    	<option value="台灣" selected="selected">台灣</option>
        <option value="日本">日本</option>
        <option value="美國">美國</option>
        <option value="韓國">韓國</option>
    <? }else if($row["Country"] == "日本"){ ?>
    	<option value="台灣">台灣</option>
        <option value="日本" selected="selected">日本</option>
        <option value="美國">美國</option>
        <option value="韓國">韓國</option>
    <? }else if($row["Country"] == "美國"){ ?>
    	<option value="台灣">台灣</option>
        <option value="日本">日本</option>
        <option value="美國" selected="selected">美國</option>
        <option value="韓國">韓國</option>
    <? }else{ ?>
    	<option value="台灣">台灣</option>
        <option value="日本">日本</option>
        <option value="美國">美國</option>
        <option value="韓國" selected="selected">韓國</option>
    <? } ?>
    </select></td>
    <td></td>
    <td>
    <? if($row["Driver4"] == "大客車"){ ?>
    	<input name="driver4" id="driver4" type="checkbox" value="大客車" style="width:15px; height:15px;" checked="checked" />大客車
	<? }else{ ?>
    	<input name="driver4" id="driver4" type="checkbox" value="大客車" style="width:15px; height:15px;" />大客車
	<? } ?>
    </td>
    <td align="right">緊急聯絡</td>
    <td><input name="person" id="person" type="text" placeholder="緊急聯絡人" style="font-size:16px;padding:8px;width:120px" value="<? echo $row["Person"] ?>" />&nbsp;<input name="connection" id="connection" type="text" placeholder="連絡電話" maxlength="10" style="font-size:16px;padding:8px;width:100px" maxlength="10" value="<? echo $row["Connection"] ?>" /></td>
  </tr>
  <tr>
  	<td colspan="6" align="center"><input name="add" id="add" type="submit" value="修改" /></td>
  </tr>
</table>

<input name="number" id="number" type="hidden" value="<? echo $row["number"] ?>" />
</form>


</body>
</html>