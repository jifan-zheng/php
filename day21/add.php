<?php
//添加新闻
//连接数据库
	include "conn.php";
	if(isset($_POST["ac"])&& $_POST["ac"] =="add")
	{
		//获取表单提交数据
		$cat   = $_POST['cat'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$source = $_POST['source'];
		$orderby = $_POST["orderby"];
		$keywords = $_POST["keywords"];
		$description = $_POST["description"];
		$content  = $_POST["content"];
		$addate = time();
		//构建写入的SQL语句
		$sql = "INSERT INTO 007_news(cat,title,author,source,orderby,keywords,description,addate,content) VALUE('$cat','$title','$author','$source','$orderby','$keywords','description',$addate,'$content')";

		//执行SQL语句
		if(mysqli_query($link,$sql)){
			$url = "manage.php";
			$message = urlencode("id={$id}记录添加成功！");
			echo "<script>location.href='success.php?url=$url&message=$message'</script>";
		}else{
			echo "no";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>添加新闻</title>
	<script charset="utf-8" src="js/editor/kindeditor-min.js"></script>
	<script charset="utf-8" src="js/editor/lang/zh_CN.js"></script>
	<script type="text/javascript">
		var  editor;
		KindEditor.ready(function(K){
			editor = K.create('textarea[name="content"]', {
				allowFileManager : true 
			});
		});
	</script>
</head>
<body>
<form  name="form1" method="post" action="">
	<table width="800" border="1" bordercolor="#ccc" rules="all" cellspacing="1" cellpadding="5" align="center">
		<tr>
			<th colspan="2"><h3>添加一条新闻</h3></th>
		</tr>
		<tr>
			<td width="80" align="right">新闻类型：</td>
			<td>
				<select name="cat">
					<option value="1">公司新闻</option>
					<option value="2">行业新闻</option>
					<option value="3">疾病新闻</option>
					<option value="4">帮助新闻</option>
				</select>
			</td>
		</tr>
		<tr>
			<td width="80" align="right">新闻标题：</td>
			<td><input type="text" name="title" size="40"></td>
		</tr>
		<tr>
			<td align="right">作者：</td>
			<td>
				<input type="text" name="author" size="6" value="admin">
				来源：<input type="text" name="source" size="6" value="传智播客">
				排序：<input type="text" name="orderby" maxlength="2"  size="2" value="50">
			</td>
		</tr>
		<tr>
			<td align="right">关键字：</td>
			<td><input type="text" name="keywords" size="80"></td>
		</tr>
		<tr>
			<td align="right">描述：</td>
			<td><input type="text" name="description"  size="80"></td>
		</tr>
		<tr>
			<td align="right">内容：</td>
			<td><textarea name="content" style="width: 100%;height: 200px;"></textarea></td>
		</tr>
		<tr>
		 	<td align="right">&nbsp;</td>
		 	<td>
		 		<input type="submit" value="提交表单">
		 		<input type="reset" value="重置表单">
		 		<input type="hidden" name="ac" value="add">
		 	</td>
		</tr>
	</table>
</form>
</body>
</html>