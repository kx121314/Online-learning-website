<?php 
	function thumb($filename,$destination=null,$dst_w=null,$dst_h=null,$isReservedSource=true,$scale=0.5){
		list($src_w,$src_h,$imagetype)=getimagesize($filename);
		if(is_null($dst_w)||is_null($dst_h)){
			$dst_w=ceil($src_w*$scale);
			$dst_h=ceil($src_h*$scale);
		}
		$mime=image_type_to_mime_type($imagetype);
		$createFun=str_replace("/", "createfrom", $mime);
		$outFun=str_replace("/", null, $mime);
		$src_image=$createFun($filename);
		$dst_image=imagecreatetruecolor($dst_w, $dst_h);
		imagecopyresampled($dst_image, $src_image, 0,0,0,0, $dst_w, $dst_h, $src_w, $src_h);
		//image_50/sdfsdkfjkelwkerjle.jpg
		if($destination&&!file_exists(dirname($destination))){
			mkdir(dirname($destination),0777,true);
		}elseif (!$destination&&!file_exists('img')) {
			mkdir('img',0777,true);
		}
		//已删 strstr('cab','a')搜索a在另一b中的第一次出现,并返回字符串的剩余部分ab。
		$onlyid=end(explode('/', $filename));//在上传文件时，已经生成了唯一id 
		//$ext=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
		$dstFilename=$destination==null?"img/".$onlyid:$destination;
		$outFun($dst_image,$dstFilename);
		imagedestroy($src_image);
		imagedestroy($dst_image);
		if(!$isReservedSource){
			unlink($filename);
		}
		return $onlyid;
	}

 ?>