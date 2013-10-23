<?php
/**
 * Site title
 * Displays the gravatar, site title and description
 * Hooked into highwind_header()
 * @since 1.0
 */
function highwind_site_title() {
	?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="site-intro">
			<h1 class="site-title"><img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/bva-logo.png" alt="<?php bloginfo('name'); ?>" width="200" /></h1>
			<h2 class="site-description"><?php esc_attr( bloginfo( 'description' ) ); ?></h2>
		</a>
	<?php
}

/**
 * Sidebar
 * Displays the sidebar
 * Hooked into highwind_content_after()
 * @since 1.0
 */
function highwind_sidebar() {
	if ( ! is_page_template( 'templates/template-fullwidth.php' ) && ! is_page_template( 'templates/template-fullwidth-no-comments.php' ) ) {
		if ( is_page() ) {
			get_sidebar( 'page' );
		} else if ( is_single() ) {
			get_sidebar( 'post' );
		} else {
			get_sidebar();
		}
	}
}


/* Create custom post types */
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'team',
		array(
			'has_archive' => true,
			'labels' => array(
				'name' => __( 'Teams' ),
				'singular_name' => __( 'Team' )
			),
			'menu_position' => 5,
			'public' => true,
			'supports' => array('title', 'editor', 'thumbnail', 'revisions')
			//'taxonomies' => array('category'),
		)
	);
}

function scripts() {
	if (is_page('submit-scoresheet')) {
		wp_register_script('scoresheet', (get_stylesheet_directory_uri() . '/js/scoresheet.js'), false);
		wp_enqueue_script('scoresheet');
	}
}
add_action('wp_print_scripts', 'scripts');

?>
