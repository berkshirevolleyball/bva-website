<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */
?>

<!-- Agencies -->
<section class="agency-block">
	<h3>Agencies currently using Paycircle</h3>

	<nav>
	<?php
		$args = array(
			'post_type' => 'agencies',
			'posts_per_page' => 6
		);
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();

		echo get_image(get_field('logo'), $size = 'thumbnail');

		endwhile;
	?>
	</nav>
	<!--<a href="<?= home_url('/agencies'); ?>">Hear their stories</a>-->
</section>

