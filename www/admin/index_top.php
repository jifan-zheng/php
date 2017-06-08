<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/public.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<title>无标题文档</title>
<script type="text/javascript">
<!--
function Time()
{
	today = new Date();
	var hours = today.getHours();
	var Message;
	if(parseInt(hours)>=0 && parseInt(hours)<=11)
	{
		Message="早上好";
		return Message;
	}
	else if(parseInt(hours)>11 && parseInt(hours)<=13)
	{
		Message="中午好";
		return Message;
	}
	else if(parseInt(hours)>13 && parseInt(hours)<=17)
	{
		Message="下午好";
		return Message;
	}
	else if(parseInt(hours)>17)
	{
		Message="晚上好";
		return Message;
	}
}
-->
</script>
<style type="text/css">
*{margin:0px;padding:0px;}
</style>
</head>

<body>
<div class="top">
	<div class="top1">
		<script language="javascript">document.write(Time())</script>admin，欢迎你！
		<a target="_top" href="exit.php" class="exit"><img style="border:none;;" src="images/tuichu.gif"></a>
	</div>
	<div class="top2">
		<ul>
			<li><a target="_top" href="/">返回前台</a></li>
			<li><a target="_top" href="index.php">后台首页</a></li>
		</ul>
	</div>
</div>
</body>
</html>
