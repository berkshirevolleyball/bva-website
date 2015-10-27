<?php
/**
 * The template for displaying featured posts on the front page
 *
 * @package WordPress
 * @subpackage Paycircle
 * @since Paycircle 1.0
 */
?>

<?php if (have_rows('faqs')) { ?>

	<?php

		$questions = '<nav id="faqs" class="questions">';
		$answers = '<div id="answers" class="answers">';
		$counter = 0;

	 	// FAQs
	    while (have_rows('faqs')) {

	    	$selected = $counter == 0 ? ' selected' : '';

	    	the_row();

	        $questions .= '<a href="#" data-id="' . $counter . '" class="' . $selected . '">' . get_sub_field('question') . '<i class="arrow slideIn"></i></a>';
	        $answers .= '<article id="answer-' . $counter . '" class="fadeIn' . $selected . '"><h3>' . get_sub_field('question') . '</h3>' . get_sub_field('answer') . '</article>';
	        $counter++;
	    }

	    $questions .= '</nav>';
	    $answers .= '</div>';

	?>

	<section class="faqs-block">
		<div class="faqs">
			<h2>Answers to your questions</h2>
			<div class="row no-margin">
				<div class="col six">

					<?php echo $questions; ?>

				</div>
				<div class="col six">

					<?php echo $answers; ?>

				</div>
			</div>
		</div>
	</section>

	<script type="text/javascript">
		$(document).ready(function () {

			var questions = $('a', '#faqs');
			var answers = $('article', '#answers');

			questions.on('click', function (event) {

				event.preventDefault();

				var question = $(this);

				if (!question.hasClass('selected')) {

					// Remove selected class from all questions
					questions.each(function () {
						$(this).removeClass('selected');
					});

					// Remove selected class from all answers
					answers.each(function () {
						$(this).removeClass('selected');
					});

					// Find newly clicked answer and add selected class
					var $answerElem = $('#answer-' + $(this).data('id'));
					$(this).addClass('selected');
					$answerElem.addClass('selected');

				}

			});

		});
	</script>

<?php } ?>
