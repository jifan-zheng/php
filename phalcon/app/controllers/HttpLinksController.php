<?php
	class HttpLinksController extends ControllerBase{
		// /*批量插入*/
		// public function insertAction(){
		// 	$table = new LinksHttp();
		// 	$table->title="title";
		// 	$table->http="http://nihao.com";
		// 	$i = 0;
		// 	while($i<100){
		// 		$table->orderby=$i;
		// 		$table->save();
		// 		$i++;
		// 		echo $i.'<br>';
		// 	}
		// }
		public function  testAction(){

			$query = $this->modelsManager->createQuery("SELECT * FROM  LinksHttp");
			$result=$query->execute();
			foreach ($result as $res) {
				# code...
			 	var_dump($res->toArray());
			 	echo "<br>";
			 	echo "<br>";
			
			}
			
		}
		// public function insertsAction(){
		// 	$table = new LinksHttp();
		// 	$sql = "insert into "
		// }
	}
?>