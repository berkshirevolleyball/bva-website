<?php

/**
 * Configure image sizes used across the site
 */

if (!function_exists('get_image_url')) {

	function get_image_url($image, $size) {

		$sizes = $image['sizes'];

		return $sizes[$size];
	}

} else {
	echo "Function Already Exists: get_image_url";
}


if (!function_exists('the_image_url')) {

	function the_image_url($image, $size) {

		echo get_image_url($image, $size);
	}

} else {
	echo "Function Already Exists: the_image_url";
}
