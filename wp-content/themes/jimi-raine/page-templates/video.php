<?php
/**
 * emplate Name: video
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */

get_header();

$dir = get_stylesheet_directory_uri();

$autoplay = get_field("autoplay") ? 'autoplay' : '';
$holding_image = get_field("holding_image");
$holding_image_src = get_image_src($holding_image, "video-image");
$video_width = get_field("video_width");
$video_height = get_field("video_height");
$mp4_video = get_field("mp4_video");
$webm_video = get_field("webm_video");
$ogg_video = get_field("ogg_video");
$video_cta = get_field("video_cta");
$video_cta_url = get_field("video_cta_url");
$cta_content = get_field("cta_content");


?>

<div class="main template-video fadeIn" role="main">
	<section>
		<?php if ($mp4_video || $webm_video || $ogg_video) { ?>
			<div class="video-cont">
				<video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered"
					controls
					<?= $autoplay; ?>
					preload="auto"
					width="<?= $video_width; ?>"
					height="<?= $video_height; ?>"
					poster="<?= $holding_image_src; ?>"
					data-setup='{"example_option":true}'>

					<source src="<?= $mp4_video["url"]; ?>" type='video/mp4' />
					<source src="<?= $webm_video["url"]; ?>" type='video/webm' />
					<source src="<?= $ogg_video["url"]; ?>" type='video/ogg' />
				</video>
			</div>
		<?php } else { ?>
			<p><br /></p>
			<p><br /></p>
			<p><br /></p>
			<h1>Whoops, no video specified!</h1>
			<p>Go and <?php edit_post_link( __( 'upload a video for this page', 'template' ), '', '' ); ?> for everyone to enjoy!</p>
		<?php } ?>

		<?php if ($cta_content && $video_cta && $video_cta_url) { ?>
			<div class="row action-bar">
				<div class="col eight">
					<?= $cta_content ?>
				</div>
				<div class="col four">
					<a href="<?= $video_cta_url; ?>" class="button large"><?= $video_cta; ?></a>
				</div>
			</div>
		<?php } ?>

	</section>
</div>

<div class="">

</div>

<?php get_footer(); ?>