<?php
/**
 * Template Name: form
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

	</section>

</header>

<section class="page-content">
	<div class="row">
		<div class="col three">&nbsp;</div>
		<div class="col six">
			<article>
				<?php the_content(); ?>
			</arcticle>

			<?php the_field('form'); ?>
			
		</div>
	</div>
</section>

<div class="border"></div>


<!-- Support -->
<?php get_template_part( 'content', 'support' ); ?>


<?php get_footer(); ?>