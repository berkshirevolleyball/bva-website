<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Paycircle
 * @since Paycircle 1.0
 */
?>

<!-- Banner -->
<div class="banner align-center">
	<p>Keep up to date with all the latest news</p>

	<!-- Newsletter Signup -->
	<form action="http://berkshirevolleyballclub.createsend.com/t/i/s/jilhil/" method="post" id="subForm">
		<div class="row no-margin">
			<div class="col three">&nbsp;</div>
			<div class="col two">
				<input id="fieldName" name="cm-name" type="text" placeholder="Your name" />
			</div>
			<div class="col two">
				<input id="fieldEmail" name="cm-jilhil-jilhil" type="email" placeholder="Your email" required />
			</div>
			<div class="col two">
				<button type="submit" class="block">Subscribe</button>
			</div>
			<div class="col three">&nbsp;</div>
		</div>
	</form>

</div>	

<!-- Footer -->
<footer>
	<div class="row no-margin">
		<div class="col six">
			<nav>

				<?php

				$menuParameters = array(
					'container'       => false,
					'depth'           => 0,
					'echo'            => false,
					'items_wrap'      => '%3$s',
					'theme_location'	=> 'footer-nav'
				);

				echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );

				?>

			</nav>
		</div>
		<div class="col six">
			<!-- Social -->
			<ul class="social">
				<li>
					<a href=""><i class="fa fa-spotify"></i></a>
				</li>
				<li>
					<a href=""><i class="fa fa-facebook"></i></a>
				</li>
				<li>
					<a href=""><i class="fa fa-twitter"></i></a>
				</li>
				<li>
					<a href=""><i class="fa fa-soundcloud"></i></a>
				</li>
				<li>
					<a href=""><i class="fa fa-youtube"></i></a>
				</li>
			</ul>
			
			<span class="copyright"><?php the_field('copyright', 'option'); ?></span>
		</div>
	</div>
</footer>


    <!-- Google Analytics -->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-49548057-2', 'jimi-raine.com');
	  ga('send', 'pageview');

	</script>

	<?php wp_footer(); ?>

</body>
</html>