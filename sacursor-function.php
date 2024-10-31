<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function sacursor_load_back_style() {
	if(strpos($_SERVER['REQUEST_URI'], "admin.php?page=sacursor") !== false) {
		wp_enqueue_media();
		wp_enqueue_style( 'sacursor-back', plugins_url( 'assets/css/sacursor-back.css', __FILE__ ) );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_register_script( 'sacursor-back', plugins_url( 'assets/js/sacursor-back.js', __FILE__ ), array( 'jquery' ) );
		wp_enqueue_script( 'sacursor-back' );
	}
}
function sacursor_admin_menu () {
	if ( function_exists('add_menu_page') ) {
		add_menu_page( 'SA Custom Cursor Options', 'SA Custom Cursor', 'manage_options', 'sacursor', 'sacursor_admin_options', plugin_dir_url( __FILE__ ) .'assets/images/sa-menu-icon.png', '81' );
	}
}
function sacursor_page_settings_link( $links ) {
	$links[] = '<a href="' .
		admin_url( 'admin.php?page=sacursor' ) .
		'">' . esc_html(__('Настройки', 'sacursor')) . '</a>';
	return $links;
}
function sacursor_load_plugin_languages() {
	load_plugin_textdomain( 'sacursor', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
}
function sacursor_admin_options() {
	$sacursor_activate = get_option('sacursor_activate');
	$sacursor_main_color = get_option('sacursor_main_color');
	$sacursor_image_activate = get_option('sacursor_image_activate');
	$sacursor_second_image = get_option('sacursor_second_image');
	$sacursor_second_opacity_image = get_option('sacursor_second_opacity_image');
	$sacursor_second_color = get_option('sacursor_second_color');
	$sacursor_main_width = get_option('sacursor_main_width');
	$sacursor_main_height = get_option('sacursor_main_height');
	$sacursor_main_radius = get_option('sacursor_main_radius');
	$sacursor_main_width_hover = get_option('sacursor_main_width_hover');
	$sacursor_main_height_hover = get_option('sacursor_main_height_hover');
	$sacursor_second_width = get_option('sacursor_second_width');
	$sacursor_second_height = get_option('sacursor_second_height');
	$sacursor_second_radius = get_option('sacursor_second_radius');
	$sacursor_main_opacity = get_option('sacursor_main_opacity');
	$sacursor_href_selectors = get_option('sacursor_href_selectors');
	$sacursor_second_activate = get_option('sacursor_second_activate');
	if ( isset($_POST['submit']) ) {	
		if ( function_exists('current_user_can') && !current_user_can('manage_options') )
			die ( esc_html(__('Hacker?', 'sacursor')) );
		if (function_exists ('check_admin_referer') ) {
			check_admin_referer('sacursor_form');
		}
		$sanitize_sacursor_activate_field = sanitize_text_field($_POST['sacursor_activate_field']);
		update_option('sacursor_activate', $sanitize_sacursor_activate_field);
		$sanitize_sacursor_main_color_field = sanitize_hex_color($_POST['sacursor_main_color_field']);
		update_option('sacursor_main_color', $sanitize_sacursor_main_color_field);
		$sanitize_sacursor_image_activate_field = sanitize_text_field($_POST['sacursor_image_activate_field']);
		update_option('sacursor_image_activate', $sanitize_sacursor_image_activate_field);
		$sanitize_sacursor_second_image_field = sanitize_text_field($_POST['sacursor_second_image_field']);
		update_option('sacursor_second_image', $sanitize_sacursor_second_image_field);
		$sanitize_sacursor_second_opacity_image_field = sanitize_text_field($_POST['sacursor_second_opacity_image_field']);
		update_option('sacursor_second_opacity_image', $sanitize_sacursor_second_opacity_image_field);
		$sanitize_sacursor_second_color_field = sanitize_hex_color($_POST['sacursor_second_color_field']);
		update_option('sacursor_second_color', $sanitize_sacursor_second_color_field);
		$sanitize_sacursor_main_width_field = sanitize_text_field($_POST['sacursor_main_width_field']);
		update_option('sacursor_main_width', $sanitize_sacursor_main_width_field);
		$sanitize_sacursor_main_height_field = sanitize_text_field($_POST['sacursor_main_height_field']);
		update_option('sacursor_main_height', $sanitize_sacursor_main_height_field);
		$sanitize_sacursor_main_radius_field = sanitize_text_field($_POST['sacursor_main_radius_field']);
		update_option('sacursor_main_radius', $sanitize_sacursor_main_radius_field);
		$sanitize_sacursor_main_width_hover_field = sanitize_text_field($_POST['sacursor_main_width_hover_field']);
		update_option('sacursor_main_width_hover', $sanitize_sacursor_main_width_hover_field);
		$sanitize_sacursor_main_height_hover_field = sanitize_text_field($_POST['sacursor_main_height_hover_field']);
		update_option('sacursor_main_height_hover', $sanitize_sacursor_main_height_hover_field);
		$sanitize_sacursor_second_width_field = sanitize_text_field($_POST['sacursor_second_width_field']);
		update_option('sacursor_second_width', $sanitize_sacursor_second_width_field);
		$sanitize_sacursor_second_height_field = sanitize_text_field($_POST['sacursor_second_height_field']);
		update_option('sacursor_second_height', $sanitize_sacursor_second_height_field);
		$sanitize_sacursor_second_radius_field = sanitize_text_field($_POST['sacursor_second_radius_field']);
		update_option('sacursor_second_radius', $sanitize_sacursor_second_radius_field);
		$sanitize_sacursor_main_opacity_field = sanitize_text_field($_POST['sacursor_main_opacity_field']);
		update_option('sacursor_main_opacity', $sanitize_sacursor_main_opacity_field);
		$sanitize_sacursor_href_selectors_field = sanitize_text_field($_POST['sacursor_href_selectors_field']);
		update_option('sacursor_href_selectors', $sanitize_sacursor_href_selectors_field);
		$sanitize_sacursor_second_activate_field = sanitize_text_field($_POST['sacursor_second_activate_field']);
		update_option('sacursor_second_activate', $sanitize_sacursor_second_activate_field);
	}
	if($_SERVER['QUERY_STRING'] === 'page=sacursor&updated=true') {
		$sacursor_activate = get_option('sacursor_activate');
		$sacursor_main_color = get_option('sacursor_main_color');
		$sacursor_image_activate = get_option('sacursor_image_activate');
		$sacursor_second_image = get_option('sacursor_second_image');
		$sacursor_second_opacity_image = get_option('sacursor_second_opacity_image');
		$sacursor_second_color = get_option('sacursor_second_color');
		$sacursor_main_width = get_option('sacursor_main_width');
		$sacursor_main_height = get_option('sacursor_main_height');
		$sacursor_main_radius = get_option('sacursor_main_radius');
		$sacursor_main_width_hover = get_option('sacursor_main_width_hover');
		$sacursor_main_height_hover = get_option('sacursor_main_height_hover');
		$sacursor_second_width = get_option('sacursor_second_width');
		$sacursor_second_height = get_option('sacursor_second_height');
		$sacursor_second_radius = get_option('sacursor_second_radius');
		$sacursor_main_opacity = get_option('sacursor_main_opacity');
		$sacursor_href_selectors = get_option('sacursor_href_selectors');
		$sacursor_second_activate = get_option('sacursor_second_activate');
		echo '<div class="notice notice-success is-dismissible"><p>Настройки сохранены!</p></div>';
	} ?>
	<div style="display: flex; align-items: center;margin-top: 30px;"><div style="margin-right: 5px;"><?php echo esc_html(__( 'Если вам понравился плагин, будем благодарны за материальную поддержку', 'sacursor' )); ?> - <a href="https://yoomoney.ru/to/410014875578901" target="_blank" style="color: red;"><?php echo esc_html(__( 'Поддержать', 'sacursor' )); ?></a></div></div>
	<hr>
	<div class="sacursor-block" style="position: relative">
	<div class="sacursor-block-setting">
		<h2><?php echo esc_html(__( 'SA Сustom Cursor - Настройки', 'sacursor' )); ?></h2>
		<?php $sacursor_server_php_self = sanitize_text_field($_SERVER['PHP_SELF']); ?>
		<form class="sacursor-form-options" name="sacursor" method="post" action="<?php echo esc_html($sacursor_server_php_self); ?>?page=sacursor&updated=true">
			<?php if (function_exists ('wp_nonce_field') ) {
				wp_nonce_field('sacursor_form'); 
			} ?>
			<div class="sacursor-block-option">
				<div class="sacursor-option-name"><?php echo esc_html(__( 'Активировать настройки', 'sacursor' )); ?> <span data-title="<?php echo esc_html(__( 'При активации применяет настройки на сайте.', 'sacursor' )); ?>">?</span></div>
				<div class="sacursor-option-value"><label class="sacursor-switch"><input class="sacursor-input" type="checkbox" name="sacursor_activate_field" <?php echo esc_html($sacursor_activate) == 'on' ? 'checked="checked"' : ''; ?>><span class="sacursor-slider sacursor-round"></span></label></div>
			</div>
			<div id="sacursor-tabs">
				<ul class="sacursor-tabs-nav">
					<li><a href="#sacursor-tab-1"><?php echo esc_html(__( 'Основной курсор', 'sacursor' )); ?></a></li>
					<li><a href="#sacursor-tab-2"><?php echo esc_html(__( 'Второстепенный курсор', 'sacursor' )); ?></a></li>
					<li><a href="#sacursor-tab-3"><?php echo esc_html(__( 'Парметры', 'sacursor' )); ?></a></li>
				</ul>
				<div class="sacursor-tabs-items">
					<div class="sacursor-tabs-item" id="sacursor-tab-1">
						<div class="sacursor-block-option">
							<div class="sacursor-option-name"><?php echo esc_html(__( 'Цвет', 'sacursor' )); ?></div>
							<div class="sacursor-option-value"><input name="sacursor_main_color_field" type="text" value="<?php echo esc_html($sacursor_main_color); ?>" /></div>
						</div>
						<hr>
						<div class="sacursor-block-option">
							<div class="sacursor-option-name"><?php echo esc_html(__( 'Размеры', 'sacursor' )); ?></div>
							<div class="sacursor-option-value">
								<div class="sacursor-main-setting"><div class="sacursor-main-setting-item"><?php echo esc_html(__( 'Ширина', 'sacursor' )); ?>: </div><input class="sacursor-main-setting-input" type="number" name="sacursor_main_width_field" value="<?php echo esc_html($sacursor_main_width); ?>"> px</div>
								<div class="sacursor-main-setting"><div class="sacursor-main-setting-item"><?php echo esc_html(__( 'Высота', 'sacursor' )); ?>: </div><input class="sacursor-main-setting-input" type="number" name="sacursor_main_height_field" value="<?php echo esc_html($sacursor_main_height); ?>"> px</div>
								<div class="sacursor-main-setting"><div class="sacursor-main-setting-item"><?php echo esc_html(__( 'Закругление углов', 'sacursor' )); ?>: </div><input class="sacursor-main-setting-input" type="number" name="sacursor_main_radius_field" value="<?php echo esc_html($sacursor_main_radius); ?>"> px</div>
							</div>
						</div>
						<hr>
						<div class="sacursor-block-option">
							<div class="sacursor-option-name"><?php echo esc_html(__( 'Размеры при наведении', 'sacursor' )); ?></div>
							<div class="sacursor-option-value">
								<div class="sacursor-main-setting"><div class="sacursor-main-setting-item"><?php echo esc_html(__( 'Ширина', 'sacursor' )); ?>: </div><input class="sacursor-main-setting-input" type="number" name="sacursor_main_width_hover_field" value="<?php echo esc_html($sacursor_main_width_hover); ?>"> px</div>
								<div class="sacursor-main-setting"><div class="sacursor-main-setting-item"><?php echo esc_html(__( 'Высота', 'sacursor' )); ?>: </div><input class="sacursor-main-setting-input" type="number" name="sacursor_main_height_hover_field" value="<?php echo esc_html($sacursor_main_height_hover); ?>"> px</div>
							</div>
						</div>
						<hr>
						<div class="sacursor-block-option">
							<div class="sacursor-option-name"><?php echo esc_html(__( 'Прозрачность', 'sacursor' )); ?></div>
							<div class="sacursor-option-value sacursor-opacity-image"><input id="sacursor-opacity-main" type="range" name="sacursor_main_opacity_field" min="0" max="1" value="<?php echo esc_html($sacursor_main_opacity); ?>" step="0.01" /><output id="sacursor-opacity-main-value"></output></div>
						</div>
					</div>
					<div class="sacursor-tabs-item" id="sacursor-tab-2">
						<div class="sacursor-block-option">
							<div class="sacursor-option-name"><?php echo esc_html(__( 'Активировать второстепенный курсор', 'sacursor' )); ?> <span data-title="<?php echo esc_html(__( 'При активации активируется дополнительный объект за курсором.', 'sacursor' )); ?>">?</span></div>
							<div class="sacursor-option-value"><label class="sacursor-switch"><input class="sacursor-input" type="checkbox" name="sacursor_second_activate_field" <?php echo esc_html($sacursor_second_activate) == 'on' ? 'checked="checked"' : ''; ?>><span class="sacursor-slider sacursor-round"></span></label></div>
						</div>
						<hr>
						<div class="sacursor-block-option">
							<div class="sacursor-option-name"><?php echo esc_html(__( 'Включить изображение', 'sacursor' )); ?> <span data-title="<?php echo esc_html(__( 'Можно добавить изображение за курсором.', 'sacursor' )); ?>">?</span></div>
							<div class="sacursor-option-value"><label class="sacursor-switch"><input class="sacursor-input" type="checkbox" name="sacursor_image_activate_field" <?php echo esc_html($sacursor_image_activate) == 'on' ? 'checked="checked"' : ''; ?>><span class="sacursor-slider sacursor-round"></span></label></div>
						</div>
						<hr>
						<div class="sacursor-block-second-image">
							<div class="sacursor-block-option">
								<div class="sacursor-option-name"><?php echo esc_html(__( 'Изображение', 'sacursor' )); ?></div>
								<div class="sacursor-option-value"><img class="sacursor-preview-second-image" style="max-width: 200px;" src="<?php echo esc_html($sacursor_second_image); ?>"><br><input id="sacursor_upload_image" type="hidden" size="36" name="sacursor_second_image_field" value="<?php echo esc_html($sacursor_second_image); ?>" /><input id="sacursor_upload_image_button" class="button" type="button" value="<?php echo esc_html(__( 'Выбрать изображение', 'sacursor' )); ?>" /></div>
							</div>
						</div>
						<div class="sacursor-block-second-color">
							<div class="sacursor-block-option">
								<div class="sacursor-option-name"><?php echo esc_html(__( 'Цвет', 'sacursor' )); ?></div>
								<div class="sacursor-option-value"><input name="sacursor_second_color_field" type="text" value="<?php echo esc_html($sacursor_second_color); ?>" /></div>
							</div>
						</div>
						<hr>
						<div class="sacursor-block-option">
							<div class="sacursor-option-name"><?php echo esc_html(__( 'Прозрачность', 'sacursor' )); ?></div>
							<div class="sacursor-option-value sacursor-opacity-image"><input id="sacursor-opacity-image" type="range" name="sacursor_second_opacity_image_field" min="0" max="1" value="<?php echo esc_html($sacursor_second_opacity_image); ?>" step="0.01" /><output id="sacursor-opacity-image-value"></output></div>
						</div>
						<hr>
						<div class="sacursor-block-option">
							<div class="sacursor-option-name"><?php echo esc_html(__( 'Размеры', 'sacursor' )); ?></div>
							<div class="sacursor-option-value">
								<div class="sacursor-main-setting"><div class="sacursor-main-setting-item"><?php echo esc_html(__( 'Ширина', 'sacursor' )); ?>: </div><input class="sacursor-main-setting-input" type="number" name="sacursor_second_width_field" value="<?php echo esc_html($sacursor_second_width); ?>"> px</div>
								<div class="sacursor-main-setting"><div class="sacursor-main-setting-item"><?php echo esc_html(__( 'Высота', 'sacursor' )); ?>: </div><input class="sacursor-main-setting-input" type="number" name="sacursor_second_height_field" value="<?php echo esc_html($sacursor_second_height); ?>"> px</div>
								<div class="sacursor-main-setting"><div class="sacursor-main-setting-item"><?php echo esc_html(__( 'Закругление углов', 'sacursor' )); ?>: </div><input class="sacursor-main-setting-input" type="number" name="sacursor_second_radius_field" value="<?php echo esc_html($sacursor_second_radius); ?>"> px</div>
							</div>
						</div>
					</div>
					<div class="sacursor-tabs-item" id="sacursor-tab-3">
						<div class="sacursor-block-option">
							<div class="sacursor-option-name"><?php echo esc_html(__( 'Селекторы наведения', 'sacursor' )); ?> <span data-title="<?php echo esc_html(__( 'Введите через запятую селекторы, при наведении на которые будет отрабатываться как hover. Например: a, div, #block, .new-block и т.д. По умолчанию: a, button', 'sacursor' )); ?>">?</span></div>
							<div class="sacursor-option-value sacursor-opacity-image"><input type="text" name="sacursor_href_selectors_field" value="<?php echo esc_html($sacursor_href_selectors); ?>" /></div>
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="satext,sacursor_activate,sacursor_main_color" />
			<?php submit_button(); ?>
		</form>
	</div>
	<div class="sacursor-block-preview">
		<div class="sacursor-preview-block">
			<h2><?php echo esc_html(__( 'Предпросмотр', 'sacursor' )); ?></h2>
			<div class="sacursor-preview-fon">
				Фон: <div class="sacursor-preview-fon-item sacursor-fon-white" data-fon="#fff"></div><div class="sacursor-preview-fon-item sacursor-fon-black" data-fon="#000"></div>
			</div>
			<?php $cursor_zad_left = (esc_html(get_option('sacursor_second_width')) - (esc_html(get_option('sacursor_second_width')) * 2)) / 2 + 20;
			$cursor_zad_top = (esc_html(get_option('sacursor_second_height')) - (esc_html(get_option('sacursor_second_height')) * 2)) / 2 + 20; ?>
			<style>
				.cursor-new:after { opacity: <?php echo esc_html($sacursor_main_opacity); ?>; background: <?php echo esc_html($sacursor_main_color); ?>; width: <?php echo esc_html($sacursor_main_width); ?>px; height: <?php echo esc_html($sacursor_main_height); ?>px; border-radius: <?php echo esc_html($sacursor_main_radius); ?>px; }
				.cursor-new.hover-cursor:after { width: <?php echo esc_html($sacursor_main_width_hover); ?>px; height: <?php echo esc_html($sacursor_main_height_hover); ?>px; }
				.cursor-zad:after { <?php if (esc_html($sacursor_image_activate) === 'on') { ?>background-size: contain; background-repeat: no-repeat; background-image: url(<?php echo esc_html($sacursor_second_image); ?>); <?php } else { ?> background-color: <?php echo esc_html($sacursor_second_color); ?>; <?php } ?> opacity: <?php echo esc_html($sacursor_second_opacity_image); ?>; width: <?php echo esc_html($sacursor_second_width); ?>px; height: <?php echo esc_html($sacursor_second_height); ?>px; border-radius: <?php echo esc_html($sacursor_second_radius); ?>px; left: <?php echo esc_html($cursor_zad_left); ?>px;	top: <?php echo esc_html($cursor_zad_top); ?>px; }
				.cursor-zad { <?php if (esc_html($sacursor_second_activate) != 'on') { ?>display: none !important; <?php } ?> }
			</style>
			<script>
				jQuery(document).ready(function($){
					/* Подключаем выбор изображения */
					var sacursor_image_uploader;
					$('#sacursor_upload_image_button').click(function(e) {
						e.preventDefault();
						if (sacursor_image_uploader) {
							sacursor_image_uploader.open();
							return;
						}
						sacursor_image_uploader = wp.media.frames.file_frame = wp.media({
							title: '<?php echo esc_html(__( 'Выбрать изображение', 'sacursor' )); ?>',
							button: {
								text: '<?php echo esc_html(__( 'Выбрать изображение', 'sacursor' )); ?>'
							},
							multiple: false
						});
						sacursor_image_uploader.on('select', function() {
							attachment = sacursor_image_uploader.state().get('selection').first().toJSON();
							$('#sacursor_upload_image').val(attachment.url);
							$('.sacursor-preview-second-image').attr('src', attachment.url);
						});
						sacursor_image_uploader.open();
					});
				});
			</script>
			<div id="sacursor-preview" class="sacursor-preview">
				<a class="sacursor-test-href" href="#"><?php echo esc_html(__( 'Наведи на меня', 'sacursor' )); ?></a>
			</div>
			<?php echo esc_html(__( 'Что бы увидеть изменения сохрани настройки', 'sacursor' )); ?>
		</div>
		</div>
	</div>
<?php }
?>