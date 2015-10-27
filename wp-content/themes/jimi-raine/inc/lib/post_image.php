<?php

/**
 * Get/Print the an image for a post/page
 *
 * @since Namespaced 1.0
 * @return boolean true if blog has more than 1 category
 *
 */

// Returns a HTML string
if (!function_exists('get_post_image')) {
	function get_post_image($fp, $size, $imageField, $class, $titleBar, $hover, $url) {

		// Set param defaults

		if (isset($fp)) {
			$fp_id = $fp->ID;
			$fp_img = get_field($imageField, $fp_id);
			$fp_img = $fp_img['sizes'];
			$fp_img = $fp_img[$size];
			$permalink = $url != null ? get_field($url, $fp_id) : get_permalink($fp);
			$anchorClass = $hover ? " hover-bar" : "";
			$title = get_the_title($fp);
			$articleInfo = get_field('namespaced_article_info', $fp_id);
			$info = $articleInfo != "" ? $articleInfo : get_field('namespaced_sub_title', $fp_id);
			$html = "";

			$html .= '<div class="span ' . $class . '">';
				$html .= '<a class="article-img' . $anchorClass . '" href="' . $permalink . '">';
					if ($titleBar) {
						$html .= '<span class="title-bar">';
							$html .= '<span class="title">' . $title . '</span>';
							$html .= '<span class="sub-title">' . $info . '</span>';
						$html .= '</span>';
					}
					$html .= '<img src="' . $fp_img . '" alt="' . $title . '" />';
				$html .= '</a>';
			$html .= '</div>';

			return $html;
		}
	}
} else {
	echo "Function Already Exists: get_post_image";
}

// Prints the returned HTML string
if (!function_exists('the_post_image')) {
	function the_post_image($fp, $size, $imageField, $class, $titleBar, $hover, $url) {
		echo get_post_image($fp, $size, $imageField, $class, $titleBar, $hover, $url);
	}
} else {
	echo "Function Already Exists: the_post_image";
}
