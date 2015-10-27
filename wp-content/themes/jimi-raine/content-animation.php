<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */
?>

<div class="animation">
	<h4>Click to see how it works</h4>

	<div id="animation" class="animation">
		<img id="overview" class="overview" src="<?php echo get_stylesheet_directory_uri(); ?>/images/animation/graphic.png" />
		<div class="tube">
			<img class="tubes" src="<?php echo get_stylesheet_directory_uri(); ?>/images/animation/tube.png" width="100" />
			<img id="lid" class="lid" src="<?php echo get_stylesheet_directory_uri(); ?>/images/animation/lid.png" width="100" />
		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function () {

		$('#lid').click(function () {
			$('#animation').toggleClass('open');
		});

	});

</script>