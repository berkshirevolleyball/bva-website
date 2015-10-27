<?php
/**
 * The template for the blog homepage
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
	<section class="hero">
		
		<h1><?php the_field('title'); ?></h1>
		<p class="sub-header"><?php the_field('sub_title'); ?></p>

	</section>

</header>

<section class="page-content">

	<?php if (have_posts()) { ?>

		<?php while (have_posts()) { ?>

			<div class="row">
				<div class="col two">&nbsp;</div>
				<div class="col six">

					<?php the_post(); ?>

					<?php get_template_part('content', 'excerpt'); ?>

				</div>
			</div>		

		<?php } ?>

	<?php } else { ?>

		<!-- No Posts Found -->
		<?php get_template_part( 'content', 'none' ); ?>

	<?php } ?>
	
	<?php paging_nav(); ?>
</section>

<div class="border"></div>


<!-- Support -->
<?php get_template_part( 'content', 'support' ); ?>


<?php get_footer(); ?>