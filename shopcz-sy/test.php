<?php
function test($n) {
	if ($n > 0) {
		echo $n, ",";
		test($n - 1);
		echo $n, ",";
	}
	
}
test(5); //5,4,3,2,1,1,2,3,4,5,
