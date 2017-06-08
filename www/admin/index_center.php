<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>关闭左边菜单</title>
<script language="javascript">
<!--
var displayBar=true;
var displayBar1=true;
function switchBar(obj,i)
{
	if(i=="top"){
		if(displayBar1)
		{
			parent.frametop.rows="0,*";
			displayBar1=false;
			obj.title="打开上边页";
		}else{
			parent.frametop.rows="60,*";
			displayBar1=true;obj.title="关闭上边页";
		}
	}else
	  {
		if(displayBar)
		{
			parent.frameb.cols="0,10,*";
			displayBar=false;
			obj.src="images/ad_show_left.gif";
			obj.title="打开左边页";
		}else
		{
			parent.frameb.cols="185,10,*";
			displayBar=true;
			obj.src="images/ad_hide_left.gif";
			obj.title="关闭左边页";
		}
	}
}
-->
</script>
<style type="text/css">
body,table,tr,td,img{margin:0px;padding:0px;}
</style>
</head>
<body>
<table height='530' width='10%' border=0 cellpadding=0 cellspacing=1 bgcolor="FFFFF">
	<tr>
		<td valign=top><img src="images/ad_show_top.gif" title="关闭上边页" style="cursor:pointer" align='top'onClick="switchBar(this,'top')"></td>
	</tr>
	<tr>
		<td height="100%" valign="middle"><img src="images/ad_hide_left.gif" title="关闭左边页" style="cursor:pointer" onClick="switchBar(this,'bottom')"></td>
	</tr>
</table>
</body>
</html>