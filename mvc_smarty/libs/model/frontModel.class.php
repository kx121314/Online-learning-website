<?php 
	class frontModel{
		public function getCourbytime(){
			$sql="select c.id,c.course_name,c.course_author,b.cate_name,c.summary,c.score,c.ready,c.pDes,c.pubtime,e.albumPath from courses as c left join cates as b on c.cid=b.id left join album as e on e.couid=c.id order by c.pubtime desc limit 0,10";
			$res=DB::something($sql);
			return $res;
		}
		public function getAll($table,$where,$fields,$limit){
			$res=DB::select($table,$where,$fields,$limit);
			return $res;
		}
		public function getcommend(){
			$sql="select c.id,c.course_name,c.course_author,b.cid,c.summary,c.score,c.ready,c.pDes,c.pubtime from courses as c left join cates as b on c.cid=b.id where c.id in(select commendid from commend) order by c.id";
			$res=DB::something($sql);
			return $res;
		}

		public function getCouridbyPart($id){
			$sql="select a.id,a.chapter_name,b.course_name,b.id as courid from chapters as a left join courses as b on a.bid=b.id where a.id in (select chid from parts where id='$id')";
			$res=DB::something($sql);
			return $res;
		}
		public function getleftBroP($partid,$courid){
			$sql="select * from parts where id = (select max(id) from parts where id<'$partid' and chid in(select id from chapters where bid='$courid'));";
			$res=DB::something($sql);
			return $res;
		}

		public function getrightBroP($partid,$courid){
			$sql="select * from parts where id = (select min(id) from parts where id>'$partid' and chid in(select id from chapters where bid='$courid'));";
			$res=DB::something($sql);
			return $res;
		}
		public function getmes($id){
			$sql="select m.id,u.username,m.content,m.pubtime from messages as m left join user as u on m.userid=u.id where m.id='$id'";
			$res=DB::something($sql);
			return $res;
		}
		public function getmesAll(){
			$sql="select m.id,u.username,m.content,m.pubtime from messages as m left join user as u on m.userid=u.id";
			$res=DB::something($sql);
			return $res;
		}

		public function getsearch($search){
			$sql="select c.*,b.cate_name,e.albumPath from courses as c left join cates as b on c.cid=b.id left join album as e on e.couid=c.id where c.course_name like '%{$search}%' order by c.id";
			$res=DB::something($sql);
			return $res;
		}
		

		public function loginsubmit(){
			$username=daddslashes($_POST['username']);
			$psw=daddslashes($_POST['psw']);
			if (!empty($username)&&!empty($psw)) {
				if (!empty($_POST['verifystr'])) {
					if (strtolower($_POST['verifystr'])==$_SESSION['verify']) {
						$seluser=$this->checkinfo($username,$psw);
						if ($seluser){
			     		 	if ($_POST['autoFlag']) {
			     		 		setcookie("userId",$seluser[0]['id'],time()+7*24*3600,'/');
			     		 		setcookie("userName",$seluser[0]['username'],time()+7*24*3600,'/');
			     		 	}
			     		 	$_SESSION['userName']=$seluser[0]['username'];
			     		 	$_SESSION['userId']=$seluser[0]['id'];
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
		public function registersubmit(){
			$username=daddslashes($_POST['username']);
			$password=daddslashes($_POST['password']);
			$email=daddslashes($_POST['email']);
			if (!empty($username)&&!empty($password)&&!empty($email)) {
					// $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
					$pattern = "/^\w+(\.\w+)*@\w+(\.\w+)+$/i";
        			if (preg_match($pattern,$email)){
						$seluser=$this->getAll('user',"username='$username'",'*','');
						if ($seluser){
			     		 	return '{"success":false,"msg":"已存在用户名"}';
						}else{
							if ($_POST['autoFlag']) {
			     		 		$array = array('username'=>$username,'password'=>$password,'email'=>$email);
			     		 		$res=M('course')->insertC('user',$array);
			     		 		if ($res) {
			     		 			return '{"success":true}';
			     		 		}	
			     		 	}else{
			     		 		return '{"success":false,"msg":"请同意条款"}';
			     		 	}
						}
					}else{
						return '{"success":false,"msg":"邮箱不合法"}';
	     			} 
				
			}else{
				return '{"success":false,"msg":"请填写完整"}';
			}
		}

		public function insertlearned($partid,$courid,$userid){
			$time=time();
			$array=array('userid'=>$userid,'courseid'=>$courid,'partid'=>$partid,'learntime'=>$time);
			$sel=$this->getAll('learned',"courseid='$courid'",'*','');
			if ($sel) {
				M('course')->updateC('learned',$array,$sel[0]['id']);
			}else{
				$res=M('course')->insertC('learned',$array);
			}
		}
		public function insertreaded($articleid,$userid){
			$time=time();
			$array=array('userid'=>$userid,'articleid'=>$articleid,'readtime'=>$time);
			$sel=$this->getAll('readed',"articleid='$articleid'",'*','');
			if ($sel) {
				M('course')->updateC('readed',$array,$sel[0]['id']);
			}else{
				$res=M('course')->insertC('readed',$array);
			}
		}

		public function getlearned($id){
			$sql="select l.*,c.course_name,p.part_name,h.albumPath from learned as l left join courses as c on l.courseid=c.id left join parts as p on l.partid=p.id left join album as h on l.courseid=h.couid where l.userid='$id' order by learntime desc";
			$res=DB::something($sql);
			return $res;
		}

		public function getreaded($id){
			$sql="select r.*,a.article_name,a.author from readed as r left join articles as a on r.articleid=a.id where r.userid='$id' order by readtime desc";
			$res=DB::something($sql);
			return $res;
		}


		public function checkinfo($username,$psw){
			$seluser=DB::select('user',"username='$username' and password='$psw'");
			return $seluser;
		} 


		public function getCourcate(){
			$sql="select c.id,c.course_name,c.course_author,b.cate_name,c.summary,c.score,c.ready,c.pDes,c.pubtime from courses as c left join cates as b on c.cid=b.id order by c.id";
			$res=DB::something($sql);
			return $res;
		}

		
	}
 ?>