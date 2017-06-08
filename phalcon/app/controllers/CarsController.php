<?php
	use Phalcon\Mvc\Model\Query;
	use Phalcon\Db\Profiler;
	class CarsController extends ControllerBase
	{

		public function Que1Action()
		{
			$query = new Query(
				"select * from Cars",
				$this->getDI()
				);
			$cars = $query->execute();
			// var_dump($cars);
			foreach ($cars->toArray() as  $cars)
			{
				# code...
				var_dump($cars);
				echo "<br>";
			}
		}

		public function Que2Action()
		{
			$cars = $this->modelsManager->executeQuery(
				"select * from Cars where brand_id = :id:",
				[
					"id" => 1,
				]
			);
			if($cars)
			{
				$this->dump($cars);
			}else
			{
				echo "false";
			}
			
		}

		//插入数据
		//
		public function insertAction()
		{
			$this->view->disable();
			$objCars=new Cars();
			$Post =$this->request->getPost();
			 echo $Post['name'] ."<br>";
			 echo $Post['brand_id']."<br>";
			 echo $Post['price']."<br>";
			echo $Post['year'] . "<br>";
			echo $Post['style'] ."<br>";
			
			if(!isset($Post['name']) || !isset($Post['brand_id']) || !isset($Post['price']))
			{
				echo "name|brand_id|price 是必选项";
			}

			$arr['name'] = $Post['name'];
			$arr['brand_id'] = $Post['brand_id'];
			$arr['price'] = $Post['price'];
			$arr['year'] = $Post['year'];
			$arr["style"] = $Post['style'];
			
			if($objCars ->create($arr))
			{
				echo "保存成功";
			}else
			{
				echo "保存失败";
			}

			// $objCars->create($arr);
			
		}

		public function phql1Action()
		{
			//初始化查询实例
			//使用Di来执行
			$query = new Query(
				"select * from Cars",
				$this->getDI()
				);
			$cars = $query->execute();
			$this->dump($cars);
			var_dump($this->getDi());
		}

		public function phql2Action()
		{
			//使用models manager来执行查询
			$query = $this->modelsManager->createQuery("select * from Cars");
			$cars = $query->execute();
			

			//传递参数
			$query = $this->modelsManager->createQuery("select * from Cars order by name");
			$cars = $query->execute();
			$this->dump($cars);
		}


		public function phql3Action()
		{
			//初始化查询实例并执行
			$cars = $this->modelsManager->executeQuery(
			"select * from Cars where name like :name:",
			[
				"name" => "%jifan%",
			]
			
			);
			$this->dump($cars);
		}

		public function phql4Action()
		{
			$manager = $this->modelsManager;
			$phql = "select c.*  from Cars AS c order by c.name";
			$cars = $manager->executeQuery($phql);
			foreach ($cars as $car)
			{
				echo "name:" ,$car->name,"<br>";
			}
		}

		public function phql5Action()
		{
			$manager = $this->modelsManager;
			$phql =  "SELECT c.price * 0.16 AS taxes, c. * FROM Cars AS c ORDER BY c.name";
			$result = $manager->executeQuery($phql);
			
			foreach($result as $row)
			{
				echo "name:",$row->c->name,"<br>";
				echo "price:",$row->c->price, "<br>";
				echo "taxes:",$row->taxes,"<br>";
			}
			foreach($result as $row)
			{
				echo "ok","<br>";
				var_dump($row);
			}
		}

		public function phql6Action()
		{
			$manager = $this->modelsManager;
			// $phql = "select Cars.*,Brands.* from Cars inner join Brands ";
			// $phql =  $phql = "SELECT Cars.name AS car_name, Brands.name AS brand_name FROM Cars JOIN Brands";
			$phql = "select *  from Cars,Brands where Brands.Bid = Cars.brand_id";
			$rows = $manager->executeQuery($phql)->toArray();
			// var_dump($rows);
			foreach ($rows as $row) 
			{
				# code...
				// $this->dump($row);
				// echo "<br>";
				// echo "<br>";
				// echo $row['car_name'], "<br>";
				// echo  $row['brand_name'], "<br>";
				var_dump($row->toArray());
				echo $row->Cars['id'];
				echo "<br>";
			}
		}

		public function phql7Action()
		{
			
			$users = new Cars();
			$users->raw();

		}

		public function phql8Action()
		{
			$manager=$this->modelsManager;
			$phql = "SELECT  Cars.id,Brands.Bid FROM Cars left join  Brands on  Brands.Bid = Cars.brand_id";
			$rows = $manager->executeQuery($phql);

			// foreach ($rows as $row) 
			// {
			// 	echo "Car: ", $row->cars->name, "<br>";
			// 	echo "Brand: ", $row->brands->Bname, "<br>";
			// }
			$this->dump($rows);
		}

		public function phql9Action()
		{
			$this->view->disable();
			$result = $this->modelsManager->createBuilder()
			->from("Cars")
				->leftjoin('Brands','Brands.Bid = Cars.brand_id')
			
			->getQuery()
			->execute();
			
			  //     ->leftjoin('Department','Department.id=User.department_id')
    	// ->where('User.deleted_at is null');
			print_r($result->toArray());
		}

		//innert join
		public function phql10Action()
		{
			$manager=$this->modelsManager;
			$phql = "select Cars.name AS car_name,Brands.name AS brand_name From Cars Join Brands";
			$rows = $manager->executeQuery($phql)->toArray();
			// $this->dump($phql);
			
			foreach ($rows as $row) {
				# code...
				var_dump($row);
				echo "<br>";
				echo "<br>";
			}
		}

		//left join
		public function phql11Action()
		{
			$manager=$this->modelsManager;
			$phql = "select Cars.name,Brands.name from Cars left join Brands";
			$rows = $manager->executeQuery($phql)->toArray();
			$this->dump($rows);
		}

		//Aggregations
		public function phql12Action()
		{
			$manager=$this->modelsManager;
			$phql = "select sum(price) As summatory FROM Cars";
			$row = $manager->executeQuery($phql)->getFirst();
			echo $row['summatory'];

			$phql = "select Cars.brand_id,count(brand_id) as count from Cars group by Cars.brand_id";
			$rows = $manager->executeQuery($phql)->toArray();
			// var_dump($rows);
			echo "<br>";

			foreach ($rows as $row) {
				# code...
				// $row[0]->
				// var_dump($row) ;
				// echo "<br>";
				// var_dump($row->toArray());
				// foreach ($row->toArray() as  $value) 
				// {
				// 	echo $value;
				// }
				
				echo $row['brand_id'];
				echo $row['count'];
				echo "<br>";
			}
		}

		//插入一条
		public function phql13Action()
		{
			$phql = "insert into Cars(name,brand_id,price,year,style) Values('jifan5',3,11,'2013-12-11','b')";
			$status=$this->modelsManager->executeQuery($phql);
			// var_dump($status);
			if($status->success())
			{
				echo "插入成功！";
			}
		}

		//插入多条
		public function phql14Action()
		{
			$phql = "insert into Cars(name,brand_id,price,year,style) values('jifan5',3,11,'2013-12-12',:style:)";
			for($i=30;$i<130;$i++)
			{
				$status=$this->modelsManager->executeQuery($phql,['style'=>$i]);
				if($status->success())
				{
					echo "插入成功。";
				}else
				{
					echo $status->getMessages();
				}
			}

			
		}

		//更新操作
		
		public function phql15Action()
		{
			$phql = "update  Cars set name=:name: where id=:id:";
			$status=$this->modelsManager->executeQuery($phql,['name'=>'update','id'=>5]);
			if($status->success())
			{
				echo "更新成功";
			}else
			{
				echo  $status->getMessages();
			}
		}

		//删除操作
		public function phql16Action()
		{
			$phql="delete from Cars where id=:id:";
			$status = $this->modelsManager->executeQuery($phql,['id'=>3]);
			if($status->success())
			{
				echo "删除成功";
			}else
			{
				echo  $status->getMessages();
			}			
		}

		//获取列表
		public function listAction()
		{	

			$phql = "select name,brand_id,price,year,style from Cars where name =:name: limit {start:int},{end:int}";
			$result=$this->modelsManager->executeQuery($phql,['name'=>'jifan5','start'=>10,'end'=>10])->toArray();
			$this->dump($result);

			

		}

		public function testAction()
		{

			$query = new Query(
				"select * from Cars  where id> :id:",
				$this->getDI() 
				);

				var_dump($query->getSql());
			
			$cars = $query->execute(["id"=>"10"]);
			// var_dump($cars);
			
			foreach ($cars->toArray() as  $cars)
			{
				# code...
				var_dump($cars);
				echo "<br>";
			}
		
		}

		public static  function dump($array)
		{	
			foreach ($array as  $cars)
			{
				# code...
				var_dump($cars);
				echo "<br>";
				echo "<br>";
			}
		}




	}
?>