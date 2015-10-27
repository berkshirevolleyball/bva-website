<?php

/*
 * Returns CSS class for specified image size
*/

if (!function_exists('get_image_size_count')) {

	function get_image_size_count($imageSize) {
		
		if ($imageSize != "") {

			switch ($imageSize) {
			case "square-large":
			case "rectangle-large":
			case "rectangle-wide":
				$count = 12;
				break;
			case "rectangle-medium":
				$count = 8;
				break;
			case "rectangle-small":
				$count = 6;
				break;
			case "square-thumbnail":
				$count = 2;
				break;
			default:
				$count = 4;
			}
		
		} else {
			$count = 4;
		}
		
		return $count;
	}
	
} else {
	echo "Function Already Exists: get_image_size_count";
}