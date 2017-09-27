

$(document).ready(function(){
  
  console.log("Im here");

  $('.editComment').on("click", function () {
   var id = $(this).data('id');
   console.log("id = "+id);
   if(id != '')
     {
          $.ajax({
               url:"/comments/"+id,
               method:"GET",
               success:function(data){
                console.log(data);
                    $('#body').val(data.body);
                    $('#Pid').val(data.post_id);
                    // $('#font2').append("1st");
                    $('#commentForm').attr("action", "/comments/"+data.id);
                    $('#myModal').modal('show');
               }
          });
     }
  });


})
