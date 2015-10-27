<?php

/**
 * Display next/previous navigation when applicable
 */

if (!function_exists('nav_next_previous')) {
	function nav_next_previous($nav_id) {
		global $wp_query;

		if ($wp_query->max_num_pages > 1) : ?>
			<nav id="<?php echo $nav_id; ?>">
				<h3 class="assistive-text"><?php _e( 'Post navigation', 'template' ); ?></h3>
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'template' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'template' ) ); ?></div>
			</nav>
		<?php endif;
	}
} else {
	echo "Function Already Exists: nav_next_previous";
}