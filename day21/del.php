<?php
	//***删除记录***
	//包含连接MySQL的文件
	include "conn.php";
	//获取传过来的id
	$id = (int)$_GET["id"];	
	//构建要删除的SQL语句
	$sql = "DELETE FROM 007_news WHERE id=$id";
	
    exit();
	if(mysqli_query($link,$sql))
	{
		//如果执行成功，则跳转到success.php页面
		$url = "manage.php";
		$message = urlencode("id={$id}记录删除成功！");
		echo "<script>location.href='success.php?url=$url&message=$message'</script>";
	}else
	{	
		$message = urlencode("记录删除失败");
		header("location:error.php?message=$message");
	}
?>