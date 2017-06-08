<?php
	//包含连接MySQL的文件
	include "conn.php";
	//构建查询的SQL语句
	$sql = "SELECT * FROM 007_news ORDER BY id DESC";
	//执行SQL语句
	$result = mysqli_query($link,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>新闻管理列表页</title>
	<meta charset="utf-8">
	<script type="text/javascript">
		function confirmDel(id){
			//询问是否需要删除
			if(window.confirm("你确定要删除吗？"))
				//如果单击确定按钮，则跳转到del.php 页面
				location.href="del.php?id="+id;
		}
	</script> 
</head>
<body>
	<div>
		<input type="button" value="添加新闻" onclick="javascript:location.href='add.php'">
	</div>
	<table width="100%" border="1" bordercolor="#ccc" rules="all" cellpadding="5" align="center">
		<tr bgcolor="#e0e0e0">
			<th>编号</th>
			<th>新闻标题</th>
			<th>作者</th>
			<th>来源</th>
			<th>排序</th>
			<th>点击率</th>
			<th>发布日期</th>
			<th>操作选项</th>
		</tr>
		<?php
			while($arr = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?php echo $arr['id']?></td>
			<td align="left">
				<a href="content.php?id=<?php echo $arr['id']?>" >
				<?php echo $arr['title']?>
				</a>
			</td>
			<td><?php echo $arr['author']?></td>
			<td><?php echo $arr['source']?></td>
			<td><?php echo $arr['orderby']?></td>
			<td><?php echo $arr['hits']?></td>
			<td><?php echo date("Y-m-d H:i",$arr['addate'])?></td>
			<td>
				<a href="edit.php?id=<?php echo $arr['id']?> " >修改</a>
				<a href="javascript:void(0)" onclick="confirmDel(<?php echo $arr['id']?>)">删除</a>
			</td>
		</tr>	
		<?php } ?>
	</table>		
</body>
</html>