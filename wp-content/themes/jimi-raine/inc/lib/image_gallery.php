<?php

/*
 * Creates a gallery
*/

if (!function_exists('image_gallery')) {

	function image_block($sizes = 'thumbnail', $classlist = null) {
		$images = get_field('gallery');
		$html = null;
		$src = null;
		$class = null;
		$size = null;
		$index = 0;

		if ($images) {
			$html = '<div class="image-gallery">';
			foreach($images as $image) {

				//var_dump($image);

				if (is_array($sizes)) {
					$size = $sizes[$index];
				} else {
					$size = $sizes;
				}

				if (isset($image['sizes'][$size])) {
					$src = $image['sizes'][$size];
				}

				if (isset($classlist) && is_array($classlist)) {
					$class = ' class="' . $classlist[$index] . '"';
				}

				if ($src != null) {		
					$html .= '<img' . $class . ' src="' . $src . '" alt="' . $image['alt'] . '" />';
				} else {
					$html .= 'Unable to get image href for the image sizes specified.';
				}
				
				if ($index == 3) {
					$index = 0;
				} else {
					$index++;
				}
			}
			$html .= '</div>';
		}
		echo $html;
	}

} else {
	echo "Function Already Exists: image_gallery";
}