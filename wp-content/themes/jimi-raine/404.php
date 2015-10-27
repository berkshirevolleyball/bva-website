<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */

get_header();

?>

<header>

	<!-- Header -->
	<?php get_template_part( 'nav', 'light' ); ?>

	<!-- Banner -->
	<section class="hero">
		
		<h1>Nowhere to go...</h1>
		<p class="sub-header">We've hit a dead end. Use the navigation above to get back on track.</p>

	</section>

</header>

<!-- Support -->
<?php get_template_part( 'content', 'support' ); ?>


<?php get_footer(); ?>