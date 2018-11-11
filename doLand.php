<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>数据库查询</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
<div id="land1">
<form action="" method="post">
<label>用户姓名:</label>
<input name="text_tiaojian" type="text" />
<input name="btn_sel" type="submit" value="查询" class="btn1" />
<input name="btn_ins" type="submit" value="插入" class="btn" />
</form>
</div>
<?php
require("public.php");
if(isset($_POST["btn_sel"])){
	$tiaojian=$_POST["text_tiaojian"];
	//$user=$_COOKIE["userent"];
	//setcookie('userent','$tiaojian');
	$user=$_COOKIE["userent"];
	$sql="select   *  from  addressList  where username_zmh='".$user."'";
	if($tiaojian!=""&&$tiaojian!=null){		
		$sql.="and name_zmh like '%".$tiaojian."%'";	
	}
//创建表格，链接数据库
$query=mysql_query($sql);
echo"<div class='table1'>";
echo"<table  class='altrowstable'>";
 echo "<tr class='tatr1'>";
  	echo "<td>" . "用户名" . "</td>";
	echo "<td>" . "昵称" . "</td>";
	echo "<td>" . "手机号" . "</td>";
	echo "<td>" . "邮箱" . "</td>";
	echo "<td>" . "QQ号" . "</td>";
	echo "<td>" . "操作1" . "</td>";
	echo "<td>" . "操作2" . "</td>";
  	echo "</tr>";

while($row=mysql_fetch_array($query))
 {
    echo "<tr>";
  	echo "<td>" . $row['name_zmh'] . "</td>";
	echo "<td>" . $row['Nickname_zmh'] . "</td>";
	echo "<td>" . $row['phone_zmh'] . "</td>";
	echo "<td>" . $row['Email_zmh'] . "</td>";
	echo "<td>" . $row['qq_zmh'] . "</td>";
	echo "<td>"."<a href='http://localhost/php/update.php?id=". $row['Id']."' >修改</a>"."</td>";
	echo "<td>"."<a href='http://localhost/php/delete.php?id=". $row['Id']."' >删除</a>"."</td>";
  	echo "</tr>";
 }
echo "</table>";
echo "</div>";	
}
if (isset($_POST["btn_ins"])){
mysql_close(); //关闭MySQL连接
header("Location: http://localhost/php/insert.php"); 
exit;
}
?>
</body>
</html>