<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>插入数据</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
<?php
require("public.php");
require("preg.php");
$sql_role="select * from addresslist";
$query1=mysql_query($sql_role);//提交$sql到数据库

?>
<div id="land1">
<h2>管理员插入数据</h2>
<form action="" method="post">

<label>姓名：</label>
<input name="txt_user" type="text" />
<?php
if(isset($_POST["btn_sumbit"])){
//验证手机
 if($_POST["txt_user"]!==""||$_POST["txt_user"]!==null){	 	
	$object=new checkAll();
	$return_mess=$object->checkName($_POST["txt_user"]);
	echo $return_mess;
	}
}
?>
<br />

<label>昵称：</label>
<input name="txt_Nickname" type="text" /><br />

<label>手机：</label>
<input name="txt_shouji" type="text" />
<?php
if(isset($_POST["btn_submit"])){
//验证手机
 if($_POST["txt_shouji"]!==""||$_POST["txt_shouji"]!==null){	 	
	$object=new checkAll();
	$return_mess=$object->checkMobile($_POST["txt_shouji"]);
	echo $return_mess;
	}
}
?>
<br />
<label>qq：</label>
<input name="txt_qq" type="text" /><br />
<label>邮箱：</label>
<input name="txt_email" /><br />

<input name="btn_sumbit" type="submit" value="插入"  class="btn"/>

</form>
</div>
<?php
	
	if(isset($_POST["btn_sumbit"]))
	{
		
	$guanLiyuan = $_COOKIE['userent'];
	$sql = "insert into addresslist (username_zmh,name_zmh,Nickname_zmh,phone_zmh,qq_zmh,Email_zmh) values ('".$guanLiyuan."','".$_POST["txt_user"]."','".$_POST["txt_Nickname"]."','".$_POST["txt_shouji"]."','".$_POST["txt_qq"]."','".$_POST["txt_email"]."')";  
	if($_POST["txt_user"]==""){
		 alert_info("用户名不存在");
		}
		else if($_POST["txt_shouji"]==""){
		 alert_info("手机不能为空");
		}
		else if($_POST["txt_qq"]==""){
		 alert_info("QQ不能为空");
		}
		else if($_POST["txt_email"]==""){
		 alert_info("邮箱不能为空");
		}
		else{
		 mysql_query($sql);   
		 mysql_close(); //关闭MySQL连接
		 header("Location: http://localhost/php/chaxun.php"); 
		 exit;
	   }
	}
	//弹出框
	function alert_info($str){
		echo"<script>alert('$str')</script>";
		}
?>

</body>
</html>