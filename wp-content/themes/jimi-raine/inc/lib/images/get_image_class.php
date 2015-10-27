<?php

/*
 * Returns CSS class for specified image size
*/

if (!function_exists('get_image_class')) {

	function get_image_class($imageSize) {
		
		if ($imageSize != "") {

			switch ($imageSize) {
			case "square-large":
			case "rectangle-large":
			case "rectangle-wide":
				$class = "twelve";
				break;
			case "rectangle-medium":
			case "square-medium":
				$class = "eight";
				break;
			case "rectangle-small":
				$class = "six";
				break;
			case "square-thumbnail":
				$class = "two";
				break;
			default:
				$class = "four";
			}
		
		} else {
			$class = "four";
		}
		
		return $class;
	}

} else {
	echo "Function Already Exists: get_image_class";
}