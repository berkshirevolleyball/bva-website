<?php

/*
 * Returns a form block using the Contact Form 7 content field
*/

if (!function_exists('get_form_block')) {

	function get_form_block($form = "", $formPosition = "", $formContent = "", $formTitle = "", $blockId = "") {

		$form 			= $form ? $form : get_field('form');
		$formPosition 	= $formPosition ? $formPosition : get_field('form_position');
		$blockId 		= $blockId ? ' id="' . $blockId . '"' : "";
		$html = "";
		$formHtml = "";

		$formHtml .= '<div class="col five">';
			$formHtml .= $form;
		$formHtml .= '</div>';

		if ($form) {

			$html .= '<section>';
				$html .= '<div' . $blockId . ' class="row form-block">';

					if ($formPosition == "left") {
						$html .= $formHtml;
					}

					$html .= '<div class="col seven">';


					if ($formContent) {

						$html .= "<article>";

							if ($formTitle) {
								$html .= "<h2>" . $formTitle . "</h2>";
							}
							$html .= $formContent;

						$html .= "</article>";

					} else {
					
						while (have_posts()) {
							
							the_post();
							
							$html .= "<article>";
								$html .= get_the_content();
							$html .= "</article>";

						}
					}
					
					$html .= '</div>';

					if ($formPosition == "right") {
						$html .= $formHtml;
					}

				$html .= '</div>';
			$html .= '</section>';

		} else {
			$html .= "No form provided. Please add a form into this pages template.";
		}

		echo $html;

	}

} else {
	echo "Function Already Exists: get_form_block";
}