<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */
?>

<!-- Navigation -->
<section class="navigation">

	<!-- Logo -->
	<a class="logo" href="<?= site_url(); ?>"><img src="<?php echo get_image_src(get_field('logo', 'options'), 'large'); ?>" height="50" alt="<?= get_bloginfo('name'); ?>" />

	<!-- Navigation -->
	<nav>
		<?php

		$menuParameters = array(
			'container'       => false,
			'depth'           => 0,
			'echo'            => false,
			'items_wrap'      => '%3$s',
			'theme_location'	=> 'header-nav'
		);

		echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );

		?>

	</nav>

	<a href="" class="button">Submit a scoresheet</a>

</section>
