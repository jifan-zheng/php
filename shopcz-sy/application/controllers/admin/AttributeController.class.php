<?php
//后台商品属性管理
class AttributeController extends BaseController {
	//显示属性
	public function indexAction(){
		//获取所有的商品类型
		$typeModel = new TypeModel('goods_type');
		$types = $typeModel->getTypes();
		$type_id = isset($_GET['type_id']) ? $_GET['type_id'] : 0 ;
		$attrModel = new AttributeModel('attribute');
		$pagesize = 3;
		$current = isset($_GET['page']) ?  $_GET['page'] : 1;
		$offset = ($current - 1) * $pagesize;
		$attrs = $attrModel->getPageAttrs($type_id,$offset,$pagesize);
		//分页获取
		$this->library('Page');
		if ($type_id == 0) {
			$where = "";
		} else {
			$where = "type_id = $type_id";
		}
		$total = $attrModel->total($where);
		$page = new Page($total,$pagesize,$current,'index.php',array(
			'p'=>'admin','c'=>'attribute','a'=>'index','type_id'=>$type_id));
		$pageinfo = $page->showPage();
		// $attrs = $attrModel->getAttrs($type_id);
		include CUR_VIEW_PATH . "attribute_list.html";
	}
	//显示添加属性页面
	public function addAction(){
		//获取所有的商品类型
		$typeModel = new TypeModel('goods_type');
		$types = $typeModel->getTypes();
		include CUR_VIEW_PATH . "attribute_add.html";
	}
	//属性入库操作
	public function insertAction(){
		//1.收集表单数据，以关联数组的形式来收集 CTRL+SHIFT +D 复制一行
		$data['attr_name'] = trim($_POST['attr_name']);
		$data['attr_type'] = $_POST['attr_type'];
		$data['attr_input_type'] = $_POST['attr_input_type'];
		$data['type_id'] = $_POST['type_id'];
		$data['attr_value'] = isset($_POST['attr_value']) ? $_POST['attr_value'] : "";
		//2.验证和处理
		if ($data['attr_name'] === '') {
			$this->jump('index.php?p=admin&c=attribute&a=add','属性名称不能为空');
		}
		if ($data['type_id'] == 0) {
			$this->jump('index.php?p=admin&c=attribute&a=add','必须要选择商品类型');
		}
		//进行转义处理
		$this->helper('input');
		$data = deepspecialchars($data);
		$data = deepslashes($data);
		//3.调用模型完成入库操作并给出提示
		$attrModel = new AttributeModel('attribute');
		if ($attrModel->insert($data)) {
			$this->jump("index.php?p=admin&c=attribute&a=index&type_id={$data['type_id']}",'添加属性成功');
		} else {
			$this->jump('index.php?p=admin&c=attribute&a=add','添加属性失败');
		}
		
	}
	//显示编辑属性页面
	public function editAction(){
		include CUR_VIEW_PATH . "attribute_edit.html";
	}
	//属性更新操作
	public function updateAction(){

	}
	//删除属性操作
	public function deleteAction(){

	}

	//获取指定类型下的属性
	public function getAttrsAction(){
		$type_id = $_GET['type_id'] + 0;
		//调用模型完成具体的操作
		$attrModel = new AttributeModel('attribute');
		// $attrs = $type_id;
		$attrs = $attrModel->getAttrsTable($type_id);
		echo <<<STR
		<script type="text/javascript">
			window.parent.document.getElementById("tbody-goodsAttr").innerHTML = "$attrs";
		</script>
STR;
	}
}