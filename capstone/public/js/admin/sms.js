
$(document).ready(function(){

  var count_another = 0;

  $('.editSms').on("click", function () {
   var id = $(this).val();
   // console.log("id = "+id);
   if(id != '')
     {
          $.ajax({
               url:"/sms/"+id+"/edit",
               method:"GET",
               success:function(data){
                // console.log(data.body);
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

  $('.editRecipient').on("click", function () {
   var id = $(this).data('id');
   // console.log("id = "+id);
   if(id != '')
     {
          $.ajax({
               url:"/custom/"+id+"/edit",
               method:"GET",
               success:function(data){
               	// console.log(data);
                    $('#reditForm').attr("action", "/custom/"+id+"/update")
          					$('#rname').val(data.name);
          					$('#rphone').val(data.phone_number);
          					$('#editRecipient').modal('show');
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
    // console.log(dir);
    toggleicon.removeClass('fa-chevron-'+currToggle).addClass('fa-chevron-'+dir);
    toggleicon.data('id', currToggle);
    currToggle = dir;
  });
  
  $('#goodbye').on('click', function(){
    $('.givemesomespace').fadeOut();
  });

  $('#city').on('focus', function(){
    // console.log('city focus');
  });

  //custom js below

  $('.addSms').on('click', function(){
    $('#addSms').modal('show');
  });

  $('.deleteCustom').on("click", function () {
      var id = $(this).data('id');
      console.log(id);
      
      $('#customDelete').attr("action", "/sms/"+id+"/delete");
      $('#deleteCustom').modal('show');
  });

 $('.deleteRecipient').on("click", function () {
      var id = $(this).data('id');
      console.log(id);
      
      $('#rDelete').attr("action", "/custom/"+id+"/delete");
      $('#deleteRecipient').modal('show');
  });

  $('#addRecipients').on('click', function(){
    $('#addrecipient').modal('show');
  });

  $('.another').on('click', function(){
      count_another++;

      if(count_another < 5){
        $('.appendhere').append('<div class="col-5">'+
            '<input type="text" class="form-control form-control-sm margin-bot"'+
            'name="name[]" placeholder="Name" required maxlength="10"></div><div class="col-7">'+
            '<input type="text" class="form-control form-control-sm margin-bot"'+
            'name="phone[]" placeholder="Phone Number" required maxlength="12">'+
          '</div>');
      }
  });

  $('#addFromUsers').on('click', function(){
    $('#addFromUserz').modal('show');
  });

  $('#chkall').on('click', function(){
    if($('#chkall').is(':checked')){
      $('.fromusers #chkbx').prop('checked', true);
      $('.hiddenNum').prop('disabled', false);
    }
    else{
      $('.fromusers #chkbx').prop('checked', false);
      $('.hiddenNum').prop('disabled', true);
    }
  });

  $('.fromusers').on('click', '#chkbx', function(){
    var id = $(this).data('id');
    if($(this).is(':checked')){
      $('#'+id).prop('disabled', false);
    }
    else{
      $('#'+id).prop('disabled', true);
    }
  });

})