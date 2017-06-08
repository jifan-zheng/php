<?php
//admin模型
class AdminModel extends Model {
	//验证用户名和密码
	public function checkUser($username,$password) {
		$password = md5($password);
		$sql = "SELECT * FROM {$this->table}
		        WHERE admin_name = '$username' AND password = '$password'
		        LIMIT 1";
		// echo $sql;
		// die;
		return $this->db->getRow($sql); //返回一维数组
	}


	public function getAdmins() {
		$sql = "SELECT * FROM {$this->table}";
		return $this->db->getAll($sql);
	}
}