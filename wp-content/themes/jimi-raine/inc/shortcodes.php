<?php

function phone($atts, $content = null) {
	$phoneNo = get_field('phone_number', 'options');
	return '<a href="callto:' . $phoneNo . '">' . $phoneNo . '</a>';
}

add_shortcode('phone', 'phone');


?>
