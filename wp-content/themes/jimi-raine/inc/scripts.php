<?php
/*
 * Load JavaScript files both globally and page specific
 */
if (!function_exists('load_js_files') && !is_admin()) {

	function load_js_files() {
		$my_theme = wp_get_theme();						// Get current theme
		$theme_version = $my_theme->get('Version');		// Get theme version

		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2');
		wp_enqueue_script('jquery');
		
		if (is_singular() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}

		if (is_category()) {
			wp_register_script('namespaced_category', get_template_directory_uri() . '/js/category.js', array('jquery'), $theme_version, true);
			wp_enqueue_script('namespaced_category');
		}

		if (is_page_template('page-templates/parallax.php') || is_page_template('page-templates/form.php') || is_front_page()) {
			wp_register_script('modernizr', get_template_directory_uri() . '/js/plugins/modernizr.js', $theme_version);
			wp_register_script('parallax', get_template_directory_uri() . '/js/plugins/jquery.parallax.js', array('jquery'), $theme_version, true);
			wp_register_script('form', get_template_directory_uri() . '/js/plugins/form.js', array('jquery'), $theme_version, true);
			wp_enqueue_script('modernizr');
			wp_enqueue_script('parallax');
			wp_enqueue_script('form');
		}

		if (is_page_template('page-templates/video.php')) {
			wp_register_script('video', '//vjs.zencdn.net/4.5/video.js', $theme_version, true);
			wp_enqueue_script('video');
		}
		
		/* Global JavaScript */
		//wp_register_script('fitvids_js', get_template_directory_uri() . '/js/plugins/fitvids.js', array('jquery'), $theme_version, true);
		wp_register_script('smoothscroll_js', get_template_directory_uri() . '/js/plugins/smoothScroll.js', array('jquery'), $theme_version, true);
		wp_register_script('retina_js', get_template_directory_uri() . '/js/plugins/retina.min.js', array('jquery'), $theme_version, true);
		wp_register_script('global_js', get_template_directory_uri() . '/js/global.js', array('jquery'), $theme_version, true);

		//wp_enqueue_script('fitvids_js');
		wp_enqueue_script('smoothscroll_js');
		wp_enqueue_script('retina_js');
		wp_enqueue_script('global_js');

	}
	add_action('wp_enqueue_scripts', 'load_js_files');
	
}

?>