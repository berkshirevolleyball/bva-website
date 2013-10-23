<?php
/*  Copyright 2012  Alessandro Staniscia  (email : alessandro@staniscia.net)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

add_shortcode('google_groups', 'odyno_google_groups_page_shortcode');

/**
 * Main Function of shortcode
 * 
 * @param type $param
 * @return string
 */
function odyno_google_groups_page_shortcode($param) {
    
    extract(shortcode_atts(array(
                'id' => uniqid("", true),
                'name' => ODY_GOOGLE_GROUPS_NOS,
                'width' => '100%',
                'height' => '800px',
                'showsearch' => 'false',
                'showtabs' => 'false',
                'hideforumtitle' => 'true',
                'hidesubject' => 'true',
                'domain' => ODY_GOOGLE_GROUPS_NOS
                    ), $param));

    do_action("pre_ogg_shortcode", $name, $id, $width, $height, $showsearch, $showtabs, $hideforumtitle, $hidesubject, $domain);
			
	$out=odyno_google_groups_get_page($name, $id, $width, $height, $showsearch, $showtabs, $hideforumtitle, $hidesubject, $domain);
			
    do_action("post_ogg_shortcode", $name, $id, $width, $height, $showsearch, $showtabs, $hideforumtitle, $hidesubject, $domain);

    return $out;
}

?>