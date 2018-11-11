<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除数据</title>
</head>

<body>

<?php

require("public.php");
$a = $_GET['id'];
$sql = $sql="delete from addresslist  where Id='".$a."'";//错误应该在这儿
 mysql_query($sql);   
 mysql_close(); //关闭MySQL连接
  header("Location: http://localhost/php/chaxun.php"); 
   exit;


?>
</body>
</html>