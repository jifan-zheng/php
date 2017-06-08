<?php
require("admin/include/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keywords" content="{$SiteList.keywords}" />
<meta http-equiv="description" content="{$SiteList.description}" />
<link href="css/public.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<title>{$SiteList.webname}</title>
</head>

<body>
<!--box-->
<div class="box">
<?php require("header.php");?>
<!--main-->
<div class="main">
	<div class="left floatL">
		<div class="title">公司介绍<span><a href="javascript:void(0)"><img src="images/more.png" /></a></span></div>
		<div class="content">
			<img align="left" src="images/img01.png" />
			<p>杭州某饲料有限公司成立于1994年，是一家主要研究、开发、生产、销售配合饲料、复合预混合饲料和浓缩饲料的专业化饲料公司。围绕规模化猪场展开以直销为主的“顾问式营销”是闵昂公司的主要销售模式，针对不同易集团2001年在华投资赛农农资生物科技有限公司、2005年投资山东赛农化</p>
		</div>
	</div>
	<div class="right floatR">
		<div class="title">新闻中心<span><a href="news.php"><img src="images/more.png" /></a></span></div>
		<div class="content">
			<div class="ppt">
				<script language="javascript">
				var focus_width=210
				var focus_height=160
				var text_height=0
				var swf_height = focus_height+text_height
				var pics="images/ppt01.jpg|images/ppt02.jpg|images/ppt03.jpg|images/ppt04.jpg"
				var links="|||"
				var texts="|||"
				 document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'">');
				 document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="images/playswf.swf"><param name=wmode value=transparent><param name="quality" value="high">');
				 document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
				 document.write('<param name="FlashVars" value="pics='+pics+'&links='+encodeURIComponent(links)+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'">');
				 document.write('<embed src="images/playswf.swf" wmode="opaque" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'" menu="false" bgcolor="#DADADA" quality="high" width="'+ focus_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
				 document.write('</object>');
				</script>
			</div><!--//ppt-->
			<ul>
				<?php
				//读取新闻
				$sql = "select * from {$db_prefix}news order by orderby asc,id desc limit 0,8";
				$result = mysql_query($sql);
				while($row = mysql_fetch_assoc($result)){
				?>
				<li><a href="newsdetail.php?id=<?php echo $row["id"]?>" target="_blank"><?php echo $row["title"]?></a></li>
				<?php }?>
			</ul>
			<div class="clear"></div>
		</div><!--//content-->
	</div><!--//right-->
	<div class="blank"></div>
	<div class="product">
		<div class="title">最新产品<span><a title="更多产品" href="javascript:void(0)"><img border="0" src="images/more.png" /></a></span></div>
		<div class="content">
			<ul>
				<li><a href="javascript:void(0)"><img src="images/product01.jpg" /><br />产品名称</a></li>
				<li><a href="javascript:void(0)"><img src="images/product02.jpg" /><br />产品名称</a></li>
				<li><a href="javascript:void(0)"><img src="images/product03.jpg" /><br />产品名称</a></li>
				<li><a href="javascript:void(0)"><img src="images/product04.jpg" /><br />产品名称</a></li>
				<li><a href="javascript:void(0)"><img src="images/product05.jpg" /><br />产品名称</a></li>
				<li><a href="javascript:void(0)"><img src="images/product06.jpg" /><br />产品名称</a></li>
				<li><a href="javascript:void(0)"><img src="images/product01.jpg" /><br />产品名称</a></li>
				<li><a href="javascript:void(0)"><img src="images/product04.jpg" /><br />产品名称</a></li>
				<li><a href="javascript:void(0)"><img src="images/product06.jpg" /><br />产品名称</a></li>
				<li><a href="javascript:void(0)"><img src="images/product03.jpg" /><br />产品名称</a></li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
</div><!--//main-->
</div><!--//box-->
<?php require("footer.php")?>
</body>
</html>
