jQuery(document).ready( function($){
	/* Подключаем цветовую гамму */
	$('input[name*="sacursor_main_color_field"]').wpColorPicker();
	$('input[name*="sacursor_second_color_field"]').wpColorPicker();
	
	/* Показываем число в input range */
	const sacursor_opacity_image_value = document.querySelector("#sacursor-opacity-image-value");
	const sacursor_opacity_image = document.querySelector("#sacursor-opacity-image");
	sacursor_opacity_image_value.textContent = sacursor_opacity_image.value;
	sacursor_opacity_image.addEventListener("input", (event) => {
		sacursor_opacity_image_value.textContent = event.target.value;
	});
	const sacursor_opacity_main_value = document.querySelector("#sacursor-opacity-main-value");
	const sacursor_opacity_main = document.querySelector("#sacursor-opacity-main");
	sacursor_opacity_main_value.textContent = sacursor_opacity_main.value;
	sacursor_opacity_main.addEventListener("input", (event) => {
		sacursor_opacity_main_value.textContent = event.target.value;
	});
	
	/* Срывать и показывать настройки*/
	if($('input[name="sacursor_image_activate_field"]').is(':checked')) {
		$('.sacursor-block-second-image').removeClass('sacursor-hide');
		$('.sacursor-block-second-image').addClass('sacursor-show');
		$('.sacursor-block-second-color').removeClass('sacursor-show');
		$('.sacursor-block-second-color').addClass('sacursor-hide');
	} else {
		$('.sacursor-block-second-image').removeClass('sacursor-show');
		$('.sacursor-block-second-image').addClass('sacursor-hide');
		$('.sacursor-block-second-color').removeClass('sacursor-hide');
		$('.sacursor-block-second-color').addClass('sacursor-show');
	}
	$('input[name="sacursor_image_activate_field"]').click(function(){
		if($(this).is(':checked')) {
			$('.sacursor-block-second-image').removeClass('sacursor-hide');
			$('.sacursor-block-second-image').addClass('sacursor-show');
			$('.sacursor-block-second-color').removeClass('sacursor-show');
			$('.sacursor-block-second-color').addClass('sacursor-hide');
		} else {
			$('.sacursor-block-second-image').removeClass('sacursor-show');
			$('.sacursor-block-second-image').addClass('sacursor-hide');
			$('.sacursor-block-second-color').removeClass('sacursor-hide');
			$('.sacursor-block-second-color').addClass('sacursor-show');
		}
	});
	
	/* Меняем фон превью */
	$('.sacursor-preview-fon-item').click(function(){
		var fon_preview = $(this).attr('data-fon');
		$('.sacursor-preview').css('background',fon_preview);
	});
	
	/* Курсор в превью */
	var sacursor_preview = $('#sacursor-preview');
	sacursor_preview.mouseenter(function () {
		$("body").prepend('<div class="cursor-new"></div>');
		$("body").prepend('<div class="cursor-zad"></div>');
		$(document).mousemove(function() {
			$('.cursor-zad').animate({ opacity: 1 }, 1500 );
		});
		$(document).mousemove(function(e) {
			$('.cursor-new').eq(0).css({"left": e.pageX,"top": e.pageY - $(window).scrollTop()});
			$('.cursor-zad').eq(0).css({"left": e.pageX - 20,"top": e.pageY - 20 - $(window).scrollTop()});
		});
		$('a').mouseenter(function(){
			$('.cursor-new').addClass('hover-cursor');
		}).mouseleave(function(){
			$('.cursor-new').removeClass('hover-cursor');
		});
	});
	sacursor_preview.mouseleave(function () {
		$('.cursor-new').remove();
		$('.cursor-zad').remove();
	});
	
	/* Работа вкладок */
	var tab = $('#sacursor-tabs .sacursor-tabs-items > div'); 
	tab.hide().filter(':first').show(); 
	
	// Клики по вкладкам.
	$('#sacursor-tabs .sacursor-tabs-nav a').click(function(){
		tab.hide(); 
		tab.filter(this.hash).show(); 
		$('#sacursor-tabs .sacursor-tabs-nav a').removeClass('active');
		$(this).addClass('active');
		return false;
	}).filter(':first').click();
 
	// Клики по якорным ссылкам.
	$('.sacursor-tabs-target').click(function(){
		$('#sacursor-tabs .sacursor-tabs-nav a[href=' + $(this).attr('href')+ ']').click();
	});
	
	// Отрытие вкладки из хеша URL
	if(window.location.hash){
		$('#sacursor-tabs-nav a[href=' + window.location.hash + ']').click();
		window.scrollTo(0, $("#" . window.location.hash).offset().top);
	}
});