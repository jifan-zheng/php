<?php
	//后台商品分类管理
	class CategoryController extends Controller
	{
		
		//显示分类
		public  function indexAction()
		{
			include CUR_VIEW_PATH . "cat_list.html";
		}

		//显示添加分类页面
		public function addAction()
		{
			//获取所有的分类
			$categoryModel = new CategoryModel('category');
			$cats = $categoryModel->getCats();
			// var_dump($cats);
			// exit();
			//载入视图
			include CUR_VIEW_PATH . "cat_add.html";

		}

		//分类入库操作
		public function insertAction()
		{
			//1.收集表单数据，以关联数组的形式来收集 ctrl+shift+d复制一行
			$data['cat_name'] = trim($_POST['cat_name']);
			$data['parent_id'] = $_POST['parent_id']; //多点编辑CTRL + D
			$data['unit'] = trim($_POST['unit']);
			$data['sort_order'] = trim($_POST['sort_order']);
			$data['cat_desc'] = trim($_POST['cat_desc']);
			$data['is_show'] = $_POST['is_show'];
			
			//2.验证和处理
			if($data['cat_name'] === '')
			{
				$this->jump('index.php?p=admin&c=category&a=add','分类名称不能为空');
			}
			//3.调用模型完成入库操作并给出提示
			$categoryModel = new CategoryModel('category');
			if($categoryModel->insert($data))
			{
				$this->jump('index.php?p=admin&c=category&a=index','添加分类成功',1);
			}else
			{
				$this->jump('index.php?p=admin&c=category&a=add','添加分类失败');
			}
		}

		//显示编辑分类页面
		public function editAction()
		{
			include CUR_VIEW_PATH . "cat_edit.html";
		}

		//分类更新操作
		public function updateAction()
		{

		}

		//删除分类操作
		public function deleteAction()
		{

		}
	}
	
?>