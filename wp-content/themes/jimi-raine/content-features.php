<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */
?>

<?php

	// check if the repeater field has rows of data
	if (have_rows('features')):

		$counter = 0;
		$html = '';

		// Features
		while (have_rows('features') ) : the_row();

			$counter++;
			$title = '';
			$description = '';
			$graphic = '';
			$position = '';

			// Position
			if (get_sub_field('position')) {
				$position = get_sub_field('position');
			}

			// Style
			if (get_sub_field('style')) {
				$style = get_sub_field('style');
			}

			// Title
			if (get_sub_field('title')) {
				$title = '<h2>' . get_sub_field('title') . '</h2>';
			}

			// Description
			if (get_sub_field('description')) {
				$description = '<p>' . get_sub_field('description') . '</p>';
			}

			// Graphic
			if (get_sub_field('graphic')) {
				$graphic = '<div class="col eight align-' . $position . '">';
					if ($position === 'center') {
						$graphic .= $title . $description;
					}
					$graphic .= '<div class="graphic">' . get_image(get_sub_field('graphic'), 'large') . '</div>';
				$graphic .= '</div>';
			}

			// Build HTML & print
			$html .= '<section class="feature-block ' . $position . ' ' . $style . '">';
				$html .= '<div class="row no-margin">';

				if ($position === 'left') {
					$html .= $graphic;
					$html .= '<div class="col four">' . $title . $description . '</div>';
				}

				if ($position === 'right') {
					$html .= '<div class="col four">' . $title . $description . '</div>';
					$html .= $graphic;
				}

				if ($position === 'center') {
					$html .= '<div class="col two">&nbsp;</div>';
					$html .= $graphic;
				}

				$html .= '</div>';
			$html .= '</section>';

		endwhile;

		echo $html;

	endif;
?>

