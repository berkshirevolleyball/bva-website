<?php

// Allows filtering on the Explore page
function SearchFilter($query) {
	$NewsCatId = '-' . get_cat_ID("News");
	if (isset($_GET['filter'])) {
		$filter = str_replace(" ", "+", $_GET['filter']);
		$filterCatList = $NewsCatId . ',' . str_replace("+", ",", $filter);
	}

    if ($query->is_search) {
    	if (isset($_GET['filter'])) {
			$query->set('cat', $filterCatList);
		}
        $query->set('posts_per_page', 12);
    }
    return $query;
}
add_filter('pre_get_posts', 'SearchFilter');


// Change the search url to explore
/*
function change_search_url_rewrite() {
    if (is_search() && !empty($_GET['s'])) {
        wp_redirect(home_url("/search/") . urlencode(get_query_var('s')));
    } else if (is_search()) {
        wp_redirect(home_url("/search/"));
    } 
}
add_action('template_redirect', 'change_search_url_rewrite');
*/


// Allow a blank search to redirect to the search template
function make_blank_search ($query) {
	global $wp_query;
	if (isset($_GET['s']) && $_GET['s'] == '') {
		//if search parameter is blank, do not return false
		//$wp_query->set('s','');
		$wp_query->is_search=true;
		$wp_query->is_home=false;
	}
	return $query;
}
add_action('pre_get_posts','make_blank_search');


?>