<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
	<meta charset="UTF-8" />
	<title>完善个人信息</title>
    <link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="easyui/demo/demo.css" />
	<link rel="stylesheet" href="easyui/themes/icon.css"/>
	<link rel="stylesheet" href="easyui/themes/black/easyui.css" />
	<script type="text/javascript" src="easyui/jquery.min.js"></script>
	<script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>
    <!--百度编辑器js-->
    <script type="text/javascript" charset="utf-8" src="utf8-php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="utf8-php/ueditor.all.min.js"> </script>
    <!--加载语言集合（不是必须，针对加载中文失败的情况）-->
    <script type="text/javascript" charset="utf-8" src="utf8-php/lang/zh-cn/zh-cn.js"></script>


	
</head>
<body>
<div id="land1">
<h2>完善个人信息</h2>

<form action="" method="post">


<label>用户名：</label>
<input name="text_username" type="text" />
<?php
if(isset($_POST["btn_submit"])){
//验证用户名
 if($_POST["text_username"]!==""||$_POST["text_username"]!==null){	 	
	$object=new checkAll();
	$return_mess=$object->checkName($_POST["text_username"]);
	echo $return_mess;
	}
}
?>
<br />
<label>身份证：</label>
<input name="text_idcard" type="text" />
<?php
if(isset($_POST["btn_submit"])){
//验证用户名
 if($_POST["text_idcard"]!==""||$_POST["text_idcard"]!==null){	 	
	$object=new checkAll();
	$return_mess=$object->checkID($_POST["text_idcard"]);
	echo $return_mess;
	}
}
?>
<br />
<label>手机号：</label>
<input name="text_phone" type="text" />
<?php
if(isset($_POST["btn_submit"])){
//验证用户名
 if($_POST["text_phone"]!==""||$_POST["text_phone"]!==null){	 	
	$object=new checkAll();
	$return_mess=$object->checkMobile($_POST["text_phone"]);
	echo $return_mess;
	}
}
?>
<br />
<div class="dd">
<label>出生年月：</label>
<input class="easyui-datebox" data-options="formatter:myformatter,parser:myparser" name="text_date"/>
</div>
<p class="vv">个人简介：</p>
<script id="container" name="rongqi" type="text/plain" style="width:380px;height:200px;">
</script> 
<input name="btn_sumbit" type="submit" value="提交"  class="btn" id="submit"

/>	

<!--<label>个人简介：</label>
<input name="text_username" type="text" /><br />-->

 

</form>
</div>
<?php


//取cookle
$use=$_COOKIE["userent"];
if(isset($_POST['btn_sumbit'])){
include("public.php");
//验证是不是第一次登陆信息
$username=$_POST["text_username"];
$idCard=$_POST["text_idcard"];
$phone=$_POST["text_phone"];
$date=$_POST["text_date"];
$sql="insert into personal (username,idcard,phone,date)
     values('".$use."','".$phone."','".$idCard."','".$date."')";
$pd=mysql_query($sql);


//把数据放到网页中呈现
	if($username==""){
	 alert_info("用户名不能为空");
	}
	else if($idCard==""){
	 alert_info("身份证不能为空");
	}
	else if($idCard==""){
	 alert_info("手机号不能为空");
	}
	else{
		
		mysql_close(); //关闭MySQL连接
		header("Location: http://localhost/php/chaxun.php"); 
		exit;
}
}


function alert_info($str){
	echo"<script>alert('$str')</script>";
	}

?>


<script type="text/javascript">
 
		function myformatter(date){
			var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
		}
		function myparser(s){
			if (!s) return new Date();
			var ss = (s.split('-'));
			var y = parseInt(ss[0],10);
			var m = parseInt(ss[1],10);
			var d = parseInt(ss[2],10);
			if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
				return new Date(y,m-1,d);
			} else {
				return new Date();
			}
		}
	</script> 
	 
	<script type="text/javascript"> 
    /*var ue = UE.getEditor('container');*/ 

	var ue = UE.getEditor('container', {
    autoHeight: false
});

 </script> 
 

 
</body>


	
</html>


