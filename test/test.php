<?php
	/*pdo模块连接mysql
	// echo dirname(__DIR__) ;
	$dbms='mysql';
	$host='localhost';
	$dbName='order_sys';
	$user='root';
	$pass='password';
	$dsn="$dbms:host=$host;dbname=$dbName";

	$dbh = new PDO('mysql:host=localhost;dbname=order_sys','root','password');

	$sql="insert into users(name,age) values('jifan1',22)";
	echo $dbh->exec($sql)."<br>";
	foreach($dbh->query('select * from users')->fetchAll(1) as $row )
	{
		// print $row['id'] . "\t";
		// print $row['name'] . "\t";
		// print $row['age'] . "\t";
		// 
		var_dump($row);
		echo "<br>";
	}	
	*/
	//切割数组
	// $fruits = array("Apple","Banana","Orange","Pear","Grape");
	// $subset = array_slice($fruits,-2, 2);
	// var_dump($subset);
	phpinfo();

?>
