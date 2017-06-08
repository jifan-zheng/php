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
		$in   = $_POST["id"];
		//构建更新的SQL语句
		$sql = "UPDATE 007_news SET cat=$cat,title='$title',author='$author',source='$source',orderby=$orderby,keywords='$keywords',description='description',content='$content' WHERE id=$id";
		 

		//执行SQL语句
		if(mysqli_query($link,$sql)){
			$url = "manage.php";
			$message = urlencode("记录添加成功！");
			echo "<script>location.href='success.php?url=$url&message=$message'</script>";
		}
	}else{
		//获取地址栏传递的id
		$id = $_GET["id"];
		//构建查询的SQL语句
		$sql = "SELECT * FROM 007_news WHERE id=$id ";
		$result = mysqli_query($link,$sql);
		$arr = mysqli_fetch_assoc($result);

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>修改新闻</title>
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
			<th colspan="2"><h3>修改一条新闻</h3></th>
		</tr>
		<tr>
			<td width="80" align="right">新闻类型：</td>
			<td>
				<select name="cat">
					<option value="1" <?php if($arr['cat']==1){echo 'selected=selected';}?> >公司新闻</option>
					<option value="2" <?php if($arr['cat']==2){echo 'selected=selected';}?> >行业新闻</option>
					<option value="3" <?php if($arr['cat']==3){echo 'selected=selected';}?> >疾病新闻</option>
					<option value="4" <?php if($arr['cat']==4){echo 'selected=selected';}?> >帮助新闻</option>
				</select>
			</td>
		</tr>
		<tr>
			<td width="80" align="right">新闻标题：</td>
			<td><input type="text" name="title" size="40" value="<?php echo $arr['title'] ?>"></td>
		</tr>
		<tr>
			<td align="right">作者：</td>
			<td>
				<input type="text" name="author" size="6" value="<?php echo $arr['author']?>">
				来源：<input type="text" name="source" size="6" value="<?php echo $arr['source']?>">
				排序：<input type="text" name="orderby" maxlength="2"  size="2" value="<?php echo $arr['orderby']?>">
			</td>
		</tr>
		<tr>
			<td align="right">关键字：</td>
			<td><input type="text" name="keywords" size="80" value="<?php echo $arr['keywords']?>"></td>
		</tr>
		<tr>
			<td align="right">描述：</td>
			<td><input type="text" name="description"  size="80" value="<?php echo $arr['description']?>"></td>
		</tr>
		<tr>
			<td align="right">内容：</td>
			<td><textarea name="content" style="width: 100%;height: 200px;"><?php echo $arr['content']?></textarea></td>
		</tr>
		<tr>
		 	<td align="right">&nbsp;</td>
		 	<td>
		 		<input type="submit" value="提交表单">
		 		<input type="reset" value="重置表单">
		 		<input type="hidden" name="ac" value="add">
		 		<input type="hidden" name="id" value="<?php echo $id?>">
		 	</td>
		</tr>
	</table>
</form>
</body>
</html>