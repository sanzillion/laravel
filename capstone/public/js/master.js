var test;
var stat = $('.stat');
var staticon = $('.statIcon');

var monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

var shortMonthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June",
  "July", "Aug", "Sept", "Oct", "Nov", "Dec"
];

var link = "/admin/users";
var blogLink = "/blog/posts";
var usertable = $('.user');
var poststable = $('.posts');
var back = $('.back');
var forward = $('.for');

//custom script to activate tooltips
$(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function(){

  $('.sidebar li').removeClass('active');
  $('.'+session).addClass('active');

  $('.tbody-admin').on("click", '.editAdmin',function () {
   
   var id = $(this).data('id');
   
   // console.log("id = "+id);
   
   if(id != '')
     {
          $.ajax({
               url:"/master/"+id,
               method:"GET",
               success:function(data){
                  $('#name').val(data.name);
                  $('#email').val(data.email);
                  $('#phone').val(data.phone_number);
                  $('#adminForm').attr("action", "/master/"+data.id);
                  $('#editAdminModal').modal('show');
               }
          });
     }
  });  

  $('.user').on("click", '.editUser', function () {
   var id = $(this).data('id');
   if(id != '')
     {
          $.ajax({
               url:"/admin/"+id+"/edit",
               method:"GET",
               success:function(data){
                  $('#name').val(data.name);
                  $('#email').val(data.email);
                  $('#phone').val(data.phone_number);
                  $('#institution').val(data.institution);
                  $('#city').val(data.city);
                  $('#adminForm').attr("action", "/admin/"+data.id);
                  $('#editUserModal').modal('show');
               }
          });
     }
  });

  $('.pending').on("click", '.view', function () {
   var id = $(this).data('id');
   if(id != '')
     {
          $.ajax({
               url:"/pending/"+id,
               method:"GET",
               success:function(data){
                
                  $('.post-user').html('<i class="fa fa-user"></i>&nbsp '+data.name+
                    '&nbsp <i class="fa fa-calendar"></i>&nbsp '+data.time);
                  $('.card-header').text(data.title);
                  $('.card-text').html(data.body);
                  $('#showPost').modal('show');
               }
          });
     }
  }); 

  $('.posts').on("click", '.viewpost', function () {
   var id = $(this).data('id');
   if(id != '')
     {
          $.ajax({
               url:"/blog/"+id,
               method:"GET",
               success:function(data){
                
                  $('.post-user').html('<i class="fa fa-user"></i>&nbsp '+data.name+
                    '&nbsp <i class="fa fa-calendar"></i>&nbsp '+data.time);
                  $('.card-header').text(data.title);
                  $('.card-text').html(data.body);
                  $('#showPost').modal('show');
               }
          });
     }
  });

  $('.posts').on("click", '.deletePost', function () {

   var id = $(this).data('id');
   // console.log("id = "+id);
   if(id != '')
     {
        $('#postDelete').attr("action", "/blog/"+id);
        $('#deletePost').modal('show');
     }
  });

  $('.tbody-admin').on("click", '.deleteAdmin', function () {

   var id = $(this).data('id');
   // console.log("id = "+id);
   if(id != '')
     {
        $('#deleteForm').attr("action", "/master/"+id);
        $('#deleteAdmin').modal('show');
     }
  });

  $('.user').on("click", '.deleteUser', function () {
    console.log('clicked');
   var id = $(this).data('id');
   // console.log("id = "+id);
   if(id != '')
     {
        $('#userDelete').attr("action", "/admin/"+id);
        $('#deleteUser').modal('show');
     }
  });

  $('.deleteAllAdmin').on("click", function () {
    $(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
    $('#deleteAllAdmin').modal('show');
  }); 

  $('.deleteAllUser').on("click", function () {
    $(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
    $('#deleteAllUser').modal('show');
  });

  $('.deleteAllPosts').on("click", function () {
    $(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
    $('#deleteAllPosts').modal('show');
  });  

  $('.accept').on("click", function () {
    $(this).html('<i style="font-size: .8em" class="fa fa-spinner fa-pulse fa-fw"></i>');
  });

  $('.no').on("click", function(){
    $('.deleteAllAdmin').html('<i class="fa fa-exclamation-triangle icon"></i>');
    $('.deleteAllUser').html('<i class="fa fa-exclamation-triangle icon"></i>');
    $('.deleteAllPosts').html('<i class="fa fa-exclamation-triangle icon"></i>');
  });

  $('.pagination li').addClass('btn btn-default btn-sm');

  $('.search').keyup(function(event){
    var tableBody = $('.tbody-admin');
    // var keyCode = event.which; // check which key was pressed
    var string = $(this).val(); // get the complete input
    // console.log(string);
    if(string != ''){
      $.ajax({
       url:"/master/"+string+"/search",
       method:"GET",
       success:function(admins, status){
          // console.log(admins);
          if(admins.length > 0){
            tableBody.html("");
            admins.forEach(function(adm){
              // console.log(adm.name);
              tableBody.append("<tr><th scope='row'>"+adm.id+"</th>"+
                "<td>"+adm.name+"</td><td>"+adm.email+"</td>"+"<td>"+adm.phone_number+"</td>"+
                "<td><a class='btn btn-primary btn-sm float-left editAdmin' style='margin-right: 5px; color: white;'"+
                "data-id='"+adm.id+"'><i class='fa fa-book'></i></a><a class='btn btn-danger btn-sm float-left "+
                "deleteAdmin' data-id='"+adm.id+"'><i class='fa fa-trash text-white'></i></a></td></tr>");
            });
          }
          else{
            tableBody.html("<tr><td style='text-align: center' colspan='5'><h3>No entry</h3></td> </tr>");
          }
        }
      });
    }else{
      location.reload();
    }

    });

//-------------------------------------------------------------

  function notconnected(){
    // console.log("Mobile App Not Connected!");
    stat.text('NOT CONNECTED');
    stat.removeClass('text-greener').addClass('text-redder');
    staticon.removeClass('bg-greener').addClass('bg-redder');
  }

  appstatus();
  //run funtion

  function appstatus(){
    try{
      if(appStatus == 'connected'){
        // console.log(appStatus);
        stat.text('CONNECTED');
        stat.removeClass('text-redder').addClass('text-greener');
        staticon.removeClass('bg-redder').addClass('bg-greener');
      }
      else{
        // console.log(appStatus);
        notconnected();
      }
    }
    catch(e){
      notconnected();
    }
  }

  setInterval(function(){
    // console.log("Checking connection");
    appstatus();
  }, 1000);
  //---------------------------------------------------

//end of jquery
})
