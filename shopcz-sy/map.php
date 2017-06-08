<?php
$arr = array(1,2,3,4,5);
//求它们的平方
/*
foreach ($arr as $k => $v) {
	$arr[$k] = $v * $v;
}
*/
//定义一个函数，求指定数的平方
function pf($n){
	return $n * $n;
}
$arr1 = array_map('pf', $arr);
echo "<pre>";
print_r($arr1);