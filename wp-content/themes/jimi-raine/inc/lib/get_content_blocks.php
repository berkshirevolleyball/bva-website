<?php

/*
 * Returns CSS class for specified image size
*/

if (!function_exists('get_content_blocks')) {

	function get_content_blocks() {

		if (have_rows('content_blocks')) {

			$counter = 1;
		 
		    while (have_rows('content_blocks')) {

		    	the_row();

				$bgImage 		= get_sub_field('background_image');
				$layout 		= get_sub_field('block_layout');
				$graphic 		= get_sub_field('block_graphic');
				$blockTitle 	= get_sub_field('block_title');
				$blockContent 	= get_sub_field('block_content');
				$form 			= get_sub_field('form');
				$formPosition 	= get_sub_field('form_position');

				$bgImageAlt 	= $bgImage['alt'];
				$blockClass 	= $layout == "title-bar" ? "img-holder-title" : "img-holder";
				$graphicSizes 	= $graphic['sizes'];
				$graphicUrl		= $graphicSizes['block-image'];
				$graphicAlt 	= $graphic['alt'];
				$html 			= "";

				// get background image url (defaults to original size)
				if ($bgImage['sizes'] && $bgImage['sizes']['background-image']) {
					$bgImageUrl = $bgImage['sizes']['background-image'];
				} else {
					$bgImageUrl = $bgImage['url'];
				}

				// Build the HTML
				$title = '<h2>' . $blockTitle . '</h2>';
				$content = '<article>' . $blockContent . '</article>';
				$graphicImage = $graphic != "" ? '<div class="table"><div class="cell"><img src="' . $graphicUrl . '" alt="' . $graphicAlt . '" /></div></div>' : "";
				$imgHolderOpen = '<div class="' . $blockClass . '" data-image="' . $bgImageUrl . '" data-width="' . get_sub_field('background_image_width') . '" data-height="' . get_sub_field('background_image_height') . '">';
				$imgHolder = $imgHolderOpen . '</div>';
				$scrollBtnLight = '<a href="#block' . $counter . '" class="scroll-button icon-down"></a>';
				$scrollBtn = '<div class="scroll-button-cont"><a href="#block' . $counter . '" class="scroll-button icon-down dark"></a></div>';
				$counterNext = $counter - 1;
						 		
				
				// Image Left Layout
				if ($layout == "image") {

					$html .= $imgHolder;
					$counter = $counter - 1;

				} else if ($layout == "image-left") {

					$html .= '<div id="block' . $counterNext . '" class="block image-block">';
						$html .= '<section>';
							$html .= '<div class="row">';
								$html .= '<div class="col four image">';
									$html .= $graphicImage;
								$html .= '</div>';
								$html .= '<div class="col eight">';
									$html .= $title;
									$html .= $content;
								$html .= '</div>';
							$html .= '</div>';
							$html .= $scrollBtn;
						$html .= '</section>';
					$html .= '</div>';


				// Image Right Layout
				} else if ($layout == "image-right") {

					$html .= '<div id="block' . $counterNext . '" class="block image-block">';
						$html .= '<section>';
							$html .= '<div class="row">';
								$html .= '<div class="col eight">';
									$html .= $title;
									$html .= $content;
								$html .= '</div>';
								$html .= '<div class="col four image">';
									$html .= $graphicImage;
								$html .= '</div>';
							$html .= '</div>';
							$html .= $scrollBtn;
						$html .= '</section>';
					$html .= '</div>';


				// Centered Layout
				} else if ($layout == "centered") {

					$html .= '<div id="block' . $counterNext . '" class="block image-block">';
						$html .= '<section>';
							$html .= '<div class="row">';
								$html .= '<div class="col one">&nbsp;</div>';
								$html .= '<div class="col ten centered">';
									$html .= $title;
									$html .= $content;
									if ($graphic != "") {
										$html .= '<div class="block-graphic">' . $graphicImage . '</div>';
									}
								$html .= '</div>';
								$html .= '<div class="col one">&nbsp;</div>';
							$html .= '</div>';
							$html .= $scrollBtn;
						$html .= '</section>';
					$html .= '</div>';


				// Form Layout
				} else if ($layout == "form") {
					$blockId = "block" . $counterNext;
					$html .= get_form_block($form, $formPosition, $blockContent, $blockTitle, $blockId);


				// Title Bar Layout
				} else if ($layout == "title-bar") {

					$html .= '<div id="block' . $counterNext . '" class="title-block">';
						$html .= $imgHolderOpen;
							$html .= '<section>';
								$html .= '<div class="row">';
									$html .= '<div class="col twelve">';
										$html .= '<div class="titles">';
											$html .= '<h1>' . $blockTitle . '</h1>';
											$html .= '<h2>' . $blockContent . '</h2>';
											$html .= '<div class="center">' . $scrollBtnLight . '</div>';
										$html .= '</div>';
									$html .= '</div>';
								$html .= "</div>"; // Closes the imgHolderOpen <div> tag
							$html .= '</section>';
						$html .= "</div>";
					$html .= "</div>";

				}

				$counter = $counter + 1;
				echo $html;
			}
		}
	}
} else {
	echo "Function Already Exists: get_content_blocks";
}