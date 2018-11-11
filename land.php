<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆页面</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
<div id="land1">
<h2>管理员登陆</h2>
<form action="" method="post">
<label>请输入姓名：</label>
<input name="txt_user" type="text" /><br />
<label>请输入密码：</label>
<input name="txt_password" type="password" /><br />
<label>请输验证码：</label>
<input name="txt_yzm" type="text" />
<img id="checkpic" onclick="changing();" src="yzm_new.php"  name="img_yzm"/>
<br />
<input name="btn_sumbit" type="submit" value="登录"  class="btn" id="submit"/>
<input type="button" class="btn1 btn-success" href="register.php" value="注册" id="submit1"
onclick='zhuce()'/>
</form>
</div>

<?php
session_start();
include("public.php");

?>
<?php

if(isset($_POST["btn_sumbit"]))
{
	 	
	$username=$_POST["txt_user"];
	$passwd=trim($_POST["txt_password"]);
	$yzm=$_POST["txt_yzm"];
	//$yzmImg=$_SESSION["img_yzm"];
	
	//存进cookie
	setcookie("userent","$username");
	
	
	
//把数据放到网页中呈现
	if($username==""){
	 alert_info("用户名不存在");
	}
	else if($passwd==""){
	 alert_info("密码不存在");
	}
	else if($yzm==""){
	 alert_info("验证码不能为空");
	}
	 else{
		 //确定表
		$sql="select * from userinfo where username_zmh='".$username."'";
		//提交$sql到mysql
		$query=mysql_query($sql);
		$row=mysql_fetch_array($query);	
		//print_r($row);
		if($username==trim($row['username_zmh']))
		{
			 if($passwd==trim($row['Password_zmh']))
			 {
				 if($yzm==$yzm){
					 //验证是不是第一次登陆信息
					 $panduan="select   *  from  personal where username ='".$username."' ";
					 $pd=mysql_query($panduan);
					 $row=mysql_fetch_array($pd);	
					 if($username==$row['username']){					  
					      header("Location: http://localhost/php/chaxun.php"); 
					      
						 }
					 else{
						  header("Location: http://localhost/php/personal.php"); 
						 
						} 
				 }
				 	//alert_info("登录成功");	
									
				/*}
				else{
				  alert_info("验证码错误");
				 }*/		
					
			 }
			 else
			 {
			 alert_info("密码错误");
			 }				 
		}
		else if($row==""||$row=null){
				alert_info("登录错误");
			}
			
		 
			
	}
}


/*if (isset($_POST["btn_sumbit"])){
mysql_close(); //关闭MySQL连接
header("Location: http://localhost/php/chaxun.php"); 
exit;
}*/
function alert_info($str){
	echo"<script>alert('$str')</script>";
	}
?>


<!--可以点击验证码-->
<script>
function changing(){
    document.getElementById('checkpic').src="yzm_new.php?"+Math.random();
} 
<!--点击注册按钮跳转-->
 function zhuce()  
        {  
            window.location.href = "register.php";  
        }
</script>
<!--数据库中读取的用户名与密码信息和用户输入的新相比较，true则登陆成功
    <script type="text/javascript">
        $(function(){
            $("#submit").on("click",function(){
                var userName = $("input[name='txt_user']").val();
                var pwd = $("input[name='txt_password']").val();
                
                $.post("doLand.php",{
                    "username":txt_user,
                    "passwd":txt_password
                },function(data){
                    alert(data);
                    if(data=="登录成功"){
                        location = "index.php";
                    }else{
                        alert("用户名或密码有误！");
                    }
                });
            });
        });
    </script>-->
</body>
</html>