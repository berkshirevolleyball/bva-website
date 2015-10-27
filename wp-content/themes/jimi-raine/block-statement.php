<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */
?>

<section class="statement-block">
	<div class="statement">
		<div class="row no-margin">
			<div class="col three align-right">
				<figure>
					<i class="icon-<?php the_field('statement_icon'); ?> extralarge"></i>
				</figure>
			</div>
			<div class="col nine">
				<h2><?php the_field('statement_title'); ?></h2>
				<p><?php the_field('statement_description'); ?></p>
			</div>
		</div>
	</div>
</section>

