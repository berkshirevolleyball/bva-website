<?php
/**
 * The template for the How It Works page (deprecated)
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

	<!-- Navigation -->
	<?php get_template_part( 'nav', 'light' ); ?>

	<!-- Hero -->
	<section class="hero fadeIn">
		
		<h1><?php the_field('title'); ?></h1>
		<p class="sub-header"><?php the_field('sub_title'); ?></p>

	</section>


</header>


<!-- No Nasty Surprises -->
<?php get_template_part( 'block', 'statement' ); ?>


<!-- Feature Carousel -->
<?php get_template_part( 'content', 'feature-carousel' ); ?>


<!-- FAQs -->
<?php get_template_part( 'content', 'faqs' ); ?>


<!-- Support -->
<?php get_template_part( 'content', 'support' ); ?>


<!-- Footer -->
<?php get_footer(); ?>
