<?php
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
class checkAll{
	//编写用户名
	public function checkName ($name){
		$name_pattern ="/^\s*?$/";
		if (preg_match($name_pattern,$name) == 1) {
 			$result = $name."是正确的用户名.<br>";
		} else if (preg_match($name_pattern,$name) == 0) {
			$result = $name."请输入正确的用户名.<br>";
     	}
		return $result;
	}
	//编写函数checkID()来校验身份证号码格式的合法性
 	public function checkID ($id){
		$id_pattern = "/^(\d{6})(18|19|20)?(\d{2})([01]\d)([0123]\d)(\d{3})(\d|X)?$/";
    	if (preg_match($id_pattern,$id) == 1) {
 			$result = $id."是正确的身份证号码.<br>";
		} else if (preg_match($id_pattern,$id) == 0) {
			$result = $id."请输入正确的身份证号码.<br>";
     	}
		return $result;
 	}
	//编写checkMobile()函数，输出手机号码格式校验的结果
 	public function checkMobile($mobile){
  	 	$mobile_pattern = "/^[1][358]\d{9}$/";
//$mobile_pattern  = "/^((13[0-9])|147|(15[0-35-9])|180|182|(18[5-9]))[0-9]{8}$/A";
 	 	//preg_match()函数用来校验手机号码格式的正确性
    	if (preg_match($mobile_pattern,$mobile) == 1) { 
 	 		$result = $mobile."是正确的手机号码.<br>";
		} else if (preg_match($mobile_pattern,$mobile) == 0) {
			$result = $mobile."请输入正确的手机号码.<br>";
   	 	}
 		return $result;
 	}
	
	
	//编写checkEmail()函数，输出电子邮箱格式校验的结果
 	public function checkEmail($email){
    	$email_pattern = "/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/";
//$email_pattern  = '/^[a-zA-Z0-9][a-zA-Z0-9._-]*\@[a-zA-Z0-9]+\.[a-zA-Z0-9\.]+$/A'; 
   		//preg_match()函数用来校验邮箱格式的正确性
 		if (preg_match($email_pattern,$email) == 1){
 	 		$result = $email." 是正确的邮箱格式.<br>";
 		} else if (preg_match($email_pattern,$email) == 0) {
 			$result = $email." 请输入正确的邮箱格式.<br>";
    	}
 		return $result;
 	}
	
	//编写函数checkQQ()来校验QQ号码格式的合法性
	public function checkQQ($qq){
 		$qq_pattern =  "/^[1-9][0-9]{4,}$/";
   		if (preg_match($qq_pattern,$qq) == 1) {
 			$result = $qq."是正确的QQ号码.<br>";
		} else if (preg_match($qq_pattern,$qq) == 0) {
			$result = $qq."请输入正确的QQ号码.<br>";
   		}
 		return $result;
 	}

	
	//编写函数checkUrl()来校验证网址格式的合法性
	public function checkUrl($url){
  		$url_pattern = "/^(http:\/\/)?[\w]+(\.[\w.\/]+)+$/i";
   		if (preg_match($url_pattern,$url) == 1) {
 			$result = $url."是正确的url地址.<br>";
		} else if (preg_match($url_pattern,$url) == 0) {
 			$result = $url."请输入正确的url地址.<br>";
		}
 		return $result;
	}
	
	//校验证密码的合法性
	public function checkPassword($pass){
  		$pass_pattern = "/^\w{6,8}$/i";
   		if (preg_match($pass_pattern,$pass) == 1) {
 			$result = $pass."是正确的密码.<br>";
		} else if (preg_match($pass_pattern,$pass) == 0) {
 			$result = $pass."请输入正确的密码.<br>";
		}
 		return $result;
	}

}
?>