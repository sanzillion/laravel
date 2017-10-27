
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
                    $('.msg2send').hide();
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
    $(this).html("<i class='fa fa-spinner'></i>&nbsp wait")
  	var id = $(this).val();
  	if(id != ''){
  		$.ajax({
  			url: "/sms/"+id+"/edit",
  			method:"GET",
  			success:function(data){
  				$('#method').val('POST');
  				$('#bodyEdit').hide().text(data.id);
          $('.msg2send').show().html("<b>Msg : </b>"+data.body);
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
  });

  $('.no').on("click", function(){
    $('.sendSms').html('<i class="fa fa-paper-plane"></i>&nbsp Send');
  });

  $('.pending').on("click", '.deletePending', function () {

   var id = $(this).data('id');
   // console.log("id = "+id);
   if(id != '')
     {
        $('#pendingDelete').attr("action", "/send/"+id);
        $('#deletePending').modal('show');
     }
  });

  var toggleicon = $('#toggle-icon');
  var currToggle = "right";

  $('#toggle-head').on('click', function(){
    var dir = toggleicon.data('id');
    console.log(dir);
    toggleicon.removeClass('fa-chevron-'+currToggle).addClass('fa-chevron-'+dir);
    toggleicon.data('id', currToggle);
    currToggle = dir;
  });
  
  $('#goodbye').on('click', function(){
    $('.givemesomespace').fadeOut();
  });

})