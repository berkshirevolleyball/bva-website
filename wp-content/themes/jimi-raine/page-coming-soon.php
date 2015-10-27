<?php
/**
 * The template for displaying the support page
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

?>

				
	<section id="main" class="container">

		<header>
			<h2><?php the_title(); ?></h2>
			<p><?php the_field("sub_title"); ?></p>
		</header>

		<section class="box special features">
			<div class="features-row">
				<section>
					<span class="icon major fa-gbp accent2"></span>
					<h3>Savings</h3>
					<p>More money in your pocket for no additional work. Sound ok?<br />With Paycircle you'll enjoy some top-ups in your pay.</p>
				</section>
				<section>
					<span class="icon major fa-thumbs-o-up accent3"></span>
					<h3>Receipt automation</h3>
					<p>How nice would it be to not have the admin of managing your travel receipts. We've got it coming.</p>
				</section>
			</div>
			<div class="features-row">
				<section>
					<span class="icon major fa-smile-o accent4"></span>
					<h3>All your details in one place</h3>
					<p>Change of address? New account details? How about a single place for you to manage your details across all your agencies.</p>
				</section>
				<section>
					<span class="icon major fa-heart accent5"></span>
					<h3>Helping charities</h3>
					<p>We like helping people. So our charity Giving Back will be at the forefront of our application.</p>
				</section>
			</div>
		</section>

	</section>



<?php

get_footer();
