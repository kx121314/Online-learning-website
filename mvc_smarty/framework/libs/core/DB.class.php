<?php
	class DB{

		public static $db;

		public static function init($name,$config){
			self::$db=$name::setnew($config);
		}

		public static function insert($table,$array){
			return self::$db->insert($table,$array);
		}

		public static function selbyid($table,$priId='',$fields='*'){
			return self::$db->selbyid($table,$priId,$fields);
		}

		public static function getinsertid(){
			return self::$db->getinsertid();
		}

		public static function something($sql){
			return self::$db->something($sql);
		}

		public static function select($table,$where='',$fields='*',$limit=''){
			return self::$db->select($table,$where,$fields,$limit);
		}

		public static function delete($table,$where){
			return self::$db->delete($table,$where);
		}

		public static function update($table,$arr,$where){
			return self::$db->update($table,$arr,$where);
		}
	}

?>