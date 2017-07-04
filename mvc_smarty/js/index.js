
$(document).ready(function(){
	var $outer=$('#imgsturn_outer');
	var $box=$('.imgsturn').eq(0);
	var $imgli=$('.imgsturn > ul li');
	var $indexli=$('.imgsturn > ol li');
	var k=0;
	var timer=null;

	var $menu=$('#menu');
	var $menuli=$('#menu > .menu_ul li');
	var $menu_side=$('.menu_side');
	turnimg();
	for (i = 0; i < $indexli.length; i++) {
		$indexli.eq(i).mouseover(function(){
			k=$(this).index();
			for (var j = 0; j < $indexli.length; j++) {
				$indexli.eq(j).css('background','#fff');
				$imgli.eq(j).css('z-index','0');
			}
			$imgli.eq(k).css('z-index','10');
			$indexli.eq(k).css('background','yellow');
		})
	}

	function turnimg(){
		clearInterval(timer);
		timer=setInterval(function(){
			for (var j = 0; j < $imgli.length; j++) {
				$imgli.eq(j).css('z-index','0');
				$indexli.eq(j).css('background','#fff');

			}
			$imgli.eq(k).css('z-index','10');
			$indexli.eq(k).css('background','yellow');
			k++;
			if (k>$imgli.length-1) {
				k=0;
			}
		},3000);
	}

	$box.mouseover(function() {
        clearInterval(timer);
    })

    $box.mouseout(function(event) {
       	turnimg();
    })
	
	for (var i = 0; i < $menuli.length; i++) {
		$menuli.eq(i).mouseover(function(){
			for (var j = 0; j < $menuli.length; j++) {
				$menuli.eq(j).removeClass('active');
				$menu_side.eq(j).css('display','none');
			}
			$(this).addClass('active');
			$menu_side.eq($(this).index()).css('display','block');
		})
	}
	$menu.mouseout(function(){
		for (var j = 0; j < $menuli.length; j++) {
			$menuli.eq(j).removeClass('active');
			$menu_side.eq(j).css('display','none');
		}
	})

	//为course绑定鼠标移动事件
	for (var i = 0; i < $('.course').length; i++) {
		$('.course').eq(i).mouseover(function() {
        	$('.course_title').eq($(this).index()).removeClass('omit');
	    })
	    $('.course').eq(i).mouseout(function() {
	        $('.course_title').eq($(this).index()).addClass('omit');
	    })
	}



		
})

