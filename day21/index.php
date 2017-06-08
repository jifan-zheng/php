<!DOCTYPE html>
<html>
<head>
	<title>用户登陆</title>

</head>
<body>
<form name="form1" method="post" action="login_check.php">
	<table width="500" border="1" bordercolor="#ccc" rules="all" align="center" cellpadding="5">
		<tr>
			<th colspan="2" bgcolor="#e0e0e0">用户登陆界面</th>
		</tr>
		<tr>
			<td widht="80" align="right">用户名：</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td align="right">密码：</td>
			<td ><input type="password" name="password"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<input type="submit" value="登陆">
				<input type="hidden" name="ac" value="login">
			</td>
		</tr>
	</table>
</form>
</body>
</html>