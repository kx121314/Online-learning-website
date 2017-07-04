<?php 
error_reporting(E_ALL & ~E_NOTICE);
header('content-type:text/html;charset=utf-8');
class PdoMySQL{

	private static $_object = null;
	private static $link;
	/**
	 * 私有的构造函数
	 * @param array $dbConfig 连接数据库参数
	 */
	private function __construct($dbConfig=''){
		try {
			self::$link=new PDO($dbConfig['DB_TYPE'].':host='.$dbConfig['DB_HOST'].';dbname='.$dbConfig['DB_NAME'],$dbConfig['DB_USER'],$dbConfig['DB_PSW']);
			
		} catch (PDOException $e) {
			echo "链接失败".$e->getMessage();
		}
		
		 //self::$link=new PDO('mysql:host=localhost;dbname=test','root','root')or die("123");
		
	}
	/**
	 * 只能实例化一个对象
	 * @return obj 实例化对象
	 */
	public static function setnew($dbConfigs=''){
		if (empty(self::$_object)) {
			$dbConfig=$dbConfigs;
			self::$_object=new PdoMySQL($dbConfig);
		}
		return self::$_object;
	}

	public function insert($table,$array){
		$keys=join(',',array_keys($array));
		$vals="'".join("','",array_values($array))."'";
		$sql="insert {$table}($keys) values({$vals})";
		return $this->execute($sql);

	}

	public function selbyid($table,$priId='',$fields='*'){
		$sql='SELECT %s FROM %s WHERE id=%d';
		$sql=sprintf($sql,$fields,$table,$priId);
		return $this->query($sql);
	}

	public function getinsertid(){
		$link=self::$link;
		return $link->lastInsertId();
	}

	public function something($sql){
		return $this->query($sql);
	}


	/**
	 * 查找
	 * @param  string $table  数据表
	 * @param  string $where  选择条件
	 * @param  string $fields 查询数据
	 * @param  array/string $limit  查询从[0]到[1]的数据
	 * @return array        查询结果
	 */
	public function select($table,$where='',$fields='*',$limit=''){
		$sql="SELECT {$fields} FROM {$table}".$this->parseWhere($where).$this->parseLimit($limit);
		return $this->query($sql);
	}

	public function delete($table,$where){
		$sql="DELETE FROM {$table}".$this->parseWhere($where);
		return $this->execute($sql);
	}

	public function update($table,$arr,$where){
		foreach ($arr as $key => $value) {
			$sets.=$key."='".$value."',";
		}
		$sets=rtrim($sets,',');//去除$sets的最后一个,。
		$sql="UPDATE {$table} SET {$sets}".$this->parseWhere($where);
		return $this->execute($sql);
	}

	public function query($sql){
		$link=self::$link;
		if (!$link) {
			return false;
		}
		$stmt=$link->prepare($sql);
		$return=$stmt->execute();
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		if ($row) {
			return $row;
		}else{
			return false;
		}
	}
	public function execute($sql=null){
		$link=self::$link;
		if (!$link) {
			return false;
		}
		$return=$link->exec($sql);
		if ($return) {
			return $return;
		}else{
			return false;
		}
	}

	public function parseWhere($where){
		$whereStr='';
		if(is_string($where)&&!empty($where)){
			$whereStr=$where;
		}
		return empty($whereStr)?'':' WHERE '.$whereStr;
	}

	public function parseLimit($limit){
		$limitStr='';
		if(is_array($limit)){
			if(count($limit)>1){
				$limitStr.=' LIMIT '.$limit[0].','.$limit[1];
			}else{
				$limitStr.=' LIMIT '.$limit[0];
			}
		}elseif(is_string($limit)&&!empty($limit)){
			$limitStr.=' LIMIT '.$limit;
		}
		return $limitStr;
	}

}
	


 ?>