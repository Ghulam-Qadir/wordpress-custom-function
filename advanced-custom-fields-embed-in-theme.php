<?php
/*ACF Pro Include in Theme*/
define('CSM_ACF_PATH',get_stylesheet_directory().'/inc/acf-pro/');
define('CSM_ACF_URL', get_stylesheet_directory_uri().'/inc/acf-pro/');
require_once CSM_ACF_PATH . 'acf.php';
add_filter('acf/settings/url','csm_settings_url');
function csm_settings_url($url){
	return CSM_ACF_URL;
}

/*** Theme Option with advance custom feild ***/
require get_template_directory() . '/inc/acf.php';

add_filter('acf/settings/show_admin', '__return_false'); 
 ?>