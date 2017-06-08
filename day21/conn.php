<?php
//生命网页中的字符集
header("content-type:text/html;charset=utf-8");
//******连接MySQL服务器*******
//1)数据库配置信息

$db_host = "localhost:3306";
$db_user = "root";
$db_pwd  = "password";
$db_name = "007online";

//1)PHP连接MySQL服务器
$link = @mysqli_connect($db_host,$db_user,$db_pwd);
if(!$link){
	//如果PHP连接MySQL不成功
	echo "<font size=7 color=red>PHP连接MySQL服务器失败！";
	exit();//终止脚本继续向下运行
}
//2)选择当前要操作的数据库名称
if(!mysqli_select_db($link,$db_name)){
	//如果选择数据库失败
	echo "<font size=7 color=red>选择数据库{$db_name}失败!</font>";
	exit();
}
//3)设置MySQL请求或返回数据的字符集
mysqli_query($link,"set names utf8");
function dump($arr)
{
	echo "<pre>";
	print_r($arr);
	echo "<pre>";
}
?>