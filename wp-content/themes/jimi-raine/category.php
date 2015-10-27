<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */

get_header();

?>

<section class="row">
	<div class="span twelve" role="main">

		<?php if (have_posts()) { ?>

			<header>
				<h1><?php printf( __( 'Category Archives: %s', 'template' ), single_cat_title( '', false ) ); ?></h1>

				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( !empty($term_description) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header>

			<?php while (have_posts()) { ?>

				<?php the_post(); ?>

				<?php get_template_part('content', get_post_format()); ?>

			<?php } ?>
					
			<?php paging_nav(); ?>

		<?php } else { ?>

			<!-- No Posts Found -->
			<?php get_template_part( 'content', 'none' ); ?>

		<?php } ?>
	</div>
</section>

<?php

get_sidebar( 'content' );
get_sidebar();
get_footer();
