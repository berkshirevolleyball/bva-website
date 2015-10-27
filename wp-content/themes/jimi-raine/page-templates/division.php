<?php
/**
 * Template Name: Division
 *
 * @package WordPress
 * @subpackage Paycircle
 * @since Paycircle 1.0
 */

get_header();

?>


<section class="body">
	
	<div class="row">
		<div class="col six">
			<h1><?php the_field('title'); ?></h1>
			<p class="sub-header"><?php the_field('sub_title'); ?></p>
		</div>
		<div class="col six align-right">
			<div class="button-group horizontal">
				<a class="button tertiary">All</a><a class="button tertiary">Info</a><a class="button tertiary">Tables</a><a class="button tertiary">Fixtures</a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col three">&nbsp;</div>
		<div class="col six">
			<article>
				<?php the_field('fixtures'); ?>
			</article>
			<article>
				<?php the_field('league_table'); ?>
			</arcticle>
			<article>
				<?php the_field('mvp'); ?>
			</arcticle>
			<article>
				<?php the_content(); ?>
			</arcticle>
		</div>
	</div>
</section>


<?php get_footer(); ?>