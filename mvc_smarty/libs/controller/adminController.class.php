<?php 
	//header("Content-type: text/plain;charset=utf-8");
	class adminController{

		public function __construct(){
			session_start();
			if ((!$_POST)&&(PC::$method!='login')) {
				if(empty($_SESSION['adminId'])&&empty($_COOKIE["adminId"])){
					$this->locationTo('admin.php?controller=admin&method=login');
				}
			}
		}

		public function checkLogin(){
			$authobj=M('auth');
			$re=$authobj->loginsubmit();
			echo $re;
		}

		public function logout(){
			$_SESSION=array();
			if(isset($_COOKIE[session_name()])){
				setcookie(session_name(),"",time()-1);
			}
			if(isset($_COOKIE['adminId'])){
				setcookie("adminId","",time()-1,'/');
			}
			if(isset($_COOKIE['adminName'])){
				setcookie("adminName","",time()-1,'/');
			}
			session_destroy();
			$this->locationTo('admin.php?controller=admin&method=login');
		}

		public function login(){
			if(empty($_SESSION['adminId'])&&empty($_COOKIE["adminId"])){
				VIEW::display('tpl/admin/login.php');
			}else{
				$this->locationTo('admin.php?controller=admin&method=hind_page');
			}
		}

		public function hind_page(){
			if (isset($_SESSION['adminName'])) {
                VIEW::assign(array('adminName'=>$_SESSION['adminName']));
             }elseif (isset($_COOKIE['adminName'])) {
               	VIEW::assign(array('adminName'=>$_COOKIE['adminName']));
             }

			VIEW::display('tpl/admin/hind_page.html');
		}

		public function cate_list(){
			$info=M('course')->getCateAll();
			if (!$info) {
				$this->showmessage('没有分类，请添加。','admin.php?controller=admin&method=addCate');
			}
			$authobj=M('course');
			$url="admin.php?controller=admin&method=cate_list";
			$res=$authobj->showpages($info,'getCatelimit',$url,5);
			$rows=$res[1];
			$pages=$res[0];
			VIEW::assign(array('data'=>$rows,'pages'=>$pages));
			VIEW::display('tpl/admin/cate_list.html');
		}

		public function addCate(){
			$info=M('course')->getCateAll();
			if (empty($_POST)) {
				if (isset($_GET['id'])) {
					$res=M('course')->getCOne('cates',$_GET['id']);
				}else{
					$res=array();
				}
				VIEW::assign(array('data'=>$res,'info'=>$info));
				VIEW::display('tpl/admin/addCate.html');
			}else{
				$array=$_POST;
				$res=M('course')->Catesubmit($array);
				switch ($res) {
					case '0':
						$this->showmessage('操作失败','admin.php?controller=admin&method=addCate&id='.$_POST['id']);
						break;
					case '2':
						$this->showmessage('操作成功','admin.php?controller=admin&method=cate_list');
				}
			}	
		}

		public function delCate(){
			$res1=M('front')->getAll('cates','cid='.$_GET['id'],'*','');
			$res2=M('front')->getAll('courses','cid='.$_GET['id'],'*','');
			$res3=M('front')->getAll('articles','cid='.$_GET['id'],'*','');
			if ($res1||$res2||$res3) {
				$this->showmessage('NO！分类下有内容','admin.php?controller=admin&method=cate_list');
			}else{
				M('course')->delCbyid('cates',$_GET['id']);
				$this->showmessage('操作成功','admin.php?controller=admin&method=cate_list');
			}
		}


		public function addCourse(){
			$info=M('course')->getCateAll();
			if (empty($_POST)) {
				if (isset($_GET['id'])) {
					$res=M('course')->getCOne('courses',$_GET['id']);
				}else{
					$res=array();
				}
				VIEW::assign(array('data'=>$res,'info'=>$info));
				VIEW::display('tpl/admin/addCourse.html');
			}else{
				$array=$_POST;
				$array['pubtime']=time();
				$res=M('course')->Coursesubmit($array);
				switch ($res) {
					case '0':
						$this->showmessage('操作失败','admin.php?controller=admin&method=addCourse&id='.$_POST['id']);
						break;
					case '2':
						$this->showmessage('操作成功','admin.php?controller=admin&method=course_list');
				}
			}
		}
		public function course_list(){
			$info=M('course')->getCourseAll();
			if (!$info) {
				$this->showmessage('没有课程，请添加。','admin.php?controller=admin&method=addCourse');
			}
			$authobj=M('course');
			$url="admin.php?controller=admin&method=course_list";
			$res=$authobj->showpages($info,'getCourselimit',$url,5);
			$rows=$res[1];
			$pages=$res[0];
			VIEW::assign(array('data'=>$rows,'pages'=>$pages));
			VIEW::display('tpl/admin/course_list.html');

		}
		public function delCourse(){
			$res=M('course')->delCbyid('courses',$_GET['id']);
			if ($res) {
				M('course')->del('learned','courseid='.$_GET['id']);
				$pic=M('front')->getAll('album','couid='.$_GET['id'],'*','');
					unlink('uploads/'.$pic['0']['albumPath']);
				M('course')->del('album','couid='.$_GET['id']);
				$chap=M('front')->getAll('chapters','bid='.$_GET['id'],'*','');
				foreach ($chap as $key) {
					$pv=M('course')->getPV($key['id']);
					foreach ($pv as $a) {
						unlink('videos/'.$a['videoPath']);
						M('course')->del('videos','partid='.$a['id']);
						M('course')->del('messages','partid='.$a['id']);
					}
					M('course')->del('parts','chid='.$key['id']);
				}
				M('course')->del('chapters','bid='.$_GET['id']);
			}
			echo "<script>window.location.href='admin.php?controller=admin&method=course_list'</script>";
		}


		public function showChapter(){
			$res=M('course')->getChapterAll($_GET['id']);
			$cour=M('course')->getCOne('courses',$_GET['id']);
			$parts_i=M('course')->getPartAll();
			$array['id']=$_GET['id'];
			VIEW::assign(array('data'=>$res,'parts_i'=>$parts_i,'cou_id'=>$array,'cour'=>$cour));
			VIEW::display('tpl/admin/chapter.html');
		}

		public function addChapter(){
			if (empty($_POST)) {
				$course=M('course')->getCOne('courses',$_GET['id']);
				$res=array();
				VIEW::assign(array('info'=>$course,'data'=>$res));
				VIEW::display('tpl/admin/addChapter.html');
			}else{
				$array=$_POST;
				$res=M('course')->Chaptersubmit($array);
				switch ($res) {
					case '0':
						$this->showmessage('操作失败','admin.php?controller=admin&method=showChapter&id='.$array['bid']);
						break;
					case '2':
						$this->showmessage('操作成功','admin.php?controller=admin&method=showChapter&id='.$array['bid']);
				}
			}
		}
		public function editChapter(){
			$res=M('course')->getCOne('chapters',$_GET['id']);
			$course=M('course')->getCOne('courses',$res[0]['bid']);
			VIEW::assign(array('info'=>$course,'data'=>$res));
			VIEW::display('tpl/admin/addChapter.html');
			
		}
		public function delChapter(){
			$res=M('course')->getCOne('chapters',$_GET['id']);
			$pv=M('course')->getPV($_GET['id']);
			foreach ($pv as $a) {
				unlink('videos/'.$a['videoPath']);
				M('course')->del('videos','partid='.$a['id']);
				M('course')->del('messages','partid='.$a['id']);
			}
			M('course')->del('parts','chid='.$_GET['id']);
			M('course')->del('chapters','id='.$_GET['id']);
			M('course')->del('learned','courseid='.$res[0]['bid']);
			echo "<script>window.location.href='admin.php?controller=admin&method=showChapter&id=".$res[0]['bid']."';</script>";
		}

		public function addPart(){
			if (empty($_POST)) {
				$chapter=M('course')->getCOne('chapters',$_GET['id']);
				$res=array();
				VIEW::assign(array('info'=>$chapter,'data'=>$res));
				VIEW::display('tpl/admin/addPart.html');
			}else{
				$array=$_POST;
				$course_id=M('course')->getCOne('chapters',$array['chid']);
				$res=M('course')->Partsubmit($array);
				switch ($res) {
					case '0':
						$this->showmessage('操作失败','admin.php?controller=admin&method=showChapter&id='.$course_id[0]['bid']);
						break;
					case '2':
						$this->showmessage('操作成功','admin.php?controller=admin&method=showChapter&id='.$course_id[0]['bid']);
				}
			}
		}
		public function editPart(){
			$res=M('course')->getCOne('parts',$_GET['id']);
			$chapter=M('course')->getCOne('chapters',$res[0]['chid']);
			VIEW::assign(array('info'=>$chapter,'data'=>$res));
			VIEW::display('tpl/admin/addPart.html');
		}
		public function delPart(){
			$re=M('course')->getCOne('parts',$_GET['id']);
			$res=M('course')->getCOne('chapters',$re[0]['chid']);
			$v=M('front')->getAll('videos','partid='.$_GET['id'],'*','');
			unlink('videos/'.$v[0]['videoPath']);
			M('course')->del('videos','partid='.$_GET['id']);
			M('course')->del('messages','partid='.$_GET['id']);
			M('course')->del('parts','id='.$_GET['id']);
			M('course')->del('learned','courseid='.$res[0]['bid']);
			echo "<script>window.location.href='admin.php?controller=admin&method=showChapter&id=".$res[0]['bid']."';</script>";
		}

		public function addArticle(){
			$info=M('course')->getCateAll();
			if (empty($_POST)) {
				if (isset($_GET['id'])) {
					$res=M('course')->getCOne('articles',$_GET['id']);
				}else{
					$res=array();
				}
				VIEW::assign(array('data'=>$res,'info'=>$info));
				VIEW::display('tpl/admin/addArticle.html');
			}else{
				$array=$_POST;
				$array['pubtime']=time();
				$res=M('course')->Articlesubmit($array);
				switch ($res) {
					case '0':
						$this->showmessage('操作失败','admin.php?controller=admin&method=addArticle&id='.$_POST['id']);
						break;
					case '2':
						$this->showmessage('操作成功','admin.php?controller=admin&method=article_list');
				}
			}
		}
		public function article_list(){
			$info=M('course')->getArticleAll();
			if (!$info) {
				$this->showmessage('没有文章，请添加。','admin.php?controller=admin&method=addArticle');
			}
			$authobj=M('course');
			$url="admin.php?controller=admin&method=article_list";
			$res=$authobj->showpages($info,'getArticlelimit',$url,5);
			$rows=$res[1];
			$pages=$res[0];
			VIEW::assign(array('data'=>$rows,'pages'=>$pages));
			VIEW::display('tpl/admin/article_list.html');

		}
		public function delArticle(){
			$res=M('course')->delCbyid('articles',$_GET['id']);
			if ($res) {
				M('course')->del('readed','articleid='.$_GET['id']);
			}
			echo "<script>window.location.href='admin.php?controller=admin&method=article_list'</script>";
		}

		public function messages(){
			$info=M('front')->getAll('messages','partid='.$_GET['id'],'*','');
			 $url="admin.php?controller=admin&method=messages&id=".$_GET['id'];
			$res=M('course')->showpagesby($info,'getMessagelimit',$_GET['id'],$url,5);
			$rows=$res[1];
			$pages=$res[0];
			VIEW::assign(array('data'=>$rows,'pages'=>$pages));
			VIEW::display('tpl/admin/messages.html');

		}

		public function delmessage(){
			$re=M('course')->getmessbyid($_GET['id']);
			M('course')->delCbyid('messages',$_GET['id']);
			echo "<script>window.location.href='admin.php?controller=admin&method=messages&id=".$re[0]['partid']."';</script>";
		}


		private function locationTo($url){
			echo "<script>window.location.href='$url'</script>";
			exit;
		}
		private function showmessage($info, $url){
			echo "<script>alert('$info');window.location.href='$url'</script>";
			exit;
		}


	}
 ?>