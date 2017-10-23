$(document).ready(function(){
	
	$(window).scroll(function(){
		var scroll = $(window).scrollTop();
		var width  = $(window).width();
		if (width < 986 && scroll > 0) {
			$('.navbar').addClass('fixed-top');
			$('.navbar').css('opacity', '.8');
		}else if (width > 1000 && scroll > 120) {
			$('.navbar').addClass('fixed-top');
			$('.navbar').css('opacity', '.8');
		}
		else{
			$('.navbar').removeClass('fixed-top');
			$('.navbar').css('opacity', '1');
			

		}
	});

	$('.sidebar li').removeClass('active');
  	$('.'+session).addClass('active');
  	$('.'+session+' a').attr('href', '#');
  	$('body').on("click", function(evt){

  		if($(evt.target).hasClass('profile__avatar')){
  			//stay open
  			return false;	
  		}
  		else if($(evt.target).closest('.container-1').length > 0){
  			//stay open
  			return false;
  		}
  		else{
  			//close
  			$('.profile').removeClass('profile--open');
  		}
  	});

  	// $('.login').on('click', function(){
  	// 	$('.login').submit();
  	// 	console.log($('#fieldUser').val());
  	// 	$(this).submit();
  	// });

  	$('#forgotPass').on('click', function(){
      window.location.href = '/password/reset';
    });

    $('#registerbtn').on('click', function(){
  		window.location.href = '/register';
  	});

  	$('.tagline-lower a').on('click', function(){
  		$('#login').attr('action', '/admin/login');
  	})

//end of jquery
})