<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改更新数据</title>
</head>

<style>
body{
	background-image:url(img/bk1.jpg);
	background-repeat:no-repeat;
}

#land{
	width:450px;
	height:auto;
	border:1px dashed #fff;
	margin:0 auto;
	margin-top:100px;
}
#land form{
	margin-left:40px;
}
#land h2{
	text-align:center;
	padding-top:30px;
	color:#fff;
}
#land label{
	float:left;
	display:block;
	width:100px;
	font-size:16px;
	text-align:center;
	margin-top:23px;
	color:#fff;
}
#land input{
	width:200px;
	height:30px;
	margin-top:15px;
	
}
#land .btn{
	width:120px;
	height:30px;
	background-color:#C39;
	margin-left:150px;
	border:none;
	margin-top:20px;
	margin-bottom:20px;
	color:#FFF;
	font-size:16px;
	border-radius:5px 5px;
}

 .img1{
	width:60px;
	height:30px;
	margin-left:10px;
}
</style>
<body>
<div id="land">
<h2>管理员修改</h2>

<?php
$code = $_GET["id"];
require("public.php");
require("preg.php");//where ID='".$code."'
$mySql = "select * from addresslist ";
$result = mysql_query($mySql);
$row = mysql_fetch_array($result);
?>


<form action="" method="post">
<label>修改姓名：</label>
<input name="txt_user" type="text" 
value="<?php echo $row['name_zmh']; ?>"
/>
	<?php
    if(isset($_POST["btn_sumbit"])){
    //验证用户名
     if($_POST["txt_user"]!==""||$_POST["text_username"]!==null){	 	
        $object=new checkAll();
        $return_mess=$object->checkName($_POST["txt_user"]);
        echo $return_mess;
        }
    }
    ?>
<br />

<label>修改手机：</label>
<input name="txt_shouji" type="text" 
value="<?php echo $row['phone_zmh']; ?>"/>
	<?php
    //验证手机号
    if(isset($_POST["btn_sumbit"])){
        if($_POST["txt_shouji"]!=""){
            $object=new checkAll();
            $return_mess=$object->checkMobile($_POST["txt_shouji"]);
            echo $return_mess;
            }
    }
    ?>
<br />
<label>修改qq：</label>
<input name="txt_qq" type="text" 
value="<?php echo $row['qq_zmh']; ?>"/>
	<?php
    //验证qq
    if(isset($_POST["btn_sumbit"])){
        if($_POST["txt_qq"]!=""){
            $object=new checkAll();
            $return_mess=$object->checkQQ($_POST["txt_qq"]);
            echo $return_mess;
            }
    }
    ?>

<br />
<label>修改邮箱：</label>
<input name="txt_email" type="text"
value="<?php echo $row['Email_zmh']; ?>"/>

<?php
//验证邮箱
if(isset($_POST["btn_sumbit"])){
	if($_POST["txt_email"]!=""){
		$object=new checkAll();
		$return_mess=$object->checkEmail($_POST["txt_email"]);
		echo $return_mess;
		}
}
?>
<br />

<input name="btn_sumbit" type="submit" value="修改"  class="btn"/>

</form>
</div>

<?php
if(isset($_POST["btn_sumbit"])){
	
	$a = $_GET['id'];
 
	$username=$_POST["txt_user"];
	$phone=$_POST["txt_shouji"];
	$qq=$_POST["txt_qq"];
	$email=$_POST["txt_email"];
	if($username==""|| $username==null){
			alert_info("用户名不能为空");	
			
		}	
		else{				
			if($phone==""|| $phone==null){
				alert_info("手机号不能为空");				
			}
			
			else{
				if($qq==""|| $qq==null){
					alert_info("QQ号不能为空");
				}
				else{
					if($email==""|| $email==null){
						alert_info("邮箱不能为空");
					}					
					else{ 					
						$sql = "UPDATE  addresslist SET name_zmh='".$_POST["txt_user"]."',phone_zmh='".$_POST["txt_shouji"]."',qq_zmh='".$_POST["txt_qq"]."',Email_zmh='".$_POST["txt_email"]."' where Id='".$a."'"; 
						$query=mysql_query($sql);//提交$sql到数据库
						mysql_close(); //关闭MySQL连接
					 	header("Location: http://localhost/php/chaxun.php"); 
					 	exit;
				
					}
					
				}
					
			}
		
		}

}
//弹出框
function alert_info($str){
	echo"<script>alert('$str')</script>";
	}
?>


</body>
</html>