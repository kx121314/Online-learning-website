$(document).ready(function(){
	$('#login_btn').click(function(){
		if ($('#a1').is(':checked')) {
			$('#a1').attr("value",1);
		}else{
			$('#a1').attr("value",0);
		}
		$.ajax({
				type:"POST",
				url:"admin.php?controller=admin&method=checkLogin",
				dataType:"json",
				data:{
					adminname:$('#login_id').val(),
					psw:$('#login_psw').val(),
					verifystr:$('#login_verify').val(),
					autoFlag:$('#a1').val()

				},
				success:function(data){
					if (data.success) {
						location.href='admin.php?controller=admin&method=hind_page';
					}else{
						$("#login_error").html("error:"+data.msg);
						$('#verifyimg').attr('src','framework/function/verify.php?r=<?php echo mt_rand();?>');
					}
				},
				error:function(jqXHR){
					alert("error:"+jqXHR.status);
				}

		});
	})
})