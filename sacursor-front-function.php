<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function sacursor_load_front_script(){
	wp_register_script( 'sacursor-front', plugins_url( 'assets/js/sacursor-front.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'sacursor-front' );
}
function sacursor_load_front_style() {
	wp_enqueue_style( 'sacursor-back', plugins_url( 'assets/css/sacursor-front.css', __FILE__ ) );
}
function sacursor_load_front_css() {
	$cursor_zad_left = (esc_html(get_option('sacursor_second_width')) - (esc_html(get_option('sacursor_second_width')) * 2)) / 2 + 20;
	$cursor_zad_top = (esc_html(get_option('sacursor_second_height')) - (esc_html(get_option('sacursor_second_height')) * 2)) / 2 + 20; ?>
	<style>
		.cursor-new:after { opacity: <?php echo esc_html(get_option('sacursor_main_opacity')); ?>; background: <?php echo esc_html(get_option('sacursor_main_color')); ?>; width: <?php echo esc_html(get_option('sacursor_main_width')); ?>px; height: <?php echo esc_html(get_option('sacursor_main_height')); ?>px; border-radius: <?php echo esc_html(get_option('sacursor_main_radius')); ?>px; }
		.cursor-new.hover-cursor:after { width: <?php echo esc_html(get_option('sacursor_main_width_hover')); ?>px; height: <?php echo esc_html(get_option('sacursor_main_height_hover')); ?>px; }
		.cursor-zad:after { <?php if (esc_html(get_option('sacursor_image_activate')) === 'on') { ?>background-size: contain; background-repeat: no-repeat; background-image: url(<?php echo esc_html(get_option('sacursor_second_image')); ?>); <?php } else { ?> background-color: <?php echo esc_html(get_option('sacursor_second_color')); ?>; <?php } ?> opacity: <?php echo esc_html(get_option('sacursor_second_opacity_image')); ?>; width: <?php echo esc_html(get_option('sacursor_second_width')); ?>px; height: <?php echo esc_html(get_option('sacursor_second_height')); ?>px; border-radius: <?php echo esc_html(get_option('sacursor_second_radius')); ?>px; left: <?php echo esc_html($cursor_zad_left); ?>px;	top: <?php echo esc_html($cursor_zad_top); ?>px; }
		.cursor-zad { <?php if (esc_html(get_option('sacursor_second_activate')) != 'on') { ?>display: none !important; <?php } ?> }
	</style>
	<script>
		jQuery(document).ready(function($){
			$('<?php echo esc_html(get_option('sacursor_href_selectors')); ?>').mouseenter(function(){
				$('.cursor-new').addClass('hover-cursor');
			}).mouseleave(function(){
				$('.cursor-new').removeClass('hover-cursor');
			});
		});
	</script>
<?php }
if (get_option('sacursor_activate') === 'on') {
	add_action( 'wp_enqueue_scripts', 'sacursor_load_front_script' );
	add_action( 'wp_enqueue_scripts', 'sacursor_load_front_style' );
	add_action( 'wp_head', 'sacursor_load_front_css' );
}
?>