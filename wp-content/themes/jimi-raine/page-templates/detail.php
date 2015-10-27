<?php
/**
 * Template Name: Detail
 *
 * @package WordPress
 * @subpackage Paycircle
 * @since Paycircle 1.0
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
	<section class="hero">
		
		<h1><?php the_field('title'); ?></h1>
		<p class="sub-header"><?php the_field('sub_title'); ?></p>

		<!--
		<div class="row diagram">
			<div class="detail">
				<h4>If your take home pay for a day was</h4>
				<div class="amount">&pound;70</div>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/smudge-divider-1.png" />
				<p>But how much of that is travel and food expenses you don't need to pay tax on? We work all that out for you with our Tax Tracker service.</p>
			</div>
			<div class="graphic">
				<img class="overview slideIn" src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-paycircle-graphic.png" alt="Paycircle Logo" />
			</div>
			<div class="detail">
				<h4>When Paycircle sorts your tax it could be</h4>
				<div class="amount">&pound;77.50</div>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/smudge-divider-2.png" />
				<p>We use your travel history and food allowances to calculate what part of your pay is expenses - and make sure you're not overpaying tax.</p>
			</div>
		</div>
		-->

	</section>

</header>


<!-- Detail Block -->
<?php get_template_part( 'block', 'detail' ); ?>


<!-- Learn more 
<a class="link-bar white" href="<?= home_url('/how-it-works'); ?>">Learn more and see a real example</a>
-->


<!-- Feature Carousel -->
<?php get_template_part( 'content', 'feature-carousel' ); ?>


<!-- No Nasty Surprises -->
<?php get_template_part( 'block', 'statement' ); ?>


<!-- Testimonials -->
<?php get_template_part( 'block', 'testimonials' ); ?>


<!-- Register Block -->
<?php get_template_part( 'block', 'register' ); ?>


<!-- Support -->
<?php get_template_part( 'content', 'support' ); ?>


<?php get_footer(); ?>