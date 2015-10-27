<?php
/**
 * The block to show page snippets (3 column)
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */
?>


<?php 

if (have_rows('snippets')) {

	$html = '';

	$html .= '<section class="snippets-block">';
		$html .= '<div class="snippets">';
			$html .= '<div class="row no-margin">';

				// Features
				while (have_rows('snippets') ) {

					the_row();

					$html .= '<div class="col four">';
						$html .= '<div class="snippet">';
							$html .= '<h3>' . get_sub_field('snippet_header') . '</h3>';
							$html .= '<p>' . get_sub_field('snippet_text') . '</p>';
						$html .= '</div>';
					$html .= '</div>';
				}

			$html .= '</div>';
		$html .= '</div>';
	$html .= '</section>';
}

echo $html;

?>
