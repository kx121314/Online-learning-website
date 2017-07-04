<?php 
	class courseModel{
		public $_table='cates';

		public function getCateAll(){
			$sql="select c.id,c.cate_name,b.cate_name as parid from cates as c left join cates as b on c.cid=b.id order by c.id";
			$res=DB::something($sql);
			return $res;
		}
		public function getmessbyid($id){
			$sql="select * from messages where id='$id'";
			$res=DB::something($sql);
			return $res;
		}

		public function getCOne($table,$id){
			$id=intval($id);
			$res=DB::selbyid($table,$id);
			return $res;
		}

		public function getinsertid(){
			$res=DB::getinsertid();
			return $res;
		}
		public function getAlbumAll($id){
			$res=DB::select('album',"couid='$id'");
			return $res;
		}
		public function getVideoAll($id){
			$res=DB::select('videos',"partid='$id'");
			return $res;
		}
		public function getCatelimit($array){
			$sql="select c.id,c.cate_name,b.cate_name as parid from cates as c left join cates as b on c.cid=b.id order by c.id limit {$array[0]},{$array[1]} ";
			$res=DB::something($sql);
			return $res;
		}
		public function getCourselimit($array){
			$sql="select c.*,b.cate_name,e.albumPath from courses as c left join cates as b on c.cid=b.id left join album as e on e.couid=c.id order by c.id desc limit {$array[0]},{$array[1]} ";
			$res=DB::something($sql);
			return $res;
		}
		public function getCourselimitbc($array,$x){
			$sql="select a.*,e.albumPath from courses as a left join album as e on e.couid=a.id where a.cid in(select b.id from cates as b where b.cid='$x') order by a.id desc limit {$array[0]},{$array[1]}";
			$res=DB::something($sql);
			return $res;
		}
		public function getCourselimitsc($array,$x){
			$sql="select a.*,e.albumPath from courses as a left join album as e on e.couid=a.id where cid='$x' order by a.id desc limit {$array[0]},{$array[1]}";
			$res=DB::something($sql);
			return $res;
		}

		public function getArticleAll(){
			$sql="select c.id,c.article_name,b.cate_name from articles as c left join cates as b on c.cid=b.id order by c.id";
			$res=DB::something($sql);
			return $res;
		}
		public function getArticlelimit($array){
			$sql="select c.id,c.article_name,c.author,b.cate_name,c.content,c.pubtime from articles as c left join cates as b on c.cid=b.id order by c.id desc limit {$array[0]},{$array[1]} ";
			$res=DB::something($sql);
			return $res;
		}
		public function getArticlelimitbc($array,$x){
			$sql="select c.* from articles as c where c.cid in(select b.id from cates as b where b.cid='$x') order by c.id desc limit {$array[0]},{$array[1]} ";
			$res=DB::something($sql);
			return $res;
		}
		public function getArticlelimitsc($array,$x){
			$sql="select * from articles where cid='$x' order by id desc limit {$array[0]},{$array[1]}";
			$res=DB::something($sql);
			return $res;
		}
		public function getArticleAllbc($x){
			$sql="select a.* from courses as a where a.cid in(select b.id desc from cates as b where b.cid='$x')";
			$res=DB::something($sql);
			return $res;
		}


		public function getMessagelimit($array,$x){
			$sql="select m.id,u.username,m.content,m.pubtime from messages as m left join user as u on m.userid=u.id where m.partid='$x' order by m.pubtime DESC limit {$array[0]},{$array[1]}";
			$res=DB::something($sql);
			return $res;
		}

		public function insertC($table,$array){
			$res=DB::insert($table,$array);
			return $res;
		}

		public function updateC($table,$array,$id){
			$res=DB::update($table,$array,"id='$id'");
			return $res;
		}

		public function delCbyid($table,$id){
			$res=DB::delete($table,"id='$id'");
			return $res;
		}
		public function del($table,$where){
			$res=DB::delete($table,$where);
			return $res;
		}
		public function getCourseAll(){
			$sql="select c.id,c.course_name,b.cate_name from courses as c left join cates as b on c.cid=b.id order by c.id";
			$res=DB::something($sql);
			return $res;
		}

		public function getCourseAllbc($x){
			$sql="select a.* from courses as a where a.cid in(select b.id from cates as b where b.cid='$x')";
			$res=DB::something($sql);
			return $res;
		}

		public function getChapterAll($id){
			$res=DB::select('chapters',"bid='$id'");
			return $res;
		}
		public function getPartAll(){
			$sql="select p.id,p.part_name,p.chid from parts as p inner join chapters as c on p.chid=c.id where c.bid in(select id from courses)";
			$res=DB::something($sql);
			return $res;
		}
		public function getPV($id){
			$sql="select p.*,v.videoPath from parts as p inner join videos as v on v.partid=p.id where p.chid='$id'";
			$res=DB::something($sql);
			return $res;
		}

		public function showpages($info,$func,$url,$num){
			$nums=count($info);
			$pagesize=$num;
			$totalPages=ceil($nums/$pagesize);
			$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
			if ($page<1||$page==null||!is_numeric($page)) {
				$page=1;
			}
			if ($page>=$totalPages) {
				$page=$totalPages;
			}
			$array= array($pagesize*($page-1),$pagesize );
			if (isset($_GET['cate'])) {
				if(isset($_GET['id'])){
					$rows=$this->$func($array,$_GET['id']);
				}else{
					$rows=$this->$func($array,$_GET['cate']);
				}
			}else{
				$rows=$this->$func($array);
			}
			$pages=showPage($page,$totalPages,$url);
			return array($pages,$rows);
		}

		public function showpagesby($info,$func,$x,$url,$num){
			$nums=count($info);
			$pagesize=$num;
			$totalPages=ceil($nums/$pagesize);
			$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
			if ($page<1||$page==null||!is_numeric($page)) {
				$page=1;
			}
			if ($page>=$totalPages) {
				$page=$totalPages;
			}
			$array= array($pagesize*($page-1),$pagesize );
			if (isset($_GET['cate'])) {
				if(isset($_GET['id'])){
					$rows=$this->$func($array,$_GET['id']);
				}else{
					$rows=$this->$func($array,$_GET['cate']);
				}
			}else{
				$rows=$this->$func($array,$x);
			}
			$pages=showPage($page,$totalPages,$url);
			return array($pages,$rows);
		}

		public function Catesubmit($array){
			if (empty($array['cate_name'])) {
				return $res=0;
			}
			$array=daddslashes($array);
			if ($_POST['id']!='') {
				$res=$this->updateC('cates',$array,$_POST['id']);
				if ($res) {
					return $res=2;
				}else{
					return $res=0;
				}
			}else{
				$res=$this->insertC('cates',$array);
				if ($res) {
					return $res=2;
				}else{
					return $res=0;
				}
			}
		}

		public function Coursesubmit($array){
			if (empty($array['course_name'])||empty($array['course_author'])||empty($array['summary'])||empty($array['ready'])||empty($array['pDes'])||empty($array['score'])) {
				return $res=0;
			}
			$array=daddslashes($array);
			if ($_POST['id']!='') {
				$pic=$this->getAlbumAll($_POST['id']);
				$res=$this->updateC('courses',$array,$_POST['id']);
				if (!empty($_FILES)) {
					$upload=new Upclass('uploads',reset(explode(".",$pic[0]['albumPath'])));
						$des=$upload->updown();
						foreach ($des as $key => $value) {
							$str=end(explode('/', $value));
							$res2=thumb($value,"img/img_50/".$str,50,50);
						}
					if ($res||$res2) {
						return $res=2;
					}else{
						return $res=0;
					}
				}else{
					if ($res) {
						return $res=2;
					}else{
						return $res=0;
					}
				}
				
			}else{
				if (!empty($_FILES)) {
					$res=$this->insertC('courses',$array);
					$course_id=$this->getinsertid();
					$arr2['couid']=$course_id;
					if ($res&&$course_id) {
						$upload=new Upclass();
						$des=$upload->updown();
						if ($des) {
							foreach ($des as $key => $value) {
								$str=end(explode('/', $value));
								$arr2['albumPath']=thumb($value,"img/img_50/".$str,50,50);
								$res2=$this->insertC('album',$arr2);
							}
							return $res=2;
						}else{
							$this->delCbyid('courses',$course_id);
						}

						
					}else{
						return $res=0;
					}
				}
				return $res=0;
				
			}
		}

		public function Chaptersubmit($array){
			if (empty($array['chapter_name'])) {
				return $res=0;
			}
			$array=daddslashes($array);
			if ($_POST['id']!='') {
				$res=$this->updateC('chapters',$array,$_POST['id']);
				if ($res) {
					return $res=2;
				}else{
					return $res=0;
				}
			}else{
				$res=$this->insertC('chapters',$array);
				if ($res) {
					return $res=2;
				}else{
					return $res=0;
				}
			}
		}

		public function Partsubmit($array){
			if (empty($array['part_name'])||empty($array['content'])) {
				return $res=0;
			}
			$array=daddslashes($array);
			if ($_POST['id']!='') {

				$video=$this->getVideoAll($_POST['id']);
				$res=$this->updateC('parts',$array,$_POST['id']);
				if (!empty($_FILES)) {
					$upload=new Upclass('videos',reset(explode(".",$video[0]['videoPath'])),false,524288000,array('mp4','avi'));
						$des=$upload->updown();
					if ($res||$des) {
						return $res=2;
					}else{
						return $res=0;
					}
				}else{
					if ($res) {
						return $res=2;
					}else{
						return $res=0;
					}
				}
			}else{
				if (!empty($_FILES)) {
					$res=$this->insertC('parts',$array);
					$part_id=$this->getinsertid();
					$arr2['partid']=$part_id;
					if ($res&&$part_id) {
						$upload=new Upclass('videos','',false,524288000,array('mp4','avi'));
						$des=$upload->updown();
						if ($des) {
							foreach ($des as $key => $value) {
							$str=end(explode('/', $value));
							$arr2['videoPath']=$str;
							$res2=$this->insertC('videos',$arr2);
							}
							return $res=2;
						}else{
							$this->delCbyid('parts',$part_id);
						}
						
					}else{
						return $res=0;
					}
				}
				return $res=0;
			}
		}

		public function Articlesubmit($array){
			if (empty($array['article_name'])||empty($array['author'])||empty($array['content'])) {
				return $res=0;
			}
			$array=daddslashes($array);
			if ($_POST['id']!='') {
				$res=$this->updateC('articles',$array,$_POST['id']);
				if ($res) {
					return $res=2;
				}else{
					return $res=0;
				}
			}else{
				$res=$this->insertC('articles',$array);
				if ($res) {
					return $res=2;
				}else{
					return $res=0;
				}
			}
		}


	}
 ?>