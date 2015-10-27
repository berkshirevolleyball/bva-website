<?php

/*
 * Returns CSS class for specified image size
*/

if (!function_exists('get_home_block')) {

	function get_home_block() {

		$bgImageField	= 'background-image';
		$bgImage 		= get_field('banner_image');

		if ($bgImage) {

			if ($bgImage['sizes'] && $bgImage['sizes'][$bgImageField]) {
				$bgImageUrl = $bgImage['sizes'][$bgImageField];
			} else {
				$bgImageUrl = $bgImage['url'];
			}
			$bgImageAlt 	= $bgImage['alt'];

			$heading 		= get_field('heading');
			$subHeading 	= get_field('sub_heading');
			$ctas 			= get_field('call_to_actions');
			$html 			= "";
			
			$html .= '<div class="img-holder-title title-block" data-image="' . $bgImageUrl . '" data-width="' . get_field('banner_image_width') . '" data-height="' . get_field('banner_image_height') . '" data-extra-height="0">';
				$html .= '<section>';
					$html .= '<div class="row">';
						$html .= '<div class="col twelve">';
							$html .= '<div class="titles">';
								$html .= '<h1>' . $heading . '</h1>';
								$html .= '<h2>' . $subHeading . '</h2>';

								if (have_rows('call_to_actions')) {
									$html .= '<div class="actions">';
										while (have_rows('call_to_actions')) {

											the_row();

											$html .= '<a class="button large bordered light-grey" href="' . get_sub_field('page') . '">' . get_sub_field('text') . '</a>';

										}
									$html .= '</div>';
								}

							$html .= '</div>';
						$html .= '</div>';
					$html .= '</div>';
				$html .= '</section>';
			$html .= '</div>';

		} else {
			$html .= '<h1>' . $heading . '</h1>';
			$html .= '<h2>' . $subHeading . '</h2>';
		}

		echo $html;

	}
} else {
	echo "Function Already Exists: get_home_block";
}