<?php
	class UsersController extends ControllerBase
	{

		//插入数据
		public function registerAction()
		{
			$users= new Users();
			$post = $this->request->getPost();

			//检查username是否为空
			if(!isset($post['username']))
			{
				return "username 为必传参数";
			}
			//检查username是否同名
			// $phql = "select id from Users where username = :username:";
			// $result=$this->modelsManager->executeQuery($phql,array("username"=>$post['username']))->toArray();
			$find = array('conditions'=>"username = :username:" ,"bind"=>["username"=>$post['username']] );
			$result = $users::find($find)->toArray();			
			if(count($result))
			{
				return "用户已经存在";
			}


			$users->password=isset($post['password']) ? $post['password']: null;
			$users->username=$post['username'];
			if($users->create())
			{
				return $users->username . "注册成功。";
			}

		}

		//多行插入
		public function insertsAction()
		{
			$post=$this->request->getPost();

			for($i=2;$i<100;$i++)
			{
				$phql="insert into Users(username,password) values(:username:,:password:)";
				$conditions = array('username'=>$i,'password'=>$i);
				$status=$this->modelsManager->executeQuery($phql,$conditions);
				if($status->success())
				{
					echo "插入成功";
				}
			}
		}

		public function editAction()
		{
			$this->view->disable();
			$post=$this->request->getPost();
			$users=Users::findFirst($post['id']);
			
			// $this->dump($obj);
			if(isset($post['username']))
			{	
				echo $post['username'];
				$users->username=$post['username'];
			}
			if(isset($post['password']))
			{
				echo " password";
				$users->password=$post['password'];
			}

			if($users->save())
			{
				echo "ok";
			}else
			{
				echo " no";
			}

			// $this->dump($users);

		}


		public static  function dump($array)
		{	
			foreach ($array as  $cars)
			{
				# code...
				var_dump($cars);
				echo "<br>";
				echo "<br>";
				exit();
			}
		}


		
	}
?>