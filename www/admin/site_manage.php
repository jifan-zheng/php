<?php
require_once("include/conn.php");
//*******************************************************************************************************
if(isset($_POST["ac"]) && $_POST["ac"]=="edit")
{
	//取得表单提交值
	$webname=trim($_POST["webname"]);
	$url=trim($_POST["url"]);
	$source = trim($_POST["source"]);
	$icp = trim($_POST["icp"]);
	$keywords=trim($_POST["keywords"]);
	$description=trim($_POST["description"]);
	//写入数据库
	$sql="update {$db_prefix}site set webname='$webname',url='$url',source='$source',icp='$icp',keywords='$keywords',description='$description' where id=1";
	if(mysql_query($sql))
	{
		$message=urlencode("更新成功！");
		$url="site_manage.php";
		echo "<script>location.href='success.php?message=$message&url=$url'</script>";
		exit();
	}else
	{
		$message=urlencode("更新失败！");
		echo "<script>location.href='error.php?message=$message'</script>";
		exit();
	}
}else
{
	$sql="select * from {$db_prefix}site where id=1";
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='css/public.css' rel='stylesheet' type='text/css'>
<script language="javascript">
function checkForm()
{
	if(document.form1.webname.value=="")
	{
		alert("网站名称不能为空");
		document.form1.webname.focus();
		return false;
	}else
	{
		return true;
	}
}
</script>
<title>站点管理</title></head>

<body>
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="border">
	<tr class="topbg">
	  <td>站点管理</td>
	</tr>
	<tr class="tdbg">
		<td height="30">&nbsp;&nbsp;<a href='site_manage.php'>站点管理首页</a></td>
	</tr>
</table>
<br/>
<form name="form1" method="post" action="" onsubmit="return checkForm();">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="border">
	<tr class="title">
		<td colspan="2" align="center">修改站点管理信息</td>
	</tr>
	<tr class="tdbg" <?php echo $onmouseover?>>
	  <td width="13%" align="right"><strong>网站名称：</strong></td>
	  <td width="87%"><input name="webname" value="<?php echo $row["webname"]?>" type="text" id="webname" style="width:200px;" maxlength="50" />
	  <font color="#FF0000">*</font></td>
    </tr>
	<tr class="tdbg" <?php echo $onmouseover?>>
	  <td align="right"><strong>网站域名：</strong></td>
	  <td><input name="url" type="text" value="<?php echo $row["url"]?>" id="url" style="width:200px;" maxlength="50" /></td>
    </tr>
	<tr class="tdbg" <?php echo $onmouseover?>>
	  <td align="right"><strong>网站来源：</strong></td>
	  <td><input name="source" type="text" value="<?php echo $row["source"]?>" id="source" style="width:200px;" maxlength="50" /></td>
    </tr>
	<tr class="tdbg" <?php echo $onmouseover?>>
	  <td align="right"><strong>ICP备案号：</strong></td>
	  <td><input name="icp" type="text" value="<?php echo $row["icp"]?>" id="icp" style="width:200px;" maxlength="50" /></td>
    </tr>
	<tr class="tdbg" <?php echo $onmouseover?>>
	  <td align="right"><strong>网页关键词：</strong></td>
	  <td><input name="keywords" type="text" value="<?php echo $row["keywords"]?>" id="keywords" style="width:400px;" maxlength="100" /></td>
    </tr>
	<tr class="tdbg" <?php echo $onmouseover?>>
	  <td align="right"><strong>网站描述：</strong></td>
	  <td><textarea name="description" id="description" style="width:600px;height:100px;"><?php echo $row["description"]?></textarea></td>
    </tr>
	<tr class="tdbg" <?php echo $onmouseover?>>
		<td align="center" colspan="2">
			<input type="submit" name="submit" value="修改" />&nbsp;
			<input type="hidden" name="ac" value="edit" />
		</td>
	</tr>
</table>
</form>
</body>
</html>
