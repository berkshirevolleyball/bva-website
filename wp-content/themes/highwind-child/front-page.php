<?php
/**
 * The page template.
 * @package highwind
 * @since 1.0
 *
 * Template name: Full Width No Comments
 */

$images = get_field('home_gallery', 'options');

$target = mktime(0, 0, 0, 10, 10, 2013);
$today = time();
$difference = ($target-$today);
$days = (int)($difference/86400);

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header();
?>

<?php highwind_content_before(); ?>

<section class="content" role="main">

	<?php highwind_content_top(); ?>

	<span class="countdown">Welcome to the Berkshire Volleyball Association</span>

	<span class="cta"><a class="button" href="<?php echo get_category_link( 7 ); ?> ">See Latest News</a>&nbsp;&nbsp;<a class="button" href="<?php echo site_url(); ?>/submit-scoresheet/">Submit a Scoresheet</a></span>

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<section class="article-content">

				<?php the_content(); ?>

			</section><!-- /.article-content -->

			<?php highwind_entry_bottom(); ?>

		</article><!-- #post-<?php the_ID(); ?> -->

	<?php endwhile; // end of the loop. ?>

	<?php //highwind_content_bottom(); ?>

</section><!-- /.content -->

<?php highwind_content_after(); ?>

<?php get_footer(); ?>