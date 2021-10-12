<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

/*all stylesheet add here*/
function creativeanimal_enqueue_style() {
	//-- fonts
	wp_enqueue_style('font_awesome_min', get_template_directory_uri() . "/assets/css/font-awesome/css/font-awesome.min.css", array(), false, 'all');
	wp_enqueue_style('fonts_style_css', get_template_directory_uri() . "/assets/css/font-awesome/css/fonts.css", array(), false, 'all');
//-- styles --
	wp_enqueue_style('plugins_style', get_template_directory_uri() . "/assets/css/plugins.css", array(), false, 'all');
	wp_enqueue_style('main_style', get_template_directory_uri() . "/assets/css/style.css", array(), false, 'all');
	wp_enqueue_style('responsive_style', get_template_directory_uri() . "/assets/css/responsive.css", array(), false, 'all');
}
add_action('wp_enqueue_scripts', 'creativeanimal_enqueue_style');

/*all scripts add here*/
function creativeanimal_enqueue_scripts() {

	wp_enqueue_script(' jquery_plugins', get_template_directory_uri() . "/assets/js/plugins.js", array('jquery'), false, true);
	wp_enqueue_script(' main_js', get_template_directory_uri() . "/assets/js/main.js", array('jquery'), false, true);
	wp_enqueue_script(' script_js', get_template_directory_uri() . "/assets/js/script.js", array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'creativeanimal_enqueue_scripts');

// Script to move all Head scripts to the Footer

function remove_head_scripts() {
	remove_action('wp_head', 'wp_print_scripts');
	remove_action('wp_head', 'wp_print_head_scripts', 9);
	remove_action('wp_head', 'wp_enqueue_scripts', 1);

	add_action('wp_footer', 'wp_print_scripts', 5);
	add_action('wp_footer', 'wp_enqueue_scripts', 5);
	add_action('wp_footer', 'wp_print_head_scripts', 5);
}
add_action('wp_enqueue_scripts', 'remove_head_scripts');

//Remove JQuery migrate

function remove_jquery_migrate($scripts) {
	if (!is_admin() && isset($scripts->registered['jquery'])) {
		$script = $scripts->registered['jquery'];
		if ($script->deps) {
// Check whether the script has any dependencies

			$script->deps = array_diff($script->deps, array('jquery-migrate'));
		}
	}
}
add_action('wp_default_scripts', 'remove_jquery_migrate');

?>