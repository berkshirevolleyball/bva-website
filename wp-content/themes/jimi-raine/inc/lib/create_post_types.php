<?php

// Creates new post types
if (!function_exists('create_post_types')) {

	function create_post_types() {

		// Gigs
		register_post_type('gigs',
			array(
				'labels' => array(
					'name' => __( 'Gigs' ),
					'singular_name' => __('Gig'),
					'menu_name' => __('Gigs'),
					'name_admin_bar' => __('Gigs'),
					'all_items' => __('All Gigs'),
					'add_new' => __('Add Gig'),
					'add_new_item' => __('Add Gig'),
					'edit_item' => __('Edit Gig'),
					'new_item' => __('Add Gig'),
					'view_item' => __('View Gig'),
					'search_items' => __('Search Gigs'),
					'not_found' => __('No gigs found'),
					'not_found_in_trash' => __('No gigs found in trash')
				),
				'public' => true,
				'has_archive' => false,
				'menu_position' => 5,
				'supports' => array(
					'title',
					//'editor'
				)
			)
		);


		// Press
		register_post_type('press',
			array(
				'labels' => array(
					'name' => __( 'Press' ),
					'singular_name' => __('Press'),
					'menu_name' => __('Press'),
					'name_admin_bar' => __('Press'),
					'all_items' => __('All Press'),
					'add_new' => __('Add Press'),
					'add_new_item' => __('Add Press'),
					'edit_item' => __('Edit Press'),
					'new_item' => __('Add Press'),
					'view_item' => __('View Press'),
					'search_items' => __('Search Press'),
					'not_found' => __('No press found'),
					'not_found_in_trash' => __('No press found in trash')
				),
				'public' => true,
				'has_archive' => false,
				'menu_position' => 5,
				'supports' => array(
					'title',
					//'editor'
				)
			)
		);
	}
	add_action('init', 'create_post_types');

} else {
	echo "Function Already Exists: create_post_types";
}