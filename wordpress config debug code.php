<?php
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DEBUG_LOG', true);
define( 'SCRIPT_DEBUG', true );
/*define( 'DISALLOW_FILE_EDIT', true );
define( 'DISALLOW_FILE_MODS', true );*/ 
// All Update Remove
function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');
 ?>