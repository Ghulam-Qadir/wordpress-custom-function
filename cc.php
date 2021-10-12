<?php
if ( ! defined( 'ABSPATH' ) ) {
     exit; // Exit if accessed directly
 }
/******************** Crunchify Tips - Clean up WordPress Header START **********************/
function crunchify_remove_version() {
  return '';
}
add_filter('the_generator', 'crunchify_remove_version');
 
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
 
remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
 
function crunchify_cleanup_query_string( $src ){ 
  $parts = explode( '?', $src ); 
  return $parts[0]; 
} 
add_filter( 'script_loader_src', 'crunchify_cleanup_query_string', 15, 1 ); 
add_filter( 'style_loader_src', 'crunchify_cleanup_query_string', 15, 1 );
// ******************** Clean up WordPress Header END ********************** //



// ******************** Clean up pluging list ********************** //
add_filter( 'all_plugins', 'hide_plugins');
function hide_plugins($plugins)
{
	// Hide advanced custom field
	if(is_plugin_active('advanced-custom-fields-pro/acf.php')) {
		unset( $plugins['advanced-custom-fields-pro/acf.php'] );
	}
	// Hide advanced custom field extended
	if(is_plugin_active('acf-extended/acf-extended.php')) {
		unset( $plugins['acf-extended/acf-extended.php'] );
	}
	
	return $plugins;
}

// ******************** Hide custom feild from menu ********************** //

add_filter('acf/settings/show_admin', '__return_false');
?>