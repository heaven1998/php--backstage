<style>
#form{
	width:400px;
	height:auto;
	background:linear-gradient(to bottom right, #FC3, #FFC);
	margin:0 auto;
}
#form h2{
	text-align:center;
	padding-top:30px;
}
#form label{
	float:left;
	display:block;
	width:70px;
	font-size:16px;
	text-align:center;
	margin-top:15px;
}
#form input{
	width:230px;
	height:30px;
	margin-top:15px;
}
#form .btn{
	width:100px;
	height:40px;
	background-color:#F30;
	margin-left:150px;
	border:none;
	margin-top:20px;
	margin-bottom:20px;
	color:#fff;
	font-size:16px;
}
</style>
<?php
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
require("preg.php");
?>
<div id="form">
<form action="" method="post">
<h2>用户注册</h2>
<label>用户名：</label>
<input name="text_name" type="text">
<?php

//验证用户名
if(isset($_POST["btn_tijiao"])){		
	$idd=trim($_POST["text_name"]);//用来去掉左右空格
	$object=new checkAll();
	$return_mess=$object->checkID($idd);
	echo $return_mess;
}
?>
<br>
<label>身份证：</label><input name="text_id" type="text">
<?php

//验证身份证
if(isset($_POST["btn_tijiao"])){
	$idd=trim($_POST["text_id"]);
	$object=new checkAll();
	$return_mess=$object->checkID($idd);
	echo $return_mess;
}
?>
<br>
<label>电话：</label><input name="text_phone" type="text">
<?php
//验证手机号
if(isset($_POST["btn_tijiao"])){
	$phonee=trim($_POST["text_phone"]);
	$object=new checkAll();
	$return_mess=$object->checkMobile($phonee);
	echo $return_mess;
}
?>
<br>
<label>邮箱：</label><input name="text_email" type="text">
<?php
//验证邮箱
if(isset($_POST["btn_tijiao"])){
	$emaill=trim($_POST["text_email"]);
	$object=new checkAll();
	$return_mess=$object->checkEmail($emaill);
	echo $return_mess;
}
?>
<br>
<label>QQ号：</label><input name="text_qq" type="text">
<?php
//验证邮箱
if(isset($_POST["btn_tijiao"])){
	$qq=trim($_POST["text_qq"]);
	$object=new checkAll();
	$return_mess=$object->checkEmail($qq);
	echo $return_mess;
}
?>
<br>
<label>网址：</label><input name="text_url" type="text">
<?php
//验证邮箱
if(isset($_POST["btn_tijiao"])){
	$url=trim($_POST["text_url"]);
	$object=new checkAll();
	$return_mess=$object->checkEmail($url);
	echo $return_mess;
}
?>
<br>
<br>
<label>密码：</label>
<input name="text_pass" type="password" />
<?php
//验证密码
if(isset($_POST["btn_tijiao"])){
	$password=trim($_POST["text_pass"]);
	$object=new checkAll();
	$return_mess=$object->checkPassword($password);
	echo $return_mess;
}
?>
<br>
<input name="btn_tijiao" type="submit" value="提交" class="btn">
</form>
</div>