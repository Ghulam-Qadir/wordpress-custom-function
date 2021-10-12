<?php
function new_nav_menu_items($items, $args) {
    if($args->theme_location == 'main-menu'){
		$social_item =	"<ul class='nav navbar-nav login-btn'>";
		$social_item .= "<li class='nav-item'><a class='nav-link' href='#'>LOG IN</a></li>";
        $social_item .= "</ul>";
       $items = $items . $social_item;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'new_nav_menu_items', 10, 2); 
 ?>