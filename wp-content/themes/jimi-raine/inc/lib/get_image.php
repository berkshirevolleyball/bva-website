<?php

/*
 * Creates a gallery
*/

if (!function_exists('get_image')) {

	function get_image($imgObj = null, $size = 'thumbnail', $class = null) {

		$html = null;

		if ($class) {
			$class = ' class="' . $class . '"';
		}

		if ($imgObj) {

			$src = get_image_src($imgObj, $size);

			if ($src != null) {		
				$html .= '<img' . $class . ' src="' . $src . '" alt="' . $imgObj['alt'] . '" title="' . $imgObj['title'] . '" />';
			} else {
				$html .= 'Unable to get image href for the image sizes specified.';
			}

		}

		return $html;
	}

} else {
	echo "Function Already Exists: get_image";
}