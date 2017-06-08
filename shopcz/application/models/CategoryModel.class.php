<?php
	//商品分类模型
	class CategoryModel extends  Model 
	{
		public function getCats()
		{
			$sql = "SELECT * FROM {$this->table}";
			$this->db->getAll($sql);
			return $this->db->getAll($sql);
		}
	}

?>