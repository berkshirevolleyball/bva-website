<?php

/*
 * Creates a gallery
*/

if (!function_exists('the_faqs')) {

	function the_faqs($part) {
		$offers = get_field('faqs');
		$html = '';
		$htmlTopics = '';
		$htmlQuestions = '';
		$counter = 0;
		$counter2 = 0;
		$columnCount = 2;
		$topics = array();
		$selected = "";

		// Offers List
		if (have_rows('faqs')) {

			$html .= '<div id="answers" class="answers">';
			$htmlQuestions .= '<ul id="questions" class="questions">';

			    while (have_rows('faqs')) {

			    	the_row();

			    	$question = get_sub_field('question');
			    	$topic = get_sub_field('topic');

			    	array_push($topics, $topic);

					$html .= '<div class="answer question' . $counter . " " . $topic . '">';
						$html .= '<blockquote>' . $question . '</blockquote>';
						$html .= '<div>' . get_sub_field('answer') . '</div>';
					$html .= '</div>';

					// Populate Questions Navigation List
					$selected = $counter == 0 ? " selected" : "";
					$htmlQuestions .= '<li><a href="#" class="button' . $selected . '" data-question="question' . $counter . '">' . $question . '</a></li>';

					$counter = $counter + 1;
				}

				// Create Topics
				$topics = array_unique($topics);

				if (sizeof($topics) > 0) {
					$htmlTopics .= '<ul class="topics" id="topics">';
						foreach ($topics as $topic) {
							$topicName = ucwords(str_replace("-", " ", $topic));
							$selected = $counter2 == 0 ? " selected" : "";
							$htmlTopics .= '<li><a class="button' . $selected . '" href="#" data-topic="' . $topic . '">' . $topicName . '</a></li>';
							$counter2 = $counter2 + 1;
						}
					$htmlTopics .= '</ul>';
				}

				$html .= '</div>';

			$htmlQuestions .= '</ul>';
			$html .= '</div>';

		} else {
			return;
		}

		if ($part == "categories") {	
			echo $htmlTopics;
		}

		if ($part == "questions") {	
			echo $htmlQuestions;
		}

		if ($part == "faqs") {		
			echo $html;
		}

	}

} else {
	echo "Function Already Exists: the_gallery";
}