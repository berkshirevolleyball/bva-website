<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override namespaced_setup() in a child theme, add your own namespaced_setup to your child theme's
 * functions.php file.
*
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since NameSpaced 1.0
 */

if (!function_exists('theme_setup')) {

	function theme_setup() {

		/* Make theme available for translation.
		 * Translations can be added to the /languages/ directory.
		 * If you're building a theme based on Namespaced, use a find and replace
		 * to change 'namespaced' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('namespaced', TEMPLATEPATH . '/languages');

		$locale = get_locale();
		$locale_file = TEMPLATEPATH . "/languages/$locale.php";
		if (is_readable($locale_file)) {
			require_once($locale_file);
		}
		
	}
	add_action('after_setup_theme', 'theme_setup');

} else {
	echo "Function Already Exists: Theme Setup";
}

?>