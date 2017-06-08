<?php
	//admin模型AdminModel
	class AdminModel extends Model{
		public function getAdmins(){
			$sql = "SELECT * FROM cz_admin";
			return $this->db->getAll($sql);
		}
	}
?>