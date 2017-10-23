$(document).ready(function(){
	$('.editComment').on("click", function () {
		var id = $(this).data('id');
		// console.log("id = "+id);
		if(id != '')
		{
		  $.ajax({
		       url:"/comments/"+id,
		       method:"GET",
		       success:function(data){
		          $('#body').val(data.body);
		          $('#Pid').val(data.post_id);
		          $('#commentForm').attr("action", "/comments/"+data.id);
		          $('#myModal').modal('show');
		       }
		  });
		}
	});  

  $('.comments').on("click", '.deleteComment', function () {
   var id = $(this).data('id');
   // console.log("id = "+id);
   if(id != '')
     {
        $('#commentDelete').attr("action", "/comments/"+id+"/delete");
        $('#deleteComment').modal('show');
     }
  });


});