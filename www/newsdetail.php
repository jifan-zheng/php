<?php
require("admin/include/conn.php");
if(empty($_GET["id"]))
{
	header("location:index.php");
}else
{
	$id = intval($_GET["id"]);
}

//更新点击率
$sql = "update {$db_prefix}news set hits=hits+1 where id=$id";
$result = mysql_query($sql);
$sql = "select * from {$db_prefix}news where id=$id";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

//根据当前类别，取出类别名称
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/public.css" type="text/css" rel="stylesheet" />
<link href="css/news.css" type="text/css" rel="stylesheet" />
<title>{$list.title}_{$SiteList.webname}</title>
</head>

<body>
<div class="box">
<?php include("header.php");?>
<div class="main">
<!--left-->
<div class="left floatL">
	<!--aboutus-->
	<div class="news">
		<div class="title">新闻中心</div>
		<div class="content">
			<ul>
				<li id="noTopLine"><a href="news.php?id=1">公司新闻</a></li>
				<li><a href="news.php?id=2">行业新闻</a></li>
				<li><a href="news.php?id=3">疾病预防</a></li>
				<li><a href="news.php?id=4">帮助中心</a></li>
			</ul>
		</div>
	</div><!--//aboutus-->
	<!--联系我们-->
	<div class="contact">
		<div class="title">联系我们</div>
		<div class="content">
			<img src="images/tel02.png" />
			<p>电话：0371-12345678<br />
				传真：0371-12345678<br />
				邮箱：saixinjituan@126.com<br />
				地址：河南开封市东开发区黄龙园区园区路1号
			</p>
		</div>
	</div><!--//联系我们-->
</div><!--//left-->
<!--right-->
<div class="right floatR">
	<div class="title">当前位置：<a href="/">网站首页</a> >&nbsp;<a href="news.php">新闻资讯</a> >&nbsp;这里是新闻标题</div>
	<div class="attr">
		<h4><?php echo $row["title"]?></h4>
		<div>作者：<?php echo $row["author"]?>&nbsp;&nbsp;发布时间：<?php echo date("Y-m-d H:i:s",$row["addate"])?>&nbsp;&nbsp;点击率：<?php echo $row["hits"]?></div>
	</div>
	<div class="content">
		<p>【兽药名称】通用名：乳化鱼肝油粉    汉语拼音：ru huayuganyoufen<br />
		  【主要成份】维生素A：3960000IU    维生素D3：1485000IU      维生素E：4950IU    维生素B2：1980IU<br />
		  【性    状】本品为类白色、淡黄色或黄色粉末。</p>
		<img align="middle" src="images/product06.jpg" />
		<p>【兽药名称】通用名：乳化鱼肝油粉    汉语拼音：ru huayuganyoufen<br />
		  【主要成份】维生素A：3960000IU    维生素D3：1485000IU      维生素E：4950IU    维生素B2：1980IU<br />
		  【性    状】本品为类白色、淡黄色或黄色粉末。<br />
		  【作用用途】<br />
		  1、主要用于畜禽因缺乏维生素A、D3造成的各种疾病。尤其对因缺乏以上维生素鸡蛋薄壳蛋、软壳蛋、沙皮蛋、产蛋下降等有明显的治疗效果。<br />
		  2、用于治疗畜禽的软骨病，并能提高种蛋的受精率和孵化率。<br />
		  3、可以作为球虫病、支原体、传染性鼻炎、肾肿、顽固性腹泻等病的辅助治疗用药，有利于机体康复，并能有效的防治上述疾病的 复发。<br />
		  4、补充维生素、提高繁殖率、成活率、提高抗病力、促进生长的必备产品。</p>
		<p>【用法用量】畜禽 混饲；250g拌料500公斤饲料、连用5-7天。混饮；250g兑水1000公斤水、连用5-7天。<br />
		  【注意事项】开口后尽快用完。<br />
		  【包    装】250g/袋<br />
		  【贮    藏】密闭、干燥、阴凉处保存。</p>
	</div>
	<div class="prevNext">
		
	</div>
</div><!--//right-->
<div class="clear"></div>
</div><!--//main-->
</div><!--//box-->
<?php include("footer.php")?>
</body>
</html>
