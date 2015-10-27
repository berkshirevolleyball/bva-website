<?php
/**
 * The template for displaying featured content
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */
?>

<?php if (function_exists("get_featured_posts")) { ?>
	<div id="featured-content" class="featured-content">
		<div class="featured-content-inner">
		<?php
			/**
			 * Fires before the featured content.
			 *
			 * @since Namespaced 1.0
			 */
			do_action( 'featured_posts_before' );

			$featured_posts = get_featured_posts();
			foreach ( (array) $featured_posts as $order => $post ) :
				setup_postdata( $post );

				 // Include the featured content template.
				get_template_part( 'content', 'featured-post' );
			endforeach;

			/**
			 * Fires after the featured content.
			 *
			 * @since Namespaced 1.0
			 */
			do_action( 'featured_posts_after' );

			wp_reset_postdata();
		?>
		</div>
	</div>
<?php }; ?>
