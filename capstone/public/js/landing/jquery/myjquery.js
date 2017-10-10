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
})