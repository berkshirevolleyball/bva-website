<?php

$libPath = TEMPLATEPATH . '/inc/lib/images/';

/* Images */
include $libPath . 'config_image_sizes.php';	// Configure sitewide image sizes
include $libPath . 'get_image_class.php';		// Gets image class based on it's number
include $libPath . 'get_image_size_count.php';	// Get image size count
include $libPath . 'get_image_url.php';			// Gets image url (imgObj, size)
include $libPath . 'post_image.php';			// Get's post image

?>