<?php
/**
 * The template for displaying all pages
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

<section class="body">
	<h1><?php the_field('title'); ?></h1>
	<p class="sub-header"><?php the_field('sub_title'); ?></p>
	<div class="row">
		<div class="col three">&nbsp;</div>
		<div class="col six">
			<article>
				<?php the_content(); ?>
			</arcticle>
		</div>
	</div>
</section>


<!-- Support -->
<?php //get_template_part( 'content', 'support' ); ?>


<?php get_footer(); ?>