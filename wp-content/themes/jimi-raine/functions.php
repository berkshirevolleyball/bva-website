<?php
/**
 * Template functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, template_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We arLeave a Replye providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'template_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */

/* Directory Paths */
$incPath = TEMPLATEPATH . '/inc/';
$libPath = $incPath . 'lib/';


/* Includes */
//include TEMPLATEPATH . '/inc/config.php';		// WordPress setup - E.g. 
//include TEMPLATEPATH . '/inc/plugins.php';		// Theme plugin recommendations & activation
//include TEMPLATEPATH . '/inc/styles.php';		// Stylesheets management
//include TEMPLATEPATH . '/inc/scripts.php';		// JavaScript management
include TEMPLATEPATH . '/inc/utilities.php';	// Utility functions
include TEMPLATEPATH . '/inc/shortcodes.php';	// WordPress shortcodes
include TEMPLATEPATH . '/inc/search.php';		// Search function
include TEMPLATEPATH . '/inc/lib/images/get_image_url.php';		// Search function


/* Filter Management */
//remove_filter('the_content', 'wpautop');


/* Theme Support */
add_theme_support('automatic-feed-links'); // Add default posts and comments RSS feed links to <head>.
add_theme_support('post-formats', array('aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery')); // Enable support for Post Formats - See http://codex.wordpress.org/Post_Formats
add_theme_support('menus'); // Add menu support for navigation menus


/* Menu's */
register_nav_menu('header-nav', __('Navigation', 'template'));
register_nav_menu('footer-nav', __('Footer Navigation', 'template'));



/* Images */
include $libPath . 'config_image_sizes.php';	// Configure sitewide image sizes
//include $libPath . 'get_image_class.php';		// Gets image class based on it's number
//include $libPath . 'post_image.php';			// Get's post image
//include $libPath . 'get_image_size_count.php';// Get image size count
//include $libPath . 'the_slider.php';			// Get image slider galler
//include $libPath . 'the_gallery.php';			// Get image slider galler
include $libPath . 'image_gallery.php';			// Get image slider galler
include $libPath . 'get_image.php';				// Get image slider galler
include $libPath . 'get_image_src.php';			// Get image slider galler


/* Posts */
//include $libPath . 'change_menu_labels.php';	// Updates menu labels across WP Admin
include $libPath . 'create_post_types.php';		// Creates post types to be used in WP Admin


/* Utilities */
//include $libPath . 'nav_next_previous.php';			// Next/Previous Navigation
//include $libPath . 'menu_add_parent_class.php';		// Adds parent class to menu
//include $libPath . 'the_pricing_table.php';			// Displays a pricing table if it has content
include $libPath . 'get_home_block.php';				// Gets the home image, title etc
include $libPath . 'get_content_blocks.php';			// Generates content blocks for the Parallax page template
include $libPath . 'the_faqs.php';						// Generates the FAQs
include $libPath . 'get_form_block.php';				// Generates a form


// Filter Yoast Meta Priority
add_filter( 'wpseo_metabox_prio', function() { return 'low';});

//Page Slug Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

?>