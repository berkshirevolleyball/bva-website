<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * @package WordPress
 * @subpackage Paycircle
 * @since Paycircle 1.0
 */
?>

<div class="question-block">
	<div class="row no-margin questions">
		<div class="col four">
			<div class="question">
				<h4><?php the_field('question_1'); ?></h4>
				<p><?php the_field('answer_1'); ?></p>
			</div>
		</div>
		<div class="col four">
			<div class="question">
				<h4><?php the_field('question_2'); ?></h4>
				<p><?php the_field('answer_2'); ?></p>
			</div>
		</div>
		<div class="col four">
			<div class="question">
				<h4><?php the_field('question_3'); ?></h4>
				<p><?php the_field('answer_3'); ?></p>
			</div>
		</div>
	</div>
</div>
