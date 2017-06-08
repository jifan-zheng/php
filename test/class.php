<?php
//熟悉类的基本操作
//声明一个类，配置类的公共属性，基本方法 
// class Persion  {

// 	public  $name;
// 	function setName($name){
// 		$this->name = $name;
// 	}
// 	function getName(){
// 		return $this->name;
// 	}
// }

// $judy = new Persion();
// $judy->setName("Judy");

// $joe = new Persion();
// $joe->setName("Joe");

// print $judy->getName() . "\n";
// print $joe->getName() . "\n";

/*****构造函数*******/
// class Persion {
// 	function  __construct($name){
// 		$this->name = $name;
// 	}
// 	function getName(){
// 		return $this->name;
// 	}
// 	private $name;
// }
// $judy = new Persion("judy");
// $joe = new Persion('joe');

// print $judy->getName();
// print $joe->getname();
// 
/***使用$this变量访问属性***/
//    class Myclass {
//    		public $publicMember = "Public member";
//    		protected $protectedMemter = "Protected member";
//    		private $privateMember = "Private member";
//    		function myMethod(){
//    			//
//    		}
//    }
//    class MyDbConnectionClass{
//    		public $queryResult;
//    			protected $dbHostname  = "localhost";
//    			private $connectionHandle;
//    		//
//    }
//    class MyFooDotComDbConnectionClass extends MyDbConnectionClass {
//    		protected $dbHostname = "foo.com";
//    }
// **public protected和private方法**
// 	class MyDbConnectionClass{
// 		public function connect(){
// 			$conn = $this->createDbConnection();
// 			$this->setDbConnection($conn);
// 			return $conn;
// 		}
// 		protected function createDbConnection(){
// 			return mysql_connect("localhost");
// 		}
// 		private function setDbConnection($conn){
// 			$this->dbConnection =$conn;
// 		}
// 		private $dbConnection;
// 	}
// 	class MyFooDotComDbConnectionClass extends MyDbConnectionClass{
// 		protected function createDbConnection()
// 		{
// 			return mysql_connect("foo.com");
// 		}
// 	}
// 	
	$rand=rand(1,1024);
	echo $rand;
?>