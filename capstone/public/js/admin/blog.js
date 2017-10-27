$(document).ready(function(){

loadPosts();
//BLOG TABLE
// the code below is rendering tables with pagination without 
// reloading the page through ajax with search function on blog table

    $('.searchPost').keyup(function(event){
    var tableBody = $('.posts');
    // var keyCode = event.which; // check which key was pressed
    var string = $(this).val(); // get the complete input
    console.log(string);
    if(string != ''){
      $.ajax({
       url:"/blog/"+string+"/search",
       method:"GET",
       success:function(posts, status){
          console.log(posts)
          if(posts.length > 0){
            tableBody.html("");

            posts.forEach(function(post){
              //format date
              var created = new Date(post.created_at);
              var updated = new Date(post.updated_at);
              created = shortMonthNames[created.getMonth()]+" "+created.getDate()+", "+created.getFullYear();
              updated = shortMonthNames[updated.getMonth()]+" "+updated.getDate()+", "+updated.getFullYear();

              tableBody.append("<tr><th scope='row'>"+post.post_id+"</th>"+
                "<td>"+post.name+"</td><td>"+post.title.substring(0, 10)+"</td>"+"<td>"
                +post.body.substring(0, 15)+"</td><td>"+created+"</td><td>"+updated+"</td>"+
                "<td><a class='btn btn-info btn-sm float-left viewpost text-white'"+
                "style='margin-right: 5px;' data-id='"+post.post_id+"'><i class='fa fa-window-maximize'></i>"+
                "</a><a class='btn btn-danger btn-sm float-left deletePost'"+
                "data-id='"+post.post_id+"'><i class='fa fa-trash text-white'></i></a></td></tr>");
            });
          }
          else{
            tableBody.html("<tr><td style='text-align: center' colspan='7'><h3>No entry</h3></td> </tr>");
          }
        }
      });
    }else{
      loadPosts();
    }
  });

  function loadPosts(){
    // console.log(link);
      //get data from controller
      $.ajax({
       url:blogLink,
       method:"GET",
       success:function(posts){

          //if data retrieved is not empty
          //continue with the code
          if(posts.total > 0){
            poststable.html("");
            forBtn(1);
            //if there is only 1 page
            //disable both back and forward button
            if(posts.total <= 10){
              backBtn(0);
              forBtn(0);
              back.attr('disabled', true);
              forward.attr('disabled', true);
            }
            else{
              //if the post is currently in another
              //page of pagination
              if(posts.prev_page_url != null){
                back.val(posts.prev_page_url);
              }
              else{
                back.val(posts.first_page_url);
              }

              //if the the pages are not done yet
              if(posts.to < posts.total){
                if(posts.from == '1'){
                  backBtn(0);
                  back.attr('disabled', true);
                }
                forward.val(posts.next_page_url);
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
            posts.data.forEach(function(post){

              var created = new Date(post.created_at);
              var updated = new Date(post.updated_at);
              created = shortMonthNames[created.getMonth()]+" "+created.getDate()+", "+created.getFullYear();
              updated = shortMonthNames[updated.getMonth()]+" "+updated.getDate()+", "+updated.getFullYear();

              poststable.append("<tr><th scope='row'>"+post.post_id+"</th>"+
                "<td>"+post.name+"</td><td>"+post.title.substring(0, 10)+"...</td>"+"<td>"
                +post.body.substring(0, 15)+"...</td><td>"+created+"</td><td>"+updated+"</td>"+
                "<td><a class='btn btn-info btn-sm float-left viewpost text-white'"+
                "style='margin-right: 5px;' data-id='"+post.post_id+"'><i class='fa fa-window-maximize'></i>"+
                "</a><a class='btn btn-danger btn-sm float-left deletePost'"+
                "data-id='"+post.post_id+"'><i class='fa fa-trash text-white'></i></a></td></tr>");
            });
          }
          else{
            //if no users disable both back and forward then
            //show to UI that there is no entry from the tables
            backBtn(0);
            forBtn(0);
            back.attr('disabled', true);
            forward.attr('disabled', true);
            poststable.html("<tr><td style='text-align: center' colspan='7'><h3>No entry</h3></td> </tr>");
          }
        }
      });
  }

  //when clicking forward pagination
  forward.on('click', function(){
    backBtn(1);
    back.attr('disabled', false);
    blogLink = forward.val();
    loadPosts();

  });

  //when clicking backward pagination
  back.on('click', function(){
    forBtn(1);
    forward.attr('disabled', false);
    blogLink = back.val();
    loadPosts();

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

})