<?php
//数据库查询链接
mysql_connect("127.0.0.1","root","") or die("连接错误");
mysql_select_db("login_zmh")  or die("该数据库不存在");
mysql_query("set names 'utf8'");

?>