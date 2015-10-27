<?php

/*
 * Gets an images url
*/

if (!function_exists('get_image_src')) {

	function get_image_src($imgObj = null, $size = 'thumbnail') {

		if ($imgObj) {

			if (isset($imgObj['sizes'][$size])) {
				$src = $imgObj['sizes'][$size];
			} else {
				$src = $imgObj[$size];
			}

		}

		return $src;
	}

} else {
	echo "Function Already Exists: get_image";
}


/*
 * Prints an images url
*/

if (!function_exists('the_image_src')) {

	function the_image_src($imgObj = null, $size = null) {

		echo get_image_src($imgObj, $size);

	}

} else {
	echo "Function Already Exists: the_image_src";
}