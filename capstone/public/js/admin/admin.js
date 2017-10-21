
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
      return a + b;
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
      res = r;
      console.log(r);
    }
  });

  var memnum = $('.sosmember strong');
  var test = 0;

  var run = setInterval(function(){
    memnum.text(test);
    test++;
    if(test > 25){
      stop();
    }
  },20);

  function stop(){
    clearInterval(run);
  }

//end of jquery
})