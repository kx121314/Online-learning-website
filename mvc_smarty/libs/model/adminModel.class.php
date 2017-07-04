<?php 
	class adminModel{
		public $_table='admins';

		public function checkinfo($username,$psw){
			$seluser=DB::select($this->_table,"adminname='$username' and password='$psw'");
			return $seluser;
		} 

		public function getAdminOne($id){
			$id=intval($id);
			$res=DB::selbyid($this->_table,$id);
			return $res;
		}

		// public function getAdminAll(){
		// 	$res=DB::select($this->_table);
		// 	return $res;
		// }

		// public function getAdminlimit($array){
		// 	$res=DB::select($this->_table,'','*',$array);
		// 	return $res;
		// }

		// public function insertAdmin($array){
		// 	$res=DB::insert($this->_table,$array);
		// 	return $res;
		// }

		// public function updateAdmin($array,$id){
		// 	$res=DB::update($this->_table,$array,"id='$id'");
		// 	return $res;
		// }
		
	}
 ?>