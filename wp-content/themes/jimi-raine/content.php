<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Paycircle
 * @since Paycircle 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (function_exists("post_thumbnail")) { post_thumbnail(); } ?>

	<header>
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && site_has_multiple_categories() ) : ?>
		<div>
			<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'template' ) ); ?></span>
		</div>
		<?php
			endif;

			if ( is_single() ) :
				the_title( '<h1>', '</h1>' );
			else :
				the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>

		<div class="entry-meta">
			<?php
				if ('post' == get_post_type()) {
					if (function_exists("posted_on")) {
						posted_on();
					}
				}

				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'template' ), __( '1 Comment', 'template' ), __( '% Comments', 'template' ) ); ?></span>
			<?php
				endif;

				edit_post_link( __( 'Edit', 'template' ), '<span class="edit-link">', '</span>' );
			?>
		</div>
	</header>

	<?php if (is_search()) { ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
	<?php } else { ?>
		<div class="entry-content">
			<?php
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'template' ) );
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'template' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
		</div>
	<?php } ?>

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article>
