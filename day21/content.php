<?php
	//读取一条记录
	//包含文件
	include "conn.php";
	//获取地址栏传递过来的id的值
	$id = $_GET["id"];
	//构建更新的SQL语句
	$sql = "UPDATE 007_news SET hits = hits+1 WHERE id=$id";
	$result = mysqli_query($link,$sql);
	//构建查询的SQL语句
	$sql = "SELECT * FROM 007_news WHERE id=$id ";
	//执行SQL语句
	$result = mysqli_query($link,$sql);
	//取出唯一的一条记录
	$arr = mysqli_fetch_assoc($result); 
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $arr['title']?></title>
</head>
<body>
<table width="1000" cellpadding="5" align="center">
	<tr>
		<td align="center"><h2><?php echo $arr['title']?></h2></td>
	</tr>
	<tr>
		<td align="center" bgcolor="#e0e0e0">
			作者：<?php echo $arr['author']?>&nbsp;&nbsp;
			来源：<?php echo $arr['source']?>&nbsp;
			点击率：<font color=red><?php echo $arr['hits']?></font>次&nbsp;
			发布时间：<?php echo date("Y-m-d H:i",$arr['addate'])?>
		</td>
	</tr>
	<tr>
		<td><?php echo $arr['content']?></td>
	</tr>
</table>
</body>
</html>