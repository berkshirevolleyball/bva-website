<?php
/**
 * The template for the Tax Tracker page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */

get_header();

$featureImage = get_field('feature_image');
$backgroundImage = '';

if ($featureImage) {
	$backgroundImageSrc = get_image_src(get_field('feature_image'), 'hero');
	$backgroundImage = $backgroundImageSrc !== '' ? ' style="background-image:url(' . $backgroundImageSrc . ')"' : '';
}

?>

<header <?=$backgroundImage; ?>>

	<!-- Header -->
	<?php get_template_part( 'nav', 'light' ); ?>

	<!-- Banner -->
	<section class="hero fadeIn">
		
		<h1><?php the_field('title'); ?></h1>
		<p class="sub-header"><?php the_field('sub_title'); ?></p>

		<div class="diagram">
			<img class="dropIn" src="<?php echo get_stylesheet_directory_uri(); ?>/images/quick-paycircle-diagram.png" alt="Paycircle Tax Tracker Calculation" width="650" />
		</div>

	</section>

</header>


<!-- Detail Block -->
<?php get_template_part( 'block', 'snippets' ); ?>


<!-- Learn more 
<a class="link-bar white" href="<?= home_url('/how-it-works'); ?>">Learn more and see a real example</a>
-->


<!-- Feature Carousel -->
<?php get_template_part( 'content', 'feature-carousel' ); ?>


<!-- FAQs -->
<?php get_template_part( 'content', 'faqs' ); ?>


<!-- No Nasty Surprises -->
<?php //get_template_part( 'block', 'statement' ); ?>


<!-- Worked Examples -->
<?php get_template_part( 'content', 'worked-examples' ); ?>


<!-- Testimonials -->
<?php get_template_part( 'block', 'testimonials' ); ?>


<!-- Register Block -->
<?php get_template_part( 'block', 'register' ); ?>


<!-- Support -->
<?php get_template_part( 'content', 'support' ); ?>


<?php get_footer(); ?>