<?php

/*
 * Creates an image slider
*/

if (!function_exists('the_slider')) {

	function the_slider($field, $imgSize = "thumbnail") {
		$images = get_field($field);
		$html = '';

		if ($images) {
			$html .= '<ul class="bx-wrapper">';
				foreach($images as $image) {
					$html .= '<li>';
						$html .= '<img src="' . $image['sizes'][$imgSize] . '" alt="' . $image['alt'] . '" />';
						$html .= '<span class="caption">' . $image['caption'] . '</span>';
					$html .= '</li>';
				}
			$html .= '</ul>';

			echo $html;
		} else {
			return;
		}
	}

} else {
	echo "Function Already Exists: the_slider";
}