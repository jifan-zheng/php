<?php
require("include/conn.php");
$sql = "select * from {$db_prefix}admin where username='admin'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/public.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.t4{color:#0000FF;}
</style>
<title>无标题文档</title>
</head>

<body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0" oncontextmenu="self.event.returnValue=false">
<noscript><iframe src=*.html></iframe></noscript>
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="border">
	<tr class="topbg"><td>系统信息</td></tr>
	<tr class="tdbg">
		<td height="30">
		<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#f0f0f0" >
			<tr class="tr_southidc"> 
				<td width="38%" height="23" bgcolor="#fcfcfc">用户名：<font class="t4"><?php echo $row["username"]?></font></td>
				<td width="62%" bgcolor="#fcfcfc">IP地址：<font class="t4"><?php echo $row["lastloginip"]?></font></td>
			</tr>
			<tr class="tr_southidc"> 
				<td width="38%" height="23" bgcolor="#fcfcfc">身份过期：<font class="t4"></font></td>
				<td width="62%" bgcolor="#fcfcfc">登录时间：<font class="t4"><?php echo date("Y-m-d H:i:s",$row["lastlogintime"])?></font></td>
			</tr>
			<tr class="tr_southidc"> 
				<td width="38%" height="23" bgcolor="#fcfcfc">服务器域名：<font class="t4"><?php echo $row["lastloginip"]?></font></td>
				<td width="62%" bgcolor="#fcfcfc">PHP环境：<font class="t4"><?php echo $_SERVER["SERVER_SOFTWARE"]?></font></td>			</tr>
			<tr class="tr_southidc"> 
				<td height="23" bgcolor="#fcfcfc">官方网站：<font class="t4"> <a href="http://www.007online.cn" target="_blank">www.007online.cn</a></font></td>
				<td bgcolor="#fcfcfc">技术电话：<font class="t4">13671181498</font>&nbsp;&nbsp;技术QQ：<font class="t4">976296751</font></td>
			</tr>
		</table>
		</td>
	</tr>
</table>
</body>
</html>
