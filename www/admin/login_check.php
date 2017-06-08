<?php
//包含文件
require_once("include/conn.php");
//判断表单是否有信息提交
if(isset($_POST["ac"]) && $_POST["ac"]=="login")
{
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	$password = md5($password); 
	
	//读取数据库中存储的用户名信息，进行比对
	$sql = "select * from {$db_prefix}admin where username='$username' and password='$password'";
	$result = mysql_query($sql);
	$rows = mysql_num_rows($result);
	if( $rows == 1 )
	{
		//如果找到匹配的账号，更新登录信息
		$lastloginip = $_SERVER['REMOTE_ADDR'];
		$lastlogintime = time();
		$sql = "update {$db_prefix}admin set lastloginip='$lastloginip',lastlogintime=$lastlogintime,loginhits=loginhits+1 where username='$username'";
		if(mysql_query($sql))
		{
			//登录成功，跳转到管理首页
			$message = urlencode("登录成功！");
			$url = "index.php";
			echo "<script>location.href='success.php?message=$message&url=$url'</script>";
			exit();
		}
	}else
	{
		//如果没有找到匹配的账号
		$message = urlencode("用户名或密码不正确！");
		echo "<script>location.href='error.php?message=$message'</script>";
		exit();
	}
	
}else
{
	$message = urlencode("非法用户！");
	echo "<script>location.href='error.php?message=$message'</script>";
	exit();
}
?>