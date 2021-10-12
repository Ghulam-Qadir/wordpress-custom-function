<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
// Register Custom Post Type Portfolios
function create_portfolios_cpt() {

	$labels = array(
		'name' => _x('Portfolios', 'Post Type General Name', 'textdomain'),
		'singular_name' => _x('Portfolios', 'Post Type Singular Name', 'textdomain'),
		'menu_name' => _x('Portfolios', 'Admin Menu text', 'textdomain'),
		'name_admin_bar' => _x('Portfolios', 'Add New on Toolbar', 'textdomain'),
		'archives' => __('Portfolios Archives', 'textdomain'),
		'attributes' => __('Portfolios Attributes', 'textdomain'),
		'parent_item_colon' => __('Parent Portfolios:', 'textdomain'),
		'all_items' => __('All Portfolios', 'textdomain'),
		'add_new_item' => __('Add New Portfolio', 'textdomain'),
		'add_new' => __('Add New', 'textdomain'),
		'new_item' => __('New Portfolios', 'textdomain'),
		'edit_item' => __('Edit Portfolios', 'textdomain'),
		'update_item' => __('Update Portfolios', 'textdomain'),
		'view_item' => __('View Portfolios', 'textdomain'),
		'view_items' => __('View Portfolios', 'textdomain'),
		'search_items' => __('Search Portfolios', 'textdomain'),
		'not_found' => __('Not found', 'textdomain'),
		'not_found_in_trash' => __('Not found in Trash', 'textdomain'),
		'featured_image' => __('Featured Image', 'textdomain'),
		'set_featured_image' => __('Set featured image', 'textdomain'),
		'remove_featured_image' => __('Remove featured image', 'textdomain'),
		'use_featured_image' => __('Use as featured image', 'textdomain'),
		'insert_into_item' => __('Insert into Portfolios', 'textdomain'),
		'uploaded_to_this_item' => __('Uploaded to this Portfolios', 'textdomain'),
		'items_list' => __('Portfolios list', 'textdomain'),
		'items_list_navigation' => __('Portfolios list navigation', 'textdomain'),
		'filter_items_list' => __('Filter Portfolios list', 'textdomain'),
	);
	$args = array(
		'label' => __('Portfolios', 'textdomain'),
		'description' => __('', 'textdomain'),
		'labels' => $labels,
		'menu_icon' => 'dashicons-portfolio',
		'supports' => array('title', 'thumbnail', 'excerpt'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'rewrite' => array(
			'slug' => 'portfolio',
			'with_front' => false,
		),
	);
	register_post_type('portfolio', $args);

}
add_action('init', 'create_portfolios_cpt', 0);

// Register Custom Taxonomy
function Portfolios_custom_taxonomy() {

	$labels = array(
		'name' => _x('Portfolios Categories', 'Taxonomy General Name', 'text_domain'),
		'singular_name' => _x('Portfolios Category', 'Taxonomy Singular Name', 'text_domain'),
		'menu_name' => __('Portfolios Categories', 'text_domain'),
		'all_items' => __('All Items', 'text_domain'),
		'parent_item' => __('Parent Item', 'text_domain'),
		'parent_item_colon' => __('Parent Item:', 'text_domain'),
		'new_item_name' => __('New Item Name', 'text_domain'),
		'add_new_item' => __('Add New Item', 'text_domain'),
		'edit_item' => __('Edit Item', 'text_domain'),
		'update_item' => __('Update Item', 'text_domain'),
		'view_item' => __('View Item', 'text_domain'),
		'separate_items_with_commas' => __('Separate items with commas', 'text_domain'),
		'add_or_remove_items' => __('Add or remove items', 'text_domain'),
		'choose_from_most_used' => __('Choose from the most used', 'text_domain'),
		'popular_items' => __('Popular Items', 'text_domain'),
		'search_items' => __('Search Items', 'text_domain'),
		'not_found' => __('Not Found', 'text_domain'),
		'no_terms' => __('No items', 'text_domain'),
		'items_list' => __('Items list', 'text_domain'),
		'items_list_navigation' => __('Items list navigation', 'text_domain'),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'rewrite' => array(
			'slug' => 'portfolio-category',
			'with_front' => false,
			'hierarchical' => true,
		),
	);
	register_taxonomy('Portfolios_categories', array('portfolio'), $args);
}
add_action('init', 'Portfolios_custom_taxonomy', 0);
?>