<?php
//echo "hello";
//获取提交过来的数据
$username = $_GET['username'];
//在数据库中查询，此处省略
$msg = "";
if ($username == 'admin') {
	$msg = "对不起，该用户名已被占用";
} else {
	$msg = "恭喜您，该用户可用";
}
echo <<<STR
	<script type="text/javascript">
		window.parent.document.getElementById("msg").innerHTML = "$msg";
	</script>
STR;
