<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<div class="row">
		<div class="6u">
			<input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		</div>
		<div class="6u">
			<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
		</div>
	</div>
</form>