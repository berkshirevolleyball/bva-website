<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */
?>

<!-- Header -->
<header class="site-header white cf">
	<div class="logo">
		<a class="img" href="<?= site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/paycircle-logo@2x.png" height="36" alt="Paycircle" /></a>
		<span class="strapline"><?= get_bloginfo('description'); ?></span>
	</div>
	<nav id="nav">

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

		<a href="<?php the_field('app_url', 'options'); ?>" target="_blank">Login</a>
		<?php if ($GLOBALS['canRegister']) { ?>
			<a href="<?= $GLOBALS['registrationUrl']; ?>" target="_blank" class="button">Sign in</a>
		<?php } ?>
	</nav>
</header>
