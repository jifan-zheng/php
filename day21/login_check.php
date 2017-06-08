<?php
	//连接MySQL数据库
	include "conn.php";
	//用户登陆检查
	//判断表单是否提交
	
	if(isset($_POST["ac"])&&$_POST["ac"]=='login')
	{
		//获取表单提交数据
		$username =$_POST["username"];
		$password = md5($_POST["password"]);
		//构建要查询的SQL语句
		$sql = "SELECT * FROM 007_admin WHERE username='$username' and password='$password'";
		//执行SQL语句
		$result=mysqli_query($link,$sql);
		//获取结果集中的记录条数
		$records = mysqli_num_rows($result);
		if($records)
		{
			//如果找到匹配
			//获取相关变量信息
			$lastloginip = $_SERVER["REMOTE_ADDR"];
			$lastlogintime = time();
			//构建更新的SQL语句
			
			$sql = "UPDATE 007_admin SET lastloginip='$lastloginip',lasttlogintime='$lastlogintime',loginhits=loginhits+1 WHERE username='$username' ";
			//执行SQL语句
			mysqli_query($link,$sql);
			//跳转到管理页面
			header("location:manage.php");
		}else
		{
			//如果没有找到匹配
			$message = urlencode("用户名或密码不正确");
			header("location:error.php?message=$message");
		}

	}else
	{
		//如果非法操作
		$message = urlencode("非法操作");
		header("location:error.php?message=$message");
	}
?>