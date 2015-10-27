<?php

/*
 * Adds parent class onto menu parents
*/

if (!function_exists('menu_add_parent_class')) {
	function menu_add_parent_class( $items ) {
		
		$parents = array();
		foreach ($items as $item) {
			if ($item->menu_item_parent && $item->menu_item_parent > 0) {
				$parents[] = $item->menu_item_parent;
			}
		}
		
		foreach ($items as $item) {
			if (in_array($item->ID, $parents)) {
				$item->classes[] = 'menu-parent-item'; 
			}
		}
		
		return $items;    
	}
	add_filter('wp_nav_menu_objects', 'menu_add_parent_class');
} else {
	echo "Function Already Exists: menu_add_parent_class";
}
