<?php
/**
 * The template for displaying posts in the Gallery post format
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */
?>

<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */
?>

<div class="main" role="main">
	<section>
		<div class="row">
			<div class="col twelve">
				<?php image_block(); ?>
			</div>
		</div>
	</section>
</div>

<?php if (!is_front_page()) { ?>
	<h1><?php the_title(); ?></h1>
<?php } ?>

<article>
	<?php the_content(); ?>
</article>
