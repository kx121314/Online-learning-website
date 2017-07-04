<?php
	function C($name, $method){
		require_once('/libs/controller/'.$name.'Controller.class.php');
		$name=$name.'Controller';
		$obj=new $name();
		$obj->$method();
	}

	function M($name){
		require_once('/libs/model/'.$name.'Model.class.php');
		//$testModel = new testModel();
		$name=$name.'Model';
		$obj=new $name();
		return $obj;
	}
	
	function V($name){
		require_once('/libs/view/'.$name.'View.class.php');
		//$testView = new testView();
		$name=$name.'View';
		$obj=new $name();
		return $obj;
	}
	
	/**
	 * [ORG description]
	 * @str [type] $path   [路径]
	 * @str [type] $name   [第三方类名]
	 * @array array  $params [是该类初始化的时候需要指定、赋值的属性]
	 */
	function ORG($path, $name, $params=array()){
		require_once('libs/ORG/'.$path.$name.'.class.php');
		//eval('$obj = new '.$name.'();');
		$obj = new $name();
		if(!empty($params)){
		foreach($params as $key=>$value){
				//eval('$obj->'.$key.' = \''.$value.'\';');
				$obj->$key = $value;
			}
		}
		return $obj;
	}

	// 从 PHP 5.4.O 起，始终返回FALSE，因为魔术引号功能已经从 PHP 中移除了。
	function daddslashes($str) { 
		if(is_array($str)) { 
			foreach($str as $key => $val) { 
				$str[$key] = (!get_magic_quotes_gpc())?addslashes($val):$val; 
			} 
		} else { 
			$string = (!get_magic_quotes_gpc())?addslashes($str):$str;
		} 
		return $str; 
	} 


	// 分页代码
	function showPage($page,$totalPages,$url){
		$index=($page==1)?"<span>首页</span>":"<a href='{$url}&page=1'>首页</a>";
		$last=($page==$totalPages)?"<span>末页</span>":"<a href='{$url}&page={$totalPages}'>末页</a>";
		$prev=($page==1)?"<span>上一页</span>":"<a href='{$url}&page=".($page-1)."'>上一页</a>";
		$next=($page==$totalPages)?"<span>下一页</span>":"<a href='{$url}&page=".($page+1)."'>下一页</a>";
		for ($i=1; $i <=$totalPages; $i++) { 
				//当前页无连接
				if ($page==$i) {
					$p.="<span class='selnum'>{$i}</span>";
				}else{
					$p.="<a href='{$url}&page={$i}'>{$i}</a>";
				}
			}
		$re=$index.$prev.$p.$next.$last;
		return $re;	
	}


?>