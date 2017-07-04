<?php 
	class authModel{
		
		public function loginsubmit(){
			$username=daddslashes($_POST['adminname']);
			$psw=daddslashes($_POST['psw']);
			if (!empty($username)&&!empty($psw)) {
				if (!empty($_POST['verifystr'])) {
					if (strtolower($_POST['verifystr'])==$_SESSION['verify']) {
						$adminobj=M('admin');
						$seluser=$adminobj->checkinfo($username,$psw);
						if ($seluser){
			     		 	if ($_POST['autoFlag']) {
			     		 		setcookie("adminId",$seluser[0]['id'],time()+7*24*3600,'/');
			     		 		setcookie("adminName",$seluser[0]['adminname'],time()+7*24*3600,'/');
			     		 	}
			     		 	$_SESSION['adminName']=$seluser[0]['adminname'];
			     		 	$_SESSION['adminId']=$seluser[0]['id'];
			     		 	return '{"success":true}';
			     		 	
						}else{
							return '{"success":false,"msg":"用户名或密码错误"}';
						}
					}else{
						return '{"success":false,"msg":"验证码错误"}';
	     			} 
				}else{
	     			return '{"success":false,"msg":"验证码不能为空"}';
	    		}
			}else{
				return '{"success":false,"msg":"请输入用户名密码"}';
			}
		}

		// public function showpages($info){
		// 	$nums=count($info);
		// 	$pagesize=2;
		// 	$totalPages=ceil($nums/$pagesize);
		// 	$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
		// 	if ($page<1||$page==null||!is_numeric($page)) {
		// 		$page=1;
		// 	}
		// 	if ($page>=$totalPages) {
		// 		$page=$totalPages;
		// 	}
		// 	$array= array($pagesize*($page-1),$pagesize );
		// 	$adminobj=M('admin');
		// 	$rows=$adminobj->getAdminlimit($array);
		// 	$url="admin.php?controller=admin&method=admin_info";
		// 	$pages=showPage($page,$totalPages,$url);
		// 	return array($pages,$rows);
		// }

		// public function Adminsubmit($array){
		// 	if (empty($array['username'])||empty($array['username'])) {
		// 		if ($_POST['id']!='') {
		// 			return $res=0;
		// 		}else{
		// 			return $res=0;
		// 		}
		// 	}
		// 	$array=daddslashes($array);
		// 	if ($_POST['id']!='') {
		// 		$res=M('admin')->updateAdmin($array,$_POST['id']);
		// 		if ($res) {
		// 			return $res=2;
		// 		}else{
		// 			return $res=0;
		// 		}
		// 	}else{
		// 		$res=M('admin')->insertAdmin($array);
		// 		if ($res) {
		// 			return $res=2;
		// 		}else{
		// 			return $res=0;
		// 		}
		// 	}
		// }


	}
 ?>