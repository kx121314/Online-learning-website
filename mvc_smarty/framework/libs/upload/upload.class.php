<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
	/**
	 * 上传
	 */
	class Upclass
	{
		//protected $fileName;
		protected $maxSize;
		protected $allowExt;
		protected $uploadPath;
		protected $imgFlag;
		protected $upname;
		protected $fileInfo;
		protected $error;
		protected $ext;
		protected $files;
		protected $req;
		

		public function __construct($uploadPath='uploads',$upname='',$imgFlag=true,$maxSize=5242880,$allowExt=array('jpeg','jpg','png','gif'))
		{
			//$this->fileName=$fileName;
			$this->maxSize=$maxSize;
			$this->upname=$upname;
			$this->allowExt=$allowExt;
			//$this->fileInfo=$_FILES["$this->fileName"];
			$this->uploadPath=$uploadPath;
			$this->imgFlag=$imgFlag;
		}

		/**
		 * 检测文件上传是否出错
		 * @return [type] [description]
		 */
		protected function checkError(){
			if ($this->fileInfo['error']!=0) {
				switch ($this->fileInfo['error']) {
					case 1:
						$this->error='超过了PHP配置文件中upload_max_filesize选项的值';
						break;
					case 2:
						$this->error='超过了表单中MAX_FILE_SIZE设置的值';
						break;
					case 3:
						$this->error='文件部分被上传';
						break;
					case 4:
						$this->error='没有选择上传文件';
						break;
					case 6:
						$this->error='没有找到临时目录';
						break;
					case 7:
						$this->error='文件不可写';
						break;
					case 8:
						$this->error='由于PHP的扩展程序中断文件上传';
						break;
						
				}
				return false;
			}
			return true;
		}


		/**
		 * 检测文件大小
		 * @return [bool] [description]
		 */
		protected function checkSize(){
			if ($this->fileInfo['size']>$this->maxSize) {
				$this->error='上传文件过大';
				return false;
			}
			return true;
		}

		protected function checkExt(){
		//只能把一个变量的引用作为一个参数传给函数，
		//直接把explode('.',$name)作为参数传给end函数，所以会出现提示。
			//$this->ext=strtolower(end(explode('.', $this->fileInfo['name'])));
			$this->ext=strtolower(pathinfo($this->fileInfo['name'],PATHINFO_EXTENSION));
			if (!in_array($this->ext,$this->allowExt)) {
				$this->error='不允许的上传类型';
				return false;
			}
			return true;
		}

		protected function checkTrueimg(){
			if ($this->imgFlag) {
				if (@!getimagesize($this->fileInfo['tmp_name'])) {
					$this->error='请上传真正的图片';
					return false;
				}
					return true;
			}
			return true;
			
		}

		protected function checkHttpPost(){
			if (@!is_uploaded_file($this->fileInfo['tmp_name'])) {
				$this->error='文件不是通过HTTP POST方式上传的';
				return false;
			}
			return true;
		}

		protected function showerror($i){
			echo('<span style="color:red">'.$i.$this->error.'</span><br>');
		}


		/**
		 * 检测上传文件夹是否存在，if no 创建
		 * 
		 */
		protected function checkUploadPath(){
			if (!file_exists($this->uploadPath)) {
				mkdir($this->uploadPath,0777,true);
			}
		}


		/**
		 * 产生唯一id
		 * @return string
		 */
		protected function getUniName(){
			if ($this->upname) {
				return $this->upname;
			}else{
				return md5(uniqid(microtime(true),true));
			}
		}


		/**
		 * 上传文件
		 * @return string
		 */
		public function updown(){
			$this->getFiles();
			$i=0;
			foreach ($this->files as $this->fileInfo) {
			//$this->fileInfo=$fileInfo;
			if ($this->checkError()&&$this->checkSize()&&$this->checkExt()&&$this->checkTrueimg()&&$this->checkHttpPost()) {
				$this->checkUploadPath();
				$this->uniName=$this->getUniName();
				$this->destination=$this->uploadPath.'/'.$this->uniName.'.'.$this->ext;
				if (move_uploaded_file($this->fileInfo['tmp_name'],$this->destination)) {
					$this->error='图片上传成功';
					$this->req[]=$this->destination;
				}else{
					$this->error='图片上传失败';
				}
				
			}
			$i++;
			$this->showerror($i);
			}
			return $this->req;
		}


		protected function getFiles(){
			$i=0;
			foreach($_FILES as $file){
				if(is_string($file['name'])){
					$this->files[$i]=$file;
				}elseif(is_array($file['name'])){
					foreach($file['name'] as $key=>$val){
						$this->files[$i]['name']=$file['name'][$key];
						$this->files[$i]['type']=$file['type'][$key];
						$this->files[$i]['tmp_name']=$file['tmp_name'][$key];
						$this->files[$i]['error']=$file['error'][$key];
						$this->files[$i]['size']=$file['size'][$key];
						$i++;
					}
				}
			}
			return $this->files;
			
		}

	}
 ?>