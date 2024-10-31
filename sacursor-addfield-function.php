<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_option('sacursor_activate', '');
add_option('sacursor_main_color', '#dbdbdb');
add_option('sacursor_image_activate', '');
add_option('sacursor_second_image', '');
add_option('sacursor_second_opacity_image', '0.5');
add_option('sacursor_second_color', '#dbdbdb');
add_option('sacursor_main_width', '20');
add_option('sacursor_main_height', '20');
add_option('sacursor_main_radius', '100');
add_option('sacursor_main_width_hover', '40');
add_option('sacursor_main_height_hover', '40');
add_option('sacursor_second_width', '40');
add_option('sacursor_second_height', '40');
add_option('sacursor_second_radius', '100');
add_option('sacursor_main_opacity', '1');
add_option('sacursor_href_selectors', 'a, button');
add_option('sacursor_second_activate', 'on');

add_action( 'admin_menu', 'sacursor_admin_menu' );
add_action('admin_enqueue_scripts', 'sacursor_load_back_style');
add_action( 'plugins_loaded', 'sacursor_load_plugin_languages' );
?>