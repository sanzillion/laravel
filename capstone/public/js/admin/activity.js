$(document).ready(function(){

//for activity logs quick search
//----------------------------------------------------------------------------------------------
loadLogs();
//LOGS TABLE
// the code below is rendering tables with pagination without 
// reloading the page through ajax with search function on logs table

    $('.searchlogs').keyup(function(event){
    // var keyCode = event.which; // check which key was pressed
    var string = $(this).val(); // get the complete input
    // console.log(string);
    if(string != ''){
      $.ajax({
       url:"/activity/"+string+"/search",
       method:"GET",
       success:function(logs){
          // console.log(admins);
          if(logs.length > 0){
            logstable.html("");
            logs.forEach(function(log){

              logstable.append("<tr><th scope='row'>"+log.id+"</th>"+
                "<td>"+log.user+"</td><td>"+log.type+"</td><td>"+log.action+"</td>"+
                "<td>"+log.description+"</td><td>"+log.created_at+"</td></tr>");
            });
          }
          else{
            logstable.html("<tr><td style='text-align: center' colspan='5'><h3>No entry</h3></td> </tr>");
          }
        }
      });
    }else{
      loadLogs();
    }
  });

  function loadLogs(){
    // console.log(link);
      //get data from controller
      $.ajax({
       url:loglink,
       method:"GET",
       success:function(logs){
          console.log(logs);

          //if data retrieved is not empty
          //continue with the code
          if(logs.total > 0){
            logstable.html("");
            forBtn(1);
            //if there is only 1 page
            //disable both back and forward button
            if(logs.total <= 5){
              backBtn(0);
              forBtn(0);
              back.attr('disabled', true);
              forward.attr('disabled', true);
            }
            else{
              //if the user is currently in another
              //page of pagination
              if(logs.prev_page_url != null){
                back.val(logs.prev_page_url);
              }
              else{
                back.val(logs.first_page_url);
              }

              //if the the pages are not done yet
              if(logs.to < logs.total){
                if(logs.from == '1'){
                  backBtn(0);
                  back.attr('disabled', true);
                }
                forward.val(logs.next_page_url);
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
            logs.data.forEach(function(log){

              logstable.append("<tr><th scope='row'>"+log.id+"</th>"+
                "<td>"+log.user+"</td><td>"+log.type+"</td><td>"+log.action+"</td>"+
                "<td>"+log.description+"</td><td>"+log.created_at+"</td></tr>");
            });
          }
          else{
            //if no logs disable both back and forward then
            //show to UI that there is no entry from the tables
            backBtn(0);
            forBtn(0);
            back.attr('disabled', true);
            forward.attr('disabled', true);
            logstable.html("<tr><td style='text-align: center' colspan='5'><h3>No entry</h3></td> </tr>");
          }
        }
      });
  }

  //when clicking forward pagination
  forward.on('click', function(){
    backBtn(1);
    back.attr('disabled', false);
    loglink = forward.val();
    loadLogs();

  });

  //when clicking backward pagination
  back.on('click', function(){
    forBtn(1);
    forward.attr('disabled', false);
    loglink = back.val();
    loadLogs();

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




});