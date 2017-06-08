<?php
	class GroupsController extends ControllerBase
	{
		//默认为显示列表
		public function indexAction()
		{
			echo "index";
		}

		//插入数据
		public function insertAction()
		{
			$post = $this->request->getPost();
			if(!isset($post) || !isset($post["group_name"]))
			{
				return  "group_name 为必传参数";
			}
			if(isset($post['authority']))
			{	
				$phql = "insert into Groups(group_name,authority) values(:group_name:,:authority:)";
				$status=$this->modelsManager->executeQuery($phql,["group_name"=>$post['group_name'],"authority"=>$post['authority']]);
			}else
			{
				$phql = "insert into Groups(group_name) values(:group_name:)";
				$status=$this->modelsManager->executeQuery($phql,["group_name"=>$post['group_name']]);
			}

			if($status->success())
			{
				return "数据插入成功";
			}else
			{
				return "数据插入错误" . $status->getMessages();
			}

		}

		//更新用户组
		public function updateAction()
		{
			
			$post=$this->request->getPost();
			if(isset($post['group_name_new']))
			{
				$phql = "update Groups set group_name=:group_name_new:,updated_at=:updated_at: where group_name = :group_name_old:";

				$status = $this->modelsManager->executeQuery($phql,['group_name_new'=>$post['group_name_new'],'group_name_old'=>$post['group_name_old'],'updated_at'=>date("Y-m-d H:i:s")]);
				if($status->success())
				{
					return "更新成功";
				}else
				{
					return "更新失败" . $status->getMessages();
				}
			}

		}

		//软删除用户组
		
		public function deleteAction()
		{
			$post=$this->request->getPost();
			if(isset($post['group_name']))
			{
				$phql = "update Groups set deleted_at=:deleted_at: where group_name=:group_name:";
				$status = $this->modelsManager->executeQuery($phql,array("group_name"=>$post["group_name"],"deleted_at"=>date("Y-m-d H:i:s")));
				if($status->success())
				{
					return "删除成功";
				}else
				{
					return "删除失败" . $status->getMessages();
				}
			}else
			{
				return "group_name 为必传参数";
			}
		}


		public function listAction()
		{
			$this->view->disable();
			$post=$this->request->getPost();
			$page = isset($post['page']) ? $post['page'] : $post['page'] = 1;

			//计算总行数
			$phql = "select id from Groups where deleted_at is null";
			$result = $this->modelsManager->executeQuery($phql)->toArray();
			$count = count($result);
			
			$phql = "select * from Groups where deleted_at is null limit {start:int},2";
			$result = $this->modelsManager->executeQuery($phql,array('start'=>(int)$post['page'] ))->toArray();
			$result["count"]=$count;
			$this->dump($result);
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