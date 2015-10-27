<?php


/**
 * Load certain CSS files based on what page is loaded.
 * - Try to keep this to a minimum of 2 css requests per page only.
 */
if (!function_exists('add_my_stylesheet')) {
	function add_my_stylesheet() {

		$my_theme = wp_get_theme();						// Get current theme
		$theme_version = $my_theme->get('Version');		// Get theme version

		// Page Specific Stylesheets
		if (is_front_page()) {
			//wp_register_style('home', get_template_directory_uri() . '/css/page/home.css', null, $theme_version);
			//wp_enqueue_style('home');
		}

		if (is_page()) {
			wp_register_style('page', get_template_directory_uri() . '/css/page.css', null, $theme_version);	
			wp_enqueue_style('page');
		}

		if (is_page('contact-us')) {
			wp_register_style('contact-us', get_template_directory_uri() . '/css/contact-us.css', null, $theme_version);	
			wp_enqueue_style('contact-us');
		}

		if (is_page_template('page-templates/video.php')) {
			wp_register_style('video-js', get_template_directory_uri() . '/css/video-js.css', null, $theme_version);
			wp_enqueue_style('video-js');
		}

		if (is_category()) {
			wp_register_style('category', get_template_directory_uri() . '/css/category.css', null, $theme_version);
			wp_enqueue_style('category');
		}

		if (is_single()) {
			wp_register_style('post', get_template_directory_uri() . '/css/post.css', null, $theme_version);
			wp_enqueue_style('post');
		}

		if (is_search()) {
			wp_register_style('search', get_template_directory_uri() . '/css/search.css', null, $theme_version);
			wp_enqueue_style('search');
		}
	}
}
add_action('wp_enqueue_scripts', 'add_my_stylesheet');

?>