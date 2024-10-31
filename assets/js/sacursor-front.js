jQuery(document).ready(function($){
	$("body").prepend('<div class="cursor-new"></div>');
	$("body").prepend('<div class="cursor-zad"></div>');
	$(document).mousemove(function() {
		$('.cursor-zad').animate({ opacity: 1 }, 1500 );
	});
	$(document).mousemove(function(e) {
		$('.cursor-new').eq(0).css({"left": e.pageX,"top": e.pageY - $(window).scrollTop()});
		$('.cursor-zad').eq(0).css({"left": e.pageX - 20,"top": e.pageY - 20 - $(window).scrollTop()});
	});
});