<?php	
	use Phalcon\Mvc\Model\Query;
	class CurdController extends ControllerBase{
		/*create */
		public  function cAction(){
				$user = new Users();
				$user->age = 3;
				$user->name = "bruce";
				$user->save();
			}
		/*retrieve*/
		public  function rAction(){
			 $objUser = Users::findFirst();
			 var_dump($objUser->toArray());
			}
		/*retrieve all*/
		public  function aAction(){
			 $objUser = Users::find();
			 foreach ($objUser as $user) {
			 	# code...
			 	var_dump($user->toArray());
			 	echo "<br>";
			 }
			}
		/*update*/
		public  function uAction(){
				$objUser = new Users();
				$objUser->id=1;
				$objUser->name="jifan";
				$objUser->age=21;
				$objUser->update();
			}
		/*delete */
		public  function dAction(){
				$objUser = new Users();
				$objUser->id=2;
				$objUser->delete();
			}
		public function rawAction(){
			$sql = "select id,name from users";
			$objUser = new Users();
			$result = $objUser->getReadConnection()->query($sql)->fetchAll(2);
			

			foreach ($result as $result) {
				
				$result=json_encode($result);
				var_dump($result);
				echo "<br>";
			}
		}

		public function insertAction()	
		{

			$objUser = new Users();
			// $title = $this->request->getPost("title","striptags");
			$name = $this->request->getPost('name');
			$age = $this->request->getPost('age');
			for($i=0;$i<50;$i++)
			{
				$array['name'] = "jifan".$i;
				$array['age']=$i;
				$objUser->insert($array);
			}

		}
		public function indexAction()
		{
			// $result=Users::find(["name='jifan1' and "]);
			$result = $this->modelsManager->executeQuery("select * from Users where name='jifan1'");
			foreach ($result->toArray() as $result) {
				# code...
				var_dump($result);
				echo "<br>";
			}
			
		}

	}

?>