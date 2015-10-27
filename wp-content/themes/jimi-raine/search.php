<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */

get_header(); ?>

	<!-- Main -->
		<section id="main" class="container">
			<header>
				<h2>Search results</h2>
				<p><?php printf( __( 'Search Results for: %s', 'template' ), get_search_query() ); ?></p>
			</header>
			<div class="box">
				<span class="image featured">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/road-ahead-small.jpg" alt="Dead End" />
				</span>

					<div class="row">
						<div class="12u">
							<h3>Search results</h3>
							
							<?php if ( have_posts() ) {

								// Start the Loop.
								while ( have_posts() ) {

									the_post();

									/*
									 * Include the post format-specific template for the content. If you want to
									 * use this in a child theme, then include a file called called content-___.php
									 * (where ___ is the post format) and that will be used instead.
									 */
									get_template_part( 'content', get_post_format() );

								}

								// Previous/next post navigation.
								Templatepaging_nav();

							} else {
							
								// If no content, include the "No posts found" template.
								get_template_part( 'content', 'none' );
							}
						?>


					</div>
				</div>
			</div>
		</section>



<?php
get_footer();
