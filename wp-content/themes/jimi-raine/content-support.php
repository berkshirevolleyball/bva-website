<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */
?>

<!-- Support -->
<section class="support">
	<h3><?php the_field('support_title', 'options') ?></h3>
	<p><?php the_field('support_subtitle', 'options') ?></p>
	<nav>
		<a href="<?php the_field('support_url', 'options') ?>" class="button tertiary">Contact the Paycircle team</a>
	</nav>
</section>

