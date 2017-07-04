<?php 
	session_start();

	$image=imagecreatetruecolor(100, 30);
	$bgcolor=imagecolorallocate($image, 255, 255, 255);
	imagefill($image,0,0,$bgcolor);
	$verify_str='';
	for ($i=0; $i < 4; $i++) { 
		$font='img/msyh.ttc';
		$fontsize=16;
		$fontcolor=imagecolorallocate($image, mt_rand(0,120), mt_rand(0,120), mt_rand(0,120));
		$contentstr='23456789acefghijkmpqrstvwxyz';
		$fontcontent=substr($contentstr,mt_rand(0,strlen($contentstr)-1),1);
		$verify_str.=$fontcontent;
		$x=($i*100/4)+mt_rand(5,10);
		$y=mt_rand(20,25);
		imagettftext($image, $fontsize, mt_rand(-30,30), $x, $y, $fontcolor, $font, $fontcontent);
	}
	/*for ($i=0; $i < 4; $i++) {
		$font='img/msyh.ttc'; 
		$fontsize=10;
		$fontcolor=imagecolorallocate($image, mt_rand(0,120), mt_rand(0,120), mt_rand(0,120));	
		$contentstr='这是一段话';
		$fontcontent=mb_substr($contentstr,mt_rand(0,strlen($contentstr)/3-1),1,"utf-8");
		$verify_str.=$fontcontent;
		$x=($i*100/4)+mt_rand(5,10);
		$y=mt_rand(20,25);
		imagettftext($image, $fontsize, mt_rand(-30,30), $x, $y, $fontcolor, $font, $fontcontent);
	}*/
	$_SESSION['verify']=$verify_str;
	
	for ($i=0; $i <200 ; $i++) { 
		$pointcolor=imagecolorallocate($image,mt_rand(50,200),mt_rand(50,200),mt_rand(50,200));
		imagesetpixel($image, mt_rand(1,99), mt_rand(1,29), $pointcolor);
	}
	for ($i=0; $i < 3; $i++) { 
		$linecolor=imagecolorallocate($image, mt_rand(80,220), mt_rand(80,220), mt_rand(80,220));
		imageline($image, mt_rand(1,99), mt_rand(1,29), mt_rand(1,99), mt_rand(1,29), $linecolor);
	}

	header('Content-type:image/png');
	imagepng($image);

	imagedestroy($image);
 ?>