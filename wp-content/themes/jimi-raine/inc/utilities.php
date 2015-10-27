<?php

$libPath = TEMPLATEPATH . '/inc/lib/';


/**
 * Find out if blog has more than one category.
 *
 * @since Namespaced 1.0
 * @return boolean true if blog has more than 1 category
 *
 */
if (!function_exists('site_has_multiple_categories')) {
	function site_has_multiple_categories() {
		if ( false === ( $category_count = get_transient( 'category_count' ) ) ) {
			// Create an array of all the categories that are attached to posts
			$all_categories = get_categories( array(
				'hide_empty' => 1,
			));

			// Count the number of categories that are attached to the posts
			$category_count = count( $all_categories );

			set_transient( 'category_count', $category_count );
		}

		if ( 1 !== (int) $category_count ) {
			// This blog has more than 1 category so returns true
			return true;
		} else {
			// This blog has only 1 category so returns false
			return false;
		}
	}
}


/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since Paycircle 1.0
 * @return html
 *
 */
if (!function_exists('posted_on')) {
	function posted_on() {
		if ( is_sticky() && is_home() && ! is_paged() ) {
			echo '<span class="featured-post">' . __( 'Sticky', 'namespaced' ) . '</span>';
		}

		// Set up and print post meta information.
		printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
			esc_url( get_permalink() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}
}

/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since Namespaced 1.0
 * @return html
 *
 */
if (!function_exists('posted_on_alt')) {
	function posted_on_alt() {
		printf( __('<a class="date" href="%1$s" title="%2$s" rel="bookmark"><time datetime="%3$s" pubdate><span class="day"><em>%4$s</em>%5$s</span><span class="month">%6$s</span><span class="year">%7$s</span></time></a>'),
			esc_url(get_permalink()),
			esc_attr(get_the_time()),
			esc_attr(get_the_date('c')),
			esc_html(get_the_date('j')),
			esc_html(get_the_date('S')),
			esc_html(get_the_date('F')),
			esc_html(get_the_date('Y')),
			esc_url(get_author_posts_url( get_the_author_meta('ID'))),
			sprintf(esc_attr__('View all posts by %s', 'namespaced'), get_the_author()),
			esc_html(get_the_author())
		);
	}
}


/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Namespaced 1.0
 * @return html
 *
 */
if (!function_exists('paging_nav')) {
	function paging_nav() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => __( '&larr; Previous', 'namespaced' ),
			'next_text' => __( 'Next &rarr;', 'namespaced' ),
		) );

		if ( $links ) :

		?>
		<nav class="navigation paging-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'namespaced' ); ?></h1>
			<div class="pagination loop-pagination">
				<?php echo $links; ?>
			</div>
		</nav>
		<?php
		endif;
	}
}


/**
 * Display navigation to next/previous post when applicable.
 *
 * @since Namespaced 1.0
 * @return void
 *
 */
if (!function_exists('post_nav')) {
	function post_nav() {
		
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		// Don't print empty markup if there's nowhere to navigate.
		if (!$next && !$previous) {
			return;
		}
		?>
		<nav class="navigation post-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'namespaced' ); ?></h1>
			<div class="nav-links">
				<?php
				if (is_attachment()) :
					previous_post_link( '%link', __( '<span class="meta-nav">Published In</span>%title', 'namespaced' ) );
				else :
					previous_post_link( '%link', __( '<span class="meta-nav">Previous Post</span>%title', 'namespaced' ) );
					next_post_link( '%link', __( '<span class="meta-nav">Next Post</span>%title', 'namespaced' ) );
				endif;
				?>
			</div>
		</nav>
		<?php
	}
}


/**
 * Template for News Comments
 *
 * @since Namespaced 1.0
 */
if (!function_exists('comment')) {
	function comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		switch ($comment->comment_type) :
			case 'pingback' :
			case 'trackback' :
				break;
			default :
			?>
				<div class="comment">
					<div id="comment-<?php comment_ID(); ?>" class="span one comment-avatar">
						<?php echo get_avatar($comment, 68); ?>
					</div>
					<div class="span eleven">
						<div class="comment-content">
							<div class="comment-author-meta">
								<?php
									/* translators: 1: comment author, 2: date and time */
									printf(
										__('<span class="author">%1$s</span> %2$s', get_comment_author_link()),
										sprintf(get_comment_author_url() != '' ? '<a href="%1$s" target="_new">%2$s</a>' : '%2$s', get_comment_author_url(), get_comment_author()),
										sprintf('<a class="date" href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
											esc_url(get_comment_link($comment->comment_ID)),
											get_comment_time('c'),
											sprintf(__('%1$s at %2$s', 'namespaced'), get_comment_date(), get_comment_time())
										)				
									);
								?>
								<?php edit_comment_link( __( 'Edit', 'namespaced' )); ?>
								<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'namespaced' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
							</div>

							<?php if ($comment->comment_approved == '0') : ?>
								<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'namespaced' ); ?></em>
							<?php endif; ?>
							<?php comment_text(); ?>
						</div>
					</div>
					<br class="clear" />
				</div>
			<?php
				break;
		endswitch;
	}
}


/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Namespaced 1.0
 * @return html
 *
 */
if (!function_exists('the_attached_image')) {
	function the_attached_image() {
		$post                = get_post();
		/**
		 * Filter the default Namespaced attachment size.
		 *
		 * @since Namespaced 1.0
		 * @param array $dimensions {
		 *     An array of height and width dimensions.
		 *
		 *     @type int $height Height of the image in pixels. Default 810.
		 *     @type int $width  Width of the image in pixels. Default 810.
		 * }
		 */
		$attachment_size     = apply_filters( 'namespaced_attachment_size', array( 810, 810 ) );
		$next_attachment_url = wp_get_attachment_url();

		/*
		 * Grab the IDs of all the image attachments in a gallery so we can get the URL
		 * of the next adjacent image in a gallery, or the first image (if we're
		 * looking at the last image in a gallery), or, in a gallery of one, just the
		 * link to that image file.
		 */
		$attachment_ids = get_posts( array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => -1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID',
		) );

		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = current( $attachment_ids );
					break;
				}
			}

			// get the URL of the next image attachment...
			if ( $next_id ) {
				$next_attachment_url = get_attachment_link( $next_id );
			}

			// or get the URL of the first image attachment.
			else {
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
			}
		}

		printf( '<a href="%1$s" rel="attachment">%2$s</a>',
			esc_url( $next_attachment_url ),
			wp_get_attachment_image( $post->ID, $attachment_size )
		);
	}
}

/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Namespaced 1.0
 * @return html
 *
 */
if (!function_exists('is_guid')) {
	function is_guid($guid) {
		return preg_match('/^\{?[A-Z0-9]{8}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{12}\}?$/', $guid);
	}
}

?>