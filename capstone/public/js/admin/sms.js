
$(document).ready(function(){

  $('.editSms').on("click", function () {
   var id = $(this).val();
   console.log("id = "+id);
   if(id != '')
     {
          $.ajax({
               url:"/sms/"+id+"/edit",
               method:"GET",
               success:function(data){
               	console.log(data.body);
               	  	$('#method').val('PUT');
					$('#bodyEdit').show().text(data.body);
					$('.title').html("<i class='fa fa-edit'></i> &nbsp"+data.recipient);
					$('#smsForm').attr("action", "/sms/"+id+"/update");
					$('#smsForm .btn-info').text('Update');
					$('#editSms').modal('show');
               }
          });
     }
  });

  $('.sendSms').on("click", function (){
  	var id = $(this).val();
  	if(id != ''){
  		$.ajax({
  			url: "/sms/"+id+"/edit",
  			method:"GET",
  			success:function(data){
  				$('#method').val('POST');
  				$('#bodyEdit').hide().text(data.id);
  				$('.title').html("<i class='fa fa-plus-square'></i> &nbsp"+data.recipient);
  				$('#smsForm').attr("action", "/send/create");
  				$('#smsForm .btn-info').text('Send');
  				$('#editSms').modal('show');
  			}
  		})
  	}

  });

  $('#smsForm .btn-info').click(function(){
    $(this).html('<i class="fa fa-spinner"></i>');
  })
  
})