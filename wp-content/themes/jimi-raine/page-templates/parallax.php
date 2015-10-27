<?php
/**
 * emplate Name: parallax
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */

get_header();

?>

<div class="main template-parallax" role="main">
	<div id="content-blocks">

		<?php get_content_blocks(); ?>

	</div>
</div>

<?php get_footer(); ?>

<script>

	/*var touch = Modernizr.touch;*/
	var is_touch_device = is_touch_device();

	function is_touch_device() {
		return 'ontouchstart' in window // works on most browsers 
			|| 'onmsgesturechange' in window; // works on ie10
	};


	if ($('.img-holder-title') !== undefined) {
		$('.img-holder-title').imageScroll({
        	holderMinHeight: $(window).height() - 88,
		    touch: is_touch_device
    	});
	};


	if ($('.img-holder') !== undefined) {
		$('.img-holder').imageScroll({
        	holderMinHeight: 400,

	//            image: null,
	//            imageAttribute: 'image',
	//            container: $('body'),
	//            speed: 0.2,
	//            coverRatio: 0.75,
	//            holderMinHeight: 1000,
	//            extraHeight: 0,
	//            mediaWidth: 1600,
	//            mediaHeight: 900,
	//            parallax: true,
	            touch: is_touch_device
		});
	};

	$(function() {

		var rtime = new Date(1, 1, 2000, 12,00,00),
			timeout = false,
			delta = 200;

		function verticallyCenterImages () {

		    $('.image').each(function() {

			    $(this).children(".table").css('min-height', $(this).siblings(".col").innerHeight());

		    });
		}

		function resetVerticalHeights() {

			$('.image').each(function() {

			    $(this).children(".table").css('min-height', null);

		    });

		}

		function resizeend() {
			if ($(window).width() > 767) {
			    if (new Date() - rtime < delta) {
			        setTimeout(resizeend, delta);
			    } else {
			        timeout = false;
			        verticallyCenterImages();
			    }
			} else {
				resetVerticalHeights();
			}         
		}


		// Bind function on Resize End
		$(window).resize(function() {
		    rtime = new Date();
		    if (timeout === false) {
		        timeout = true;
		        setTimeout(resizeend, delta);
		    }
		});

		// Init function on page load
		verticallyCenterImages();

	});

</script>
