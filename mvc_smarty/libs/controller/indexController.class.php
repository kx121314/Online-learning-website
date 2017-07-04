<?php 
	class indexController{

		public function __construct(){
			session_start();
			
		}
		/**
		 * 显示首页
		 * 
		 */
		public function index(){
			//通过时间获取最新的十个课程
			$Tencourse=M('front')->getCourbytime();
			$bigcate=M('front')->getAll('cates','','*',array(0,6));
			$smallcate=M('front')->getAll('cates','','*',5);
			//获取推荐课程，有个推荐表
			$commend=M('front')->getcommend();
			$this->checkSession();
			VIEW::assign(array('Tencourse'=>$Tencourse,'bigcate'=>$bigcate,'smallcate'=>$smallcate,'commend'=>$commend));
			VIEW::display('tpl/front/index.html');
			
		}

		/**
		 * 课程列表
		 * 
		 */
		public function course_list(){
			$info=M('course')->getCourseAll();
			$url="index.php?controller=index&method=course_list";
			//设置分页
			$res=M('course')->showpages($info,'getCourselimit',$url,10);
			// 如果传入分类，则显示分类下课程和小分类，否则显示全部
			if (isset($_GET['cate'])) {
				// 获取小分类
				$catebycid=M('front')->getAll('cates','cid='.$_GET['cate'],'*','');
				$info=M('course')->getCourseAllbc($_GET['cate']);
				$res=M('course')->showpagesby($info,'getCourselimitbc',$_GET['cate'], $url,10);
				// 如果传入小分类，则按小分类显示
				if (isset($_GET['id'])) {
					$info=M('front')->getAll('courses','cid='.$_GET['id'],'*','');
					$res=M('course')->showpagesby($info,'getCourselimitsc',$_GET['id'],$url,10);
				}
			}else{
				$catebycid=array();
			}
			
			$bigcate=M('front')->getAll('cates','','*',array(0,6));
			$smallcate=M('front')->getAll('cates','','*',5);
			$rows=$res[1];
			$pages=$res[0];

			$this->checkSession();

			VIEW::assign(array('data'=>$rows,'pages'=>$pages,'bigcate'=>$bigcate,'smallcate'=>$smallcate,'catebycid'=>$catebycid));
			VIEW::display('tpl/front/course_list.html');
		}

		/**
		 * 课程章节信息 传入课程ID
		 * 
		 */
		public function course(){
			$this->sayno();
			//获取所有章
			$learned=M('front')->getAll('learned','courseid='.$_GET['id'],'*','');
			$res=M('course')->getChapterAll($_GET['id']);
			//获取课程主要信息
			$cour=M('course')->getCOne('courses',$_GET['id']);
			//获取所有小节 在前端通过if判断所属章
			$parts_i=M('course')->getPartAll();
			$array['id']=$_GET['id'];

			$this->checkSession();

			VIEW::assign(array('data'=>$res,'parts_i'=>$parts_i,'cou_id'=>$array,'cour'=>$cour,'learned'=>$learned));
			VIEW::display('tpl/front/course.html');
		}

		/**
		 * 显示video页面
		 * 传来的数据 part的id
		 * 通过partid 获取小节名称；获取小节video；获取所属课程信息；通过所属课程ID和小节ID获取上下节ID；
		 * 
		 */
		public function study_video(){
			$this->sayno();
			$res=M('course')->getCOne('parts',$_GET['id']);
			$video=M('front')->getAll('videos','partid='.$_GET['id'],'*','');
			$courinfo=M('front')->getCouridbyPart($_GET['id']);
			//插入/更新学习记录
			M('front')->insertlearned($_GET['id'],$courinfo[0]['courid'],$_GET['uid']);
			// 设置上下节
			$leftbro=M('front')->getleftBroP($_GET['id'],$courinfo[0]['courid']);
			$rightbro=M('front')->getrightBroP($_GET['id'],$courinfo[0]['courid']);
			//

			$this->checkSession();
			VIEW::assign(array('part'=>$res,'video'=>$video,'courinfo'=>$courinfo,'leftbro'=>$leftbro,'rightbro'=>$rightbro));
			VIEW::display('tpl/front/study_video.html');
		}

		public function ajaxmes(){
			$array=$_POST;
			$array['pubtime']=time();
			if (!empty($_POST['content'])) {
				$res=M('course')->insertC('messages',$array);
				if ($res) {
					//获取刚插入的id
					$id=M('course')->getinsertid();
					$mes=M('front')->getmes($id);
					$mes[0]['pubtime']=date('Y-m-d',$mes[0]['pubtime']);
					$res=<<<EOF
					<div class="cou_outer clearfix">
						<div class="user_header">

						</div>
						<div class="comment_content">
							<h5>{$mes[0]['username']}</h5>
							<span class="content">{$mes[0]['content']}</span>
							<span class="pub_time">时间：{$mes[0]['pubtime']}</span>
							<span class="good">123</span>
						</div>
					</div>
EOF;
					$param = array('success'=>true,'msg'=>$res);
					$param=json_encode($param);
				}else{
					$param = array('success'=>false,'msg'=>'好像哪里不对');
					$param=json_encode($param);
				}
			}else{
				$param = array('success'=>false,'msg'=>'评论内容不能为空');
				$param=json_encode($param);
			}
			echo $param;
		}
		public function messages(){
			$url="index.php?controller=index&method=messages&id=".$_GET['id'];
			$mesAll=M('front')->getAll('messages','partid='.$_GET['id'],'*','');
			$res=M('course')->showpagesby($mesAll,'getMessagelimit',$_GET['id'],$url,8);
			$mess=$res[1];
			$pages=$res[0];
			VIEW::assign(array('mess'=>$mess,'pages'=>$pages));
			VIEW::display('tpl/front/messages.html');
			
		}

		public function checkLogin(){
			$re=M('front')->loginsubmit();
			echo $re;
		}

		/**
		 * 注册页面，如果没有post数据，显示注册页面，否则提交数据
		 * 
		 */
		public function register(){
			if (empty($_POST)) {
				VIEW::display('tpl/front/register.html');
			}else{
				$re=M('front')->registersubmit();
				echo $re;
			}	
		}
		public function homepage(){
			$this->checkSession();
			VIEW::display('tpl/front/homepage.html');
		}

		/**
		 * 用户学习信息，传入用户ID
		 */
		public function user_study(){
			$this->sayno();
			$id=$_GET['id'];

			//获取所学课程的主要信息 id->name album
			$res=M('front')->getlearned($id);
			//处理时间
			$tim['y']=date('Y',$res[0]['learntime']);
			$tim['md']=date('m.d',$res[0]['learntime']);
			
			VIEW::assign(array('data'=>$res,'tim'=>$tim));
			VIEW::display('tpl/front/user_study.html');
		}

		public function dellearned(){
			$id=$_GET['id'];
			$uid=$_GET['uid'];
			M('course')->delCbyid('learned',$id);
			echo "<script>window.location.href='index.php?controller=index&method=user_study&id={$uid}'</script>";
		}

		/**
		 * 文章列表
		 * 
		 */
		public function article_list(){
			$info=M('front')->getAll('articles','','*','');
			$url="index.php?controller=index&method=article_list";
			//设置分页
			$res=M('course')->showpages($info,'getArticlelimit',$url,10);
			// 如果传入分类，则显示分类下课程和小分类，否则显示全部
			if (isset($_GET['cate'])) {
				// 获取小分类
				$catebycid=M('front')->getAll('cates','cid='.$_GET['cate'],'*','');
				$info=M('course')->getArticleAllbc($_GET['cate']);
				$res=M('course')->showpagesby($info,'getArticlelimitbc',$_GET['cate'], $url,10);
				// 如果传入小分类，则按小分类显示
				if (isset($_GET['id'])) {
					$info=M('front')->getAll('articles','cid='.$_GET['id'],'*','');
					$res=M('course')->showpagesby($info,'getArticlelimitsc',$_GET['id'],$url,10);
				}
			}else{
				$catebycid=array();
			}
			
			$bigcate=M('front')->getAll('cates','','*',array(0,6));
			$smallcate=M('front')->getAll('cates','','*',5);
			$rows=$res[1];
			$pages=$res[0];

			$this->checkSession();

			VIEW::assign(array('data'=>$rows,'pages'=>$pages,'bigcate'=>$bigcate,'smallcate'=>$smallcate,'catebycid'=>$catebycid));
			VIEW::display('tpl/front/article.html');
		}

		public function read(){
			$this->sayno();
			$res=M('front')->getAll('articles','id='.$_GET['id'],'*','');
			//插入/更新阅读记录
			M('front')->insertreaded($_GET['id'],$_GET['uid']);

			$this->checkSession();
			
			VIEW::assign(array('data'=>$res));
			VIEW::display('tpl/front/read.html');
		}
		public function user_read(){
			$this->sayno();
			$id=$_GET['id'];

			//获取所学课程的主要信息 id->name album
			$res=M('front')->getreaded($id);
			//处理时间
			$tim['y']=date('Y',$res[0]['readtime']);
			$tim['md']=date('m.d',$res[0]['readtime']);
			
			VIEW::assign(array('data'=>$res,'tim'=>$tim));
			VIEW::display('tpl/front/user_read.html');
		}
		public function delreaded(){
			$id=$_GET['id'];
			$uid=$_GET['uid'];
			M('course')->delCbyid('readed',$id);
			echo "<script>window.location.href='index.php?controller=index&method=user_read&id={$uid}'</script>";
		}

		public function searchAll(){
			$this->sayno();
			$res=M('front')->getsearch($_POST['search']);
			if ($res) {
				$num[0]=count($res);
			}else{
				$res=array();
				$num[0]=0;
			}
			$this->checkSession();
			VIEW::assign(array('data'=>$res,'num'=>$num));
			VIEW::display('tpl/front/search.html');
		}

		/**
		 * 检测是否是登录状态，是 则把用户名传给前端显示
		 * @return [type] [description]
		 */
		public function checkSession(){
			if (isset($_SESSION['userName'])&&isset($_SESSION['userId'])) {
                VIEW::assign(array('userName'=>$_SESSION['userName'],'userId'=>$_SESSION['userId']));
             }elseif (isset($_COOKIE['userName'])&&isset($_COOKIE['userId'])) {
               	VIEW::assign(array('userName'=>$_COOKIE['userName'],'userId'=>$_COOKIE['userId']));
             }else{
             	VIEW::assign(array('userName'=>''));
             }
		}
		/**
		 * 检测是否是登录状态，不是则跳到登录界面
		 * @return [type] [description]
		 */
		public function sayno(){
			if(empty($_SESSION['userId'])&&empty($_COOKIE["userId"])){
					$this->locationTo('index.php?controller=index&method=login');
				}
		}



		public function logout(){
			$_SESSION=array();
			if(isset($_COOKIE[session_name()])){
				setcookie(session_name(),"",time()-1);
			}
			if(isset($_COOKIE['userId'])){
				setcookie("userId","",time()-1,'/');
			}
			if(isset($_COOKIE['userName'])){
				setcookie("userName","",time()-1,'/');
			}
			session_destroy();
			$this->locationTo('index.php?controller=index&method=login');
		}

		public function login(){
			if(empty($_SESSION['userId'])&&empty($_COOKIE["userId"])){
				VIEW::display('tpl/front/login.php');
			}else{
				$this->locationTo('admin.php?controller=admin&method=hind_page');
			}
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