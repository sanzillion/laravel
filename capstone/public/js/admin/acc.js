$(document).ready(function(){

	$('.editAcc').on("click", function () {
		var id = $(this).data('id');
		if(id != '')
		 {
			$.ajax({
			   url:"/master/"+id,
			   method:"GET",
			   success:function(data){
			   	console.log(data);
			      $('#name').val(data.name);
			      $('#email').val(data.email);
			      $('#phone_number').val(data.phone_number);
			      $('#accountForm').attr("action", "/master/"+data.id);
			      $('#editAcc').modal('show');
			   }
			});
		 }
	});  

	$('.editPass').on("click", function () {
		var id = $(this).data('id');
		$('#passForm').attr('action', '/account/'+id+'/pass');
		$('#editPass').modal('show');
	});  

	$('.deletemsg').on("click", function () {
		var id = $(this).data('id');
		$('#msgDelete').attr('action', '/msg/'+id+'/delete');
		$('#deletemsg').modal('show');
	}); 

	$('.viewmsg').on("click", function () {
		var id = $(this).data('id');
		if(id != ''){
			$.ajax({
				url: "/msg/"+id,
				method: "GET",
				success: function(msg){
					console.log(msg);
					$('.name').text(msg.from);
					$('.email').text(msg.email);
					$('.phone').text(msg.phone);
					$('.msg').text(msg.msg);
					$('#viewmsg').modal('show');
				}
			})
		}
	});


});