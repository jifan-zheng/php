<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/menu.js" type="text/javascript"></script>
<title>管理左边页</title>
<STYLE TYPE="text/css">
<!--
body {
	font-size:12px;
	line-height:20px;
	background-color:#f9fdfd;
	margin-top:0px;
	margin-right:1px;
	margin-left:0px;
	margin-bottom:0px;
	SCROLLBAR-FACE-COLOR: #DDE1E6;
	SCROLLBAR-HIGHLIGHT-COLOR: #ffffff;
	SCROLLBAR-SHADOW-COLOR: #79899D;
	SCROLLBAR-3DLIGHT-COLOR: #79899D;
	SCROLLBAR-ARROW-COLOR: #333333;
	SCROLLBAR-TRACK-COLOR: #EAEEEC;
	SCROLLBAR-DARKSHADOW-COLOR: #ffffff;
}
td {
	font-size:12px;
	line-height:20px;
}
-->
</STYLE>
<base target="main" />
</head>
<body>
<noscript><iframe src=*.html></iframe></noscript>
<div class="left">
	<div><img src="images/menu_topimg.gif" /></div>
	<div class="title"><b>网站管理菜单</b></div>
	<div><img src="images/menu_topline.gif" /></div>
	<div class="content">
		<ul class="menu collapsible">
			<!--公司信息-->
			<li><a href="#">公司信息</a>
				<ul class="acitem">
					<li><a href='javascript:void(0)'>管理公司信息</a></li>
				</ul>
			</li>
			<!--新闻动态-->
			<li><a href="#">新闻动态</a>
				<ul class="acitem">
					<li><a href='news_add.php'>添加新闻</a></li>
					<li><a href='news_manage.php'>管理新闻</a></li>
				</ul>
			</li>
			<!--产品管理-->
			<li><a href="#">产品管理</a>
				<ul class="acitem">
					<li><a href='javascript:void(0)'>添加产品</a></li>
					<li><a href='javascript:void(0)'>管理产品</a></li>
				</ul>
			</li>
			<li><a href="#">留言管理</a>
				<ul class="acitem">
					<li><a href='javascript:void(0)'>留言管理</a></li>
				</ul>
			</li>
			<!--系统设置-->
			<eq name="priv.system" value="1">
			<li><a href="#">系统设置</a>
				<ul class="acitem">
					<li><a href='site_manage.php'>站点设置</a></li>
					<li><a href='class_news_manage.php'>新闻类别</a></li>
					<li><a href='javascript:void(0)'>产品类别</a></li>
				</ul>
			</li>
			</eq>
		</ul>
	</div>
	<div><img src="images/menu_bottomimg.gif" /></div>
</div>
</body>
</html>