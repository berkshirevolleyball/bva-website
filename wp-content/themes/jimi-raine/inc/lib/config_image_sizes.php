<?php

/**
 * Configure image sizes used across the site
 */

if (!function_exists('config_image_sizes')) {

	function config_image_sizes($sizes) {

		// Add custom image sizes for the whole site
		add_image_size('portrait-small', 170, 260, true);
		add_image_size('portrait-small@2x', 340, 520, true);
		add_image_size('landscape-small', 170, 120, true);
		add_image_size('landscape-small@2x', 340, 240, true);
		add_image_size('landscape-large', 1400, 400, true);
		add_image_size('landscape-large@2x', 2800, 800, true);
		
		$myimgsizes = array(
			"portrait-small" => __("Portrait Small"),
			"portrait-small@2x" => __("Portrait Small (Retina)"),
			"landscape-small" => __("Landscape Small"),
			"landscape-small@2x" => __("Landscape Small (Retina)"),
			"landscape-large" => __("Landscape Large"),
			"landscape-large@2x" => __("Landscape Large (Retina)")
		);
		$newimgsizes = array_merge($sizes, $myimgsizes);
		
		return $newimgsizes;
	}
	add_filter('image_size_names_choose', 'config_image_sizes');

} else {
	echo "Function Already Exists: config_image_sizes";
}
