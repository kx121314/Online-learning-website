<?php 
	header("Content-type: application/json;charset=utf-8");
	//url形式  index.php?controller=控制器名&method=方法名
	require_once('configs/config.php');
	require_once('framework/pc.php');
	PC::run($config);
 ?>