<?php

/*
 * Creates a gallery
*/

if (!function_exists('the_gallery')) {

	function the_gallery($size = 'medium') {
		$images = get_field('gallery');
		$html = '';

		if ($images) {
			$html = '<div class="flexslider">';
				$html .= '<ul class="slides">';
				foreach($images as $key=>$image) {
					$html .= '<li>';
						$html .= '<img src="' . $image['sizes'][$size] . '" alt="' . $image['alt'] . '" />';
						$html .= '<p class="flex-caption">' . $image['caption'] . '</p>';
					$html .= '</li>';
				}
				$html .= '</ul>';
			$html .= '</div>';
		}
		echo $html;
	}

} else {
	echo "Function Already Exists: the_gallery";
}