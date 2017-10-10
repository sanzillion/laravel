

$(document).ready(function(){
//-------------------------
var fileLink = "/files/get";
var filesTable = $('.files');
var back = $('.back');
var forward = $('.for');
//---------------------

	$('.newContainer').on("click", function () {
		$('#newContainer').modal('show');
	});  

	$('.deleteFolder').on("click", function () {
		$(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
		$('#deleteFolder').modal('show');
	}); 

	$('.deleteFiles').on("click", function () {
		$(this).html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
		$('#deleteFiles').modal('show');
	});

	$('.files').on("click", ".deleteFile", function () {
	   var id = $(this).data('id');
	   // console.log("id = "+id);
   		if(id != '')
		     {
		        $('#fileDelete').attr("action", "file/"+id+"/delete");
		        $('#deleteFile').modal('show');
		     }
	});

	$('.no').on("click", function(){
		$('.deleteFolder').html('<i class="fa fa-exclamation-triangle icon"></i>');
	});	

	$('.uploadfile').on("click", function(){

		$.ajax({
			url:"/container/all",
			method:"GET",
			success:function(data){
				console.log(data);
				if(data.length > 0){
					$('#folders').html("<option value='null' selected>Select Folders</option>");
					data.forEach(function(folder){
						$('#folders').append("<option value='"+folder.id+"'>"+ folder.name +"</option>");
					});
				}else{
					$('#folders').html("<option selected>Create a folder</option>");
					$('.folders').attr('disabled', true);
				}
			}
		});

		$('#uploadFile').modal('show');
	});

	$('.files').on("click", '.viewFile', function () {
		var id = $(this).data('id');
		console.log(id);
		if(id != '')
		 {
		      $.ajax({
		           url:"/file/"+id+"/edit",
		           method:"GET",
		           success:function(data){
		           	console.log(data);
			           	$.ajax({
							url:"/container/all",
							method:"GET",
							success:function(data){

								if(data.length > 0){
									$('#vfolders').html("<option value='"+data.folder_id+"' selected>Default</option>");
									data.forEach(function(folder){
										$('#vfolders').append("<option value='"+folder.id+"'>"+ folder.name +"</option>");
									});
								}else{
									$('#vfolders').html("<option selected>Create a folder</option>");
									$('.vfolders').attr('disabled', true);
								}
							}
						});

					  $('#filename').text(data.filename+"."+data.extension);
					  $('#filepic').attr('src', "/storage/files/"+data.filename+"."+data.extension);
		            	$('.uploader').text("Uploader : "+data.uploader);
		              // $('.post-user').html('<i class="fa fa-user"></i>&nbsp '+data.name+
		              //   '&nbsp <i class="fa fa-calendar"></i>&nbsp '+data.time);
		              // $('.card-header').text(data.title);
		              // $('.card-text').html(data.body);
		              $('#viewFile').modal('show');
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
	           	//
	           }
	      });
	 }
	});

//--------------------------
var conLink = "/container";

loadContainer();
	//its just load all the folders actually HAHAHA
	function loadContainer(){
		$.ajax({
			url:conLink,
			method: "GET",
			success:function(folders){
				// console.log(folders);
				if(folders.data.length > 0){
					$('.folder-container').html("");
					$('.num').html("");

					var first = folders.first_page_url;
					
					folders.data.forEach(function(folder){
						$('.folder-container').append('<div class="col-md-3 text-center fbadge">'+
							'<span class="folder-badge bg-dark" id="'+folder.id+'"><a><i class="fa '+
							'fa-times text-red"></i></a></span>'+
				      		'<a><i class="fa fa-folder text-xlg" id="'+folder.id+'"></i></a>'+
				      		'<p class="text-xsm">'+folder.name+'</p></div>');
					});

					for(var x = 0;x < folders.last_page; x++){
						$('.num').append('<a value="'+first.substr(0, first.length-1)+''+(x+1)+'">'+(x+1)+'</a>');
					}

					$('.p-left').val(folders.first_page_url);
					$('.p-right').val(folders.last_page_url);

				}

			}
		});
	}

	$('.pagination-folder').on("click", ".fa", function(){
		conLink = $(this).val();
		loadContainer();
	});

	$('.num').on("click", "a", function(){
		conLink = $(this).attr('value');
		loadContainer();
	});

	$('.folder-container').on("click", ".folder-badge", function(){
		var id = $(this).attr('id');

		$.ajax({
			url:"/file/"+id+"/change",
			method:"POST",
			data:{_method: 'put', _token: token},
			success:function(data, status){
				deleteFolder();
			},
			error:function(){
				console.log("Unable to change files");
			}
		});

		function deleteFolder(){
			$.ajax({
				url:"/container/"+id+"/delete",
				method:"POST",
				data: {_method: 'delete', _token: token},
				success:function(){
					loadFiles();
					loadContainer()
				},
				error:function(){
					console.log("something went wrong");
				}
			})
		}
	});

	$('.folder-container').on("click", ".text-xsm", function(){
		var txt = $(this).text();
		console.log(txt);
	});

	var prevFolder = "";
	$('.folder-container').on("click", ".text-xlg", function(){
		var folder_id = $(this).attr('id');

		fileLink = "/files/get?folder="+folder_id;
		// console.log(fileLink);
		loadFiles();

		if(prevFolder != ''){
			prevFolder.removeClass('fa-folder-open')
			prevFolder.addClass('fa-folder')
		}

		$(this).removeClass('fa-folder');
		$(this).addClass('fa-folder-open');
		prevFolder = $(this);
	});

	// $('html').click(function(e){
	// 	// console.log(e.target);
	// 	if(!$(e.target).hasClass('fa')){
	// 		// console.log('clicked outside folders');
	// 		if(prevFolder != ''){
	// 			prevFolder.removeClass('fa-folder-open');
	// 			prevFolder.addClass('fa-folder');
	// 		}
	// 	}
	// });

loadFiles();
//FILES
// the code below is rendering tables with pagination without 
// reloading the page through ajax with search function on users table

    $('.searchFiles').keyup(function(event){
    // var keyCode = event.which; // check which key was pressed
    var string = $(this).val(); // get the complete input
    // console.log(string);
    if(string != ''){
      $.ajax({
       url:"/file/"+string+"/search",
       method:"GET",
       success:function(files){
          console.log(files);
          if(files.data.length > 0){
            filesTable.html("");
            files.data.forEach(function(file){

              filesTable.append("<tr><th scope='row'>"+file.id+"</th>"+
                "<td>"+file.uploader+"</td><td>"+file.filename.substr(0, 10)+"..."+"</td>"+"<td>"
                +file.extension+"</td>"+"<td><a class='btn btn-info btn-sm float-left viewFile text-white'"+ 
				"style='margin-right: 5px;' data-id='"+file.id+"'><i class='fa fa-window-maximize'></i></a>"+
                "<a class='btn btn-primary btn-sm float-left downloadFile' style='margin-right: 5px; color: white;'"+
                "href='/download/"+file.filename+'.'+file.extension+"'><i class='fa fa-download'></i></a><a "+ 
                "class='btn btn-danger btn-sm float-left deleteFile' data-id='"+file.id+"'><i class='fa "+
                "fa-trash text-white'></i></a></td></tr>");
            });
          }
          else{
            filesTable.html("<tr><td style='text-align: center' colspan='5'><h3>No entry</h3></td> </tr>");
          }
        }
      });
    }else{
      loadFiles();
    }
  });

  function loadFiles(){
    // console.log(link);
      //get data from controller
      $.ajax({
       url:fileLink,
       method:"GET",
       success:function(files){
          // console.log(files);

          //if data retrieved is not empty
          //continue with the code
          if(files.total > 0){
            filesTable.html("");
            forBtn(1);
            //if there is only 1 page
            //disable both back and forward button
            if(files.total <= 5){
              backBtn(0);
              forBtn(0);
              back.attr('disabled', true);
              forward.attr('disabled', true);
            }
            else{
              //if the user is currently in another
              //page of pagination
              if(files.prev_page_url != null){
                back.val(files.prev_page_url);
              }
              else{
                back.val(files.first_page_url);
              }

              //if the the pages are not done yet
              if(files.to < files.total){
                if(files.from == '1'){
                  backBtn(0);
                  back.attr('disabled', true);
                }
                forward.val(files.next_page_url);
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
            files.data.forEach(function(file){

              filesTable.append("<tr><th scope='row'>"+file.id+"</th>"+
                "<td>"+file.uploader+"</td><td>"+file.filename.substr(0, 10)+"..."+"</td>"+"<td>"
                +file.extension+"</td>"+"<td><a class='btn btn-info btn-sm float-left viewFile text-white'"+ 
				"style='margin-right: 5px;' data-id='"+file.id+"'><i class='fa fa-window-maximize'></i></a>"+
                "<a class='btn btn-primary btn-sm float-left downloadFile' style='margin-right: 5px; color: white;'"+
                "href='/download/"+file.filename+'.'+file.extension+"'><i class='fa fa-download'></i></a><a "+ 
                "class='btn btn-danger btn-sm float-left deleteFile' data-id='"+file.id+"'><i class='fa "+
                "fa-trash text-white'></i></a></td></tr>");
            });
          }
          else{
            //if no users disable both back and forward then
            //show to UI that there is no entry from the tables
            backBtn(0);
            forBtn(0);
            back.attr('disabled', true);
            forward.attr('disabled', true);
            filesTable.html("<tr><td style='text-align: center' colspan='7'><h3>No entry</h3></td> </tr>");
          }
        }
      });
  }

  //when clicking forward pagination
  forward.on('click', function(){
    backBtn(1);
    back.attr('disabled', false);
    fileLink = forward.val();
    loadFiles();

  });

  //when clicking backward pagination
  back.on('click', function(){
    forBtn(1);
    forward.attr('disabled', false);
    fileLink = back.val();
    loadFiles();

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


//end of jquery	
})