$(document).ready(function(){
	$('#sub').click(function(){
		$.ajax({
				type:"POST",
				url:"index.php?controller=index&method=ajaxmes",
				dataType:"json",
				data:{
					userid:$('#userid').val(),
					courseid:$('#courid').val(),
					partid:$('#partid').val(),
					content:$('#textarea').val()
				},
				success:function(data){
					if (data.success) {
						$('#sshow').before(data.msg);  
						$('#textarea').val('');
					}else{
						alert(data.msg);
					}
				},
				error:function(jqXHR){
					alert("error:"+jqXHR.status);
				}

		});
	})
})