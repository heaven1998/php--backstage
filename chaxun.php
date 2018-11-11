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
//setcookie('userent',"username_zmh");	
	

	//提取cookie
	$user=$_COOKIE["userent"];	
	
	//根据不同的角色显示不同的内容
	$diff="SELECT  roles.roleid,userinfo.Role_zmh,userinfo.username_zmh  FROM roles ,userinfo
WHERE roles.roleid =  userinfo.Role_zmh and userinfo.username_zmh='".$user."'";
	 $re=mysql_query($diff);
	 $row=mysql_fetch_array($re);
	 if( $row['Role_zmh']==1){
		 $sql="select   *  from  addressList";
	}
	
     else if($row['Role_zmh']==2||$row['Role_zmh']==3){
	$sql="select   *  from  addresslist  where username_zmh='".$user."'";
	/**/}
	
	if(isset($_POST["btn_sel"])){	
	$tiaojian=$_POST["text_tiaojian"];	
	if($tiaojian!=""&&$tiaojian!=null){		
		$sql.="and name_zmh like '%".$tiaojian."%'";	
	}
}		
//创建表格，链接数据库
$query=mysql_query($sql);

//获取查询出的所有行数，并定义一页显示多少行
$num=mysql_num_rows($query);    //获取所有的行数
$pageSize=2;   //设置每一页显示的行数
//设置变量 用来存储 总页数和控制上一页下一页
$pageCount=ceil($num/$pageSize);                //总页数
$pageNo=isset($_GET['page'])?$_GET['page']:1;   //页码
$pageNext=$pageNo+1;                            //下一页
$pagePrev=$pageNo-1; 
//判断页码越界
    if($pageNext>$pageCount)  $pageNext=$pageCount;
    if($pagePrev<1)        $pagePrev=1;
    if($pageNo>$pageCount)    $pageNo=$pageCount;
    if($pageNo<1)              $pageNo=1;
 
   $offset=($pageNo-1)*$pageSize;   //偏移量 
   mysql_data_seek($query, $offset); //将结果指针移至offset处

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

for($i=0; $i <$pageSize ; $i++)
{
 $row=mysql_fetch_assoc($query);
     
	if ($row){

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
 }
echo "</table>";
echo "</div>";
echo "<div class='page'>";
      echo "<div colspan='3' class='aa'> ";
      echo "共".$num."条";
      echo "共".$pageCount."页";
      echo "每页".$pageSize."条";
        echo "<a href='chaxun.php?page=1'>首页</a>";
          echo  "<a href='chaxun.php?page=".$pagePrev." '>上一页</a>";
           echo " <a href='chaxun.php?page=".$pageNext."'>下一页</a>";
           echo "<a href='chaxun.php?page=".$pageCount."'>最后一页</a>";
 
      echo "</div>";
   echo "</div>";

	

if (isset($_POST["btn_ins"])){
mysql_close(); //关闭MySQL连接
header("Location: http://localhost/php/insert.php"); 
exit;
}
?>
</body>
</html>