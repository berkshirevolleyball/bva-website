<?php

/**
 * Updates "Posts" menu label within WP Admin
 */

if (!function_exists('change_menu_labels')) {

	function change_menu_labels() {
		global $menu;
		global $submenu;
		$menu[5][0] = 'Articles';
		$submenu['edit.php'][5][0] = 'Article';
		$submenu['edit.php'][10][0] = 'Add Article';
	}
	add_action('admin_menu', 'change_menu_labels');

} else {
	echo "Function Already Exists: change_menu_labels";
}

if (!function_exists('change_post_object_labels')) {

	function change_post_object_label() {
		global $wp_post_types;
		$labels = &$wp_post_types['post']->labels;
		$labels->name = 'Article';
		$labels->singular_name = 'Article';
		$labels->add_new = 'Add Article';
		$labels->add_new_item = 'Add Article';
		$labels->edit_item = 'Edit Article';
		$labels->new_item = 'Article';
		$labels->view_item = 'View Article';
		$labels->search_items = 'Search Articles';
		$labels->not_found = 'No Articles found';
		$labels->not_found_in_trash = 'No Articles found in Trash';
	}
	add_action('init', 'change_post_object_label');

} else {
	echo "Function Already Exists: change_post_object_labels";
}