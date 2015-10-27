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

	function theTestimonials ($options) {

		$testimonials = $options ? get_field('testimonials', 'options') : get_field('testimonials');
		$title = $options ? get_field('testimonials_title', 'options') : get_field('testimonials_title');
		$noRows = count($testimonials);
		$options = $options ? 'options' : '';
		$counter = 1;
		
		$html = '<section class="testimonials">';

			$html .= '<h3>' . $title . '</h3>';

			// Features
	    	while (have_rows('testimonials', $options)) {

	    		// Setup the row
	    		the_row();

	    		if ($counter === 1 || $counter % 3 === 0) {
					$html .= '<div class="row">';
				}

				$html .= '<div class="col six">';
					$html .= '<div class="testimonial">';
						$html .= get_image(get_sub_field('avatar'), 'thumbnail');
						$html .= '<blockquote>' . get_sub_field('quote') . '</blockquote>';
						$html .= '<p>' . get_sub_field('name') . '<br />' . get_sub_field('job_title') . '</p>';
					$html .= '</div>';
				$html .= '</div>';

				if ($counter === $noRows || $counter % 2 === 0) {
					$html .= '</div>';
				}

				$counter++;

			}

		$html .= '</section>';

		echo $html;

	}

	if (have_rows('testimonials')) {

		theTestimonials(false);

	} else if (have_rows('testimonials', 'options')) {

		// Always load sitewide as default
		theTestimonials(true);

	}
?>

