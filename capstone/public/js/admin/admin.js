
var res;
$(document).ready(function(){

var stat = $('.stat');
var staticon = $('.statIcon');

appstatus();
loadUsers();
//USERS TABLE
// the code below is rendering tables with pagination without 
// reloading the page through ajax with search function on users table

    $('.searchUser').keyup(function(event){
    var tableBody = $('.tbody');
    // var keyCode = event.which; // check which key was pressed
    var string = $(this).val(); // get the complete input
    // console.log(string);
    if(string != ''){
      $.ajax({
       url:"/admin/"+string+"/search",
       method:"GET",
       success:function(users, status){
          // console.log(admins);
          if(users.length > 0){
            tableBody.html("");
            users.forEach(function(user){

              tableBody.append("<tr><th scope='row'>"+user.id+"</th>"+
                "<td>"+user.name+"</td><td>"+user.email+"</td>"+"<td>"
                +user.phone_number+"</td><td>"+user.institution+"</td><td>"+user.city+"</td>"+
                "<td><a class='btn btn-primary btn-sm float-left editUser' style='margin-right: 5px; color: white;'"+
                "data-id='"+user.id+"'><i class='fa fa-book'></i></a><a class='btn btn-danger btn-sm float-left "+
                "deleteUser' data-id='"+user.id+"'><i class='fa fa-trash text-white'></i></a></td></tr>");
            });
          }
          else{
            tableBody.html("<tr><td style='text-align: center' colspan='7'><h3>No entry</h3></td> </tr>");
          }
        }
      });
    }else{
      loadUsers();
    }
  });

  function loadUsers(){
    // console.log(link);
      //get data from controller
      $.ajax({
       url:link,
       method:"GET",
       success:function(users){
          // console.log(users);

          //if data retrieved is not empty
          //continue with the code
          if(users.total > 0){
            usertable.html("");
            forBtn(1);
            //if there is only 1 page
            //disable both back and forward button
            if(users.total <= 10){
              backBtn(0);
              forBtn(0);
              back.attr('disabled', true);
              forward.attr('disabled', true);
            }
            else{
              //if the user is currently in another
              //page of pagination
              if(users.prev_page_url != null){
                back.val(users.prev_page_url);
              }
              else{
                back.val(users.first_page_url);
              }

              //if the the pages are not done yet
              if(users.to < users.total){
                if(users.from == '1'){
                  backBtn(0);
                  back.attr('disabled', true);
                }
                forward.val(users.next_page_url);
              }
              //if the page reach its limit disable forwards button
              //and enable back button
              else{
                  forBtn(0);
                  forward.attr('disabled', true);
                  backBtn(1);
                  back.attr('disabled', false);
              }

            }

            //load the data
            users.data.forEach(function(user){

              usertable.append("<tr><th scope='row'>"+user.id+"</th>"+
                "<td>"+user.name+"</td><td>"+user.email+"</td>"+"<td>"
                +user.phone_number+"</td><td>"+user.institution+"</td><td>"+user.city+"</td>"+
                "<td><a class='btn btn-primary btn-sm float-left editUser' style='margin-right: 5px; color: white;'"+
                "data-id='"+user.id+"'><i class='fa fa-book'></i></a><a class='btn btn-danger btn-sm float-left "+
                "deleteUser' data-id='"+user.id+"'><i class='fa fa-trash text-white'></i></a></td></tr>");
            });
          }
          else{
            //if no users disable both back and forward then
            //show to UI that there is no entry from the tables
            backBtn(0);
            forBtn(0);
            back.attr('disabled', true);
            forward.attr('disabled', true);
            usertable.html("<tr><td style='text-align: center' colspan='7'><h3>No entry</h3></td> </tr>");
          }
        }
      });
  }

  //when clicking forward pagination
  forward.on('click', function(){
    backBtn(1);
    back.attr('disabled', false);
    link = forward.val();
    loadUsers();

  });

  //when clicking backward pagination
  back.on('click', function(){
    forBtn(1);
    forward.attr('disabled', false);
    link = back.val();
    loadUsers();

  });

  function forBtn($var){
    if($var == 1){
      forward.removeClass('btn-default');
      forward.addClass('btn-success');
    }
    else{
      forward.removeClass('btn-success');
      forward.addClass('btn-default');
    }
  }

  function backBtn($var){
    if($var == 1){
      back.removeClass('btn-default');
      back.addClass('btn-success');
    }
    else{
      back.removeClass('btn-success');
      back.addClass('btn-default');
    }
  }

//-------------------------------------------------------------

  function notconnected(){
    // console.log("Mobile App Not Connected!");
    stat.text('NOT CONNECTED');
    stat.removeClass('text-greener').addClass('text-redder');
    staticon.removeClass('bg-greener').addClass('bg-redder');
  }

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
  }, 10000)

  //---------------------------------------------------
  //------------------statistics-----------------------
  //everything ready
  //animations presentation

  function add(a, b) {
      return a + parseInt(b);
  }

  $.ajax({
    url: '/stat/all',
    method: 'GET',
    dataType: 'JSON',
    success: function(r){
      r.sms = r.sms.reduce(add, 0);
      r.apply = r.apply.reduce(add, 0);
      r.approve = r.approve.reduce(add, 0);
      r.download = r.download.reduce(add, 0);
      r.m_sms = r.m_sms.reduce(add, 0);
      r.uptime = (r.uptime.reduce(add, 0)/12);
      r.m_uptime = r.m_uptime.reduce(add, 0);
      var full = parseInt(r.uptime * 2);
      r.uptime = parseInt((r.m_uptime / full) * 100);
      res = r;
      // console.log(r);
      animateNumbers();
    }
  });


  var mem = $('.sosmember strong');
  var sms = $('.smswork strong');
  var blog = $('.blogposts strong');
  var files = $('.filesdocs strong');
  var apply = $('.apply strong');
  var approve = $('.approve strong');
  var download = $('.download strong');
  var uptime = $('.uptime');
  var memprog = $('.progress-bar');
  var num = [0, 0, 0, 0, 0, 0, 0, 0];
  var progress = [0, 0, 0, 0, 0, 0, 0, 0];
  var run = {};

  function animateNumbers(){
    $('.m_posts').text(res.m_blog);
    $('.m_users').text(res.m_members);
    $('.m_files').text(res.m_files);
    $('.m_sms').text(res.m_sms);

    run.mem = setInterval(function(){
      mem.text(num[0]);
      num[0]++;
      if(num[0] > res.members){
        stop("mem");
      }
    },20);

    run.memprog = setInterval(function(){
      memprog.css('width', progress[0]++);
      progress[0]++;
      if(progress[0] > 70){
        stop("memprog");
      }
    },15);

    run.sms = setInterval(function(){
      sms.text(num[1]);
      num[1]++;
      if(num[1] > res.sms){
        stop("sms");
      }
    },20);

    run.blog = setInterval(function(){
      blog.text(num[2]);
      num[2]++;
      if(num[2] > res.blog){
        stop("blog");
      }
    },20);

    run.files = setInterval(function(){
      files.text(num[3]);
      num[3]++;
      if(num[3] > res.files){
        stop("files");
      }
    },20);

    run.apply = setInterval(function(){
      apply.text(num[4]);
      num[4]++;
      if(num[4] > res.apply){
        stop("apply");
      }
    },20);

    run.approve = setInterval(function(){
      approve.text(num[5]);
      num[5]++;
      if(num[5] > res.approve){
        stop("approve");
      }
    },20);

    run.download = setInterval(function(){
      download.text(num[6]);
      num[6]++;
      if(num[6] > res.download){
        stop("download");
      }
    },20);

    run.uptime = setInterval(function(){
      uptime.text(num[7] + "%");
      num[7]++;
      if(num[7] > res.uptime){
        stop("uptime");
      }
    },20);

  //function end
  }

  function stop(method){
    clearInterval(run[method]);
  }

//end of jquery
})