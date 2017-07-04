$(document).ready(function(){
	$('#login_btn').click(function(){
		if ($('#a1').is(':checked')) {
			$('#a1').attr("value",1);
		}else{
			$('#a1').attr("value",0);
		}
		$.ajax({
				type:"POST",
				url:"index.php?controller=index&method=register",
				dataType:"json",
				data:{
					username:$('#reg_id').val(),
					password:$('#reg_psw').val(),
					email:$('#reg_email').val(),
					autoFlag:$('#a1').val()

				},
				success:function(data){
					if (data.success) {
						alert('注册成功,请登录');
						location.href='index.php?controller=index&method=login';
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