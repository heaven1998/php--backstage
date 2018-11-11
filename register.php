<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户注册</title>
<link rel="stylesheet" href="css/style1.css" />
</head>


<body>
<?php
require("public.php");
require("preg.php");
$sql_role="select * from roles";
$query1=mysql_query($sql_role);//提交$sql到数据库

?>
<div id="land1">
<h2>用户注册</h2>
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
<label>密码：</label>
<input name="text_password" type="password" />
	<?php
    if(isset($_POST["btn_submit"])){
    //验证密码
    if($_POST["text_password"]!==""|| $_POST["text_password"]!==null){			
    $object=new checkAll();
    $return_mess=$object->checkPassword($_POST["text_password"]);
    echo $return_mess;
    }
    }
    ?>
<br />
<label>确认密码：</label>
<input name="text_repassword" type="password" /><br />
<label>身份认证：</label>
<select name="sel_option">
	<?php
    
    while($row=mysql_fetch_array($query1)){
    echo "<option value='".$row['roleid']."'>".$row['rolename']."</option>";
    }
    ?>
</select><br />
<input name="btn_submit" type="submit"  class="btn" value="登陆"/>
</form>
</div>
<?php
if(isset($_POST["btn_submit"])){
	
		$username=$_POST["text_username"];
		$password=$_POST["text_password"];
		$repassword=$_POST["text_repassword"];
		$option=$_POST["sel_option"];
		
		if($username==""|| $username==null){
			alert_info("用户名不能为空");	
			
		}	
		else{				
			if($password==""|| $password==null){
				alert_info("密码不能为空");				
			}
			
			else{
				if($repassword==""|| $repassword==null){
					alert_info("确认密码不能为空");
				}
				else{
					if($repassword==$password){
					 $sql="insert into userinfo (username_zmh,Password_zmh,Role_zmh)
					 values('".$username."','".$password."','".$option."')";					
					 $query=mysql_query($sql);//提交$sql到数据库
					 mysql_close(); //关闭MySQL连接
					 header("Location: http://localhost/php/land.php"); 
					 exit;
					}
					else{
						alert_info("两次密码不一致");
					}
				}
					
			}
		
		}
}

function alert_info($str){
	echo"<script>alert('$str')</script>";
	}
?>

</body>
</html>