<SCRIPT type="text/javascript" src="js/flashobject.js"></SCRIPT>
<!--header-->
<div class="header">
	<!--logo-->
	<div class="logo">
		<div class="divL floatL"><img src="images/logo.png" /></div>
		<div class="divM floatL"><img src="images/kouhao.png" /></div>
		<div class="divR floatR"><img src="images/tel.png" /></div>
	</div><!--//logo-->
	<!--menu-->
	<div class="menu">
		<ul>
			<li><a href="/">网站首页</a></li>
			<li><a href="javascript:void(0)">公司概况</a></li>
			<li><a href="news.php">新闻资讯</a></li>
			<li><a href="javascript:void(0)">产品中心</a></li>
			<li><a href="javascript:void(0)">疾病预防</a></li>
			<li><a href="javascript:void(0)">帮助中心</a></li>
			<li><a href="javascript:void(0)">用户留言</a></li>
			<li><a href="javascript:void(0)">人才招聘</a></li>
			<li><a href="javascript:void(0)">联系我们</a></li>
		</ul>
	</div><!--//menu-->
	<!--Flash动画-->
	<div id="flashcontent">
		<script language="javascript">
		var focus_width=990
		var focus_height=280
		var text_height=0
		var swf_height = focus_height+text_height
		var pics="images/flash01.jpg|images/flash02.jpg|images/flash03.jpg"
		var links="||"
		var texts="||"
		 document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'">');
		 document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="images/playswf.swf"><param name=wmode value=transparent><param name="quality" value="high">');
		 document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
		 document.write('<param name="FlashVars" value="pics='+pics+'&links='+encodeURIComponent(links)+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'">');
		 document.write('<embed src="images/playswf.swf" wmode="opaque" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'" menu="false" bgcolor="#DADADA" quality="high" width="'+ focus_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
		 document.write('</object>');
		</script>
	</div><!--//Flash动画-->
</div><!--//header-->