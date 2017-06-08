<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>管理员登录</title>
<link href="css/layoutzhgb2312.css"   rel="stylesheet" type="text/css" />
<link href="css/login.css"   rel="stylesheet" type="text/css" />
<script language=javascript>
<!--
</script>
</head>
<body>
<center>
<form name="form1" method="post" action="login_check.php" id="form1" onsubmit="return checkForm();">
<div id="position">
	<div id="inposition">
		<div class="login-left">
			<div class="login-left-logo"><img src="images/login-logo.gif"  width="297" height="78" /></div>
			<div class="login-left-content">
				<ul>
					<li>基于Parallels 全球领先的虚拟主机管理软件系统平台，确保网站高效、稳定运行</li>
					<li>一年不限次电话、QQ、邮箱技术支持服务</li>
					<li>提供网站建设、网络推广、网站维护、域名注册、空间申请等一条龙服务。</li>
				    <li>提供项目开发、功能定制、OA系统、物流转单等系统开发。也可以根据客户需求进行产品的定制和研发。</li>
				    <li>技术QQ：976296751</li>
					<li><a href="http://www.007online.cn" target="_blank">http://www.007online.cn</a></li>
				</ul>
			</div>
		</div>
        <div class="login-right">
			<div id="UpdatePanel1">
            	<div class="login-right-title">网站后台管理系统</div>
                <div class="login-right-input">
                <table width="200" border="0" cellspacing="0" cellpadding="0">
                	<tr>
                    	<td nowrap="nowrap" align="right" id="tdLeft">用户名：</td>
                        <td><input name="username" type="text" id="username" class="input" size="10" maxlength="20"/></td>
					</tr>
					<tr>
						<td style="height: 30px" align="right">密&nbsp;&nbsp;码：</td>
						<td style="height: 30px"><input name="password" type="password" id="password" class="input" size="10" maxlength="32"/></td>
					</tr> 
					<tr>
						<td style="height: 30px" align="right"></td>
						<td style="height: 30px" nowrap="nowrap">
							<input type="submit" name="btnLogin" value="登 录" id="btnLogin" class="button" />
							<input type="reset" name="btnTest" value="清 除" id="btnTest" class="button" />	
							<input type="hidden" name="ac" value="login" />
						</td>
					</tr>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
</center>
    <div id="header"></div>
    <div id="content"><img src="images/login-wel.gif" /></div>
    <div id="buttom">
        <div class="copy2">
            <nobr>Copyright &copy; 2007-<?php echo date("Y")?>&nbsp;&nbsp;007online.cn All Rights Reserved.</nobr>
        </div>
        <div class="copy"><img src="images/login-copy.gif" /></div>
    </div>
</body>
</html>
<script language="javascript">
//初始设置用户名为当前焦点
function setFocus()
{
	if (document.form1.username.value=="")
	{
		document.form1.username.focus();
	}else{
		document.form1.username.select();
	}
}
setFocus();
//检查表单数据合法性
function checkForm()
{
	if(document.form1.username.value=="")
	{
		alert("用户名没有输入！");
		document.form1.username.focus();
		return false;
	}else if(document.form1.username.value.length<5 && document.form1.username.value.length>15)
	{
		alert("用户名长度应为5-15个字符！");
		document.form1.username.focus();
		return false;
	}else if(document.form1.password.value=="")
	{
		alert("密码没有输入！")
		document.form1.password.focus();
		return false;
	}else if(document.form1.password.value.length<5 && document.form1.password.value.length>15)
	{
		alert("密码长度应为5-15个字符！");
		document.form1.password.focus();
		return false;
	}else
	{
		return true;
	}
}
</script>