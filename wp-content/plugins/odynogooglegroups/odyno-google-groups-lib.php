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

/**
 * This function return the html code used to embed the Google Groups
 *
 * @param string $name,
 * @param int $id = null,
 * @param string $width = "100%",
 * @param string $height = "800px",
 * @param string $showsearch = "false",
 * @param string $showtabs = "false",
 * @param string $hideforumtitle = "true",
 * @param string $hidesubject = "true",
 * @param string $domain = null
 *
 * @return string The html Code
 *
 */
function do_odyno_google_groups($name, $id = null, $width = "100%", $height = "800px", $showsearch = "false",
                                $showtabs = "false", $hideforumtitle = "true", $hidesubject = "true", $domain = null){

    if ($id == null) {
        $id = uniqid("", true);
    }

    do_action("pre_ogg_show", $name, $id, $width, $height, $showsearch, $showtabs, $hideforumtitle, $hidesubject, $domain);
    echo odyno_google_groups_get_page($name, $id, $width, $height, $showsearch, $showtabs, $hideforumtitle, $hidesubject, $domain);
    do_action("post_ogg_show", $name, $id, $width, $height, $showsearch, $showtabs, $hideforumtitle, $hidesubject, $domain);
}


/**
 * Main Function
 *
 * @param type $param
 * @return string
 */
function odyno_google_groups_get_page($name, $id = null, $width = "100%", $height = "800px", $showsearch = "false",
                                      $showtabs = "false", $hideforumtitle = "true", $hidesubject = "true", $domain = null){

    if ($id == null) {
        $id = uniqid("", true);
    }

    if ($domain == null) {
        $domain = ODY_GOOGLE_GROUPS_NOS;
	}

    $isSigned = get_option(ODY_GG_SHOW_SIGNE, true);
    $isContrib = get_option(ODY_GG_ENABLED_ANALITYC, true);

    if ($name == ODY_GOOGLE_GROUPS_NOS) {
        $out = 'Minimal information of tag: [google_groups name="name-of-group" ]';
    } else {
        $out = odyno_google_groups_page_shortcut_html($isContrib, $isSigned, $id, $width, $height);
        $out .= odyno_google_groups_page_shortcut_js($id, $name, $domain, $showsearch, $showtabs, $hideforumtitle, $hidesubject, $showsearch);
    }

    return $out;
}

/**
 * Html body of shortcut
 *
 * @param type $isSigned
 * @param type $id
 * @param type $width
 * @param type $height
 */
function odyno_google_groups_page_shortcut_html($isContrib, $isSigned, $id, $width, $height)
{

    if ($isSigned) {
        $sign_inline_style = "color: #000; font-family: arial,sans-serif; text-align: right; font-size: 77%;";
    } else {
        $sign_inline_style = "display: none;";
    }

    $contribCode = "";

    if ($isContrib) {
        $contribCode = '<img style=\'display: none;\' src="http://www.staniscia.net/ogg/logo.php?t=gif" alt="logo" onerror="this.parentNode.removeChild(this)" />';
    }

    $out = '
			<div id="' . $id . '_odynoggroups_div" class="odynoggroups_div" >
				<iframe id="' . $id . '_ogg_forum_embed"
			         class="odynoggroups_iframe" 
			         src="javascript:void(0)" 
					 scrolling="no" 
					 frameborder="0"  
					 width="' . $width . '" 
					 height="' . $height . '">
				</iframe>
				<div style=\'' . $sign_inline_style . '\'>powered by <a href="http://www.staniscia.net/OdynoGoogleGroups/">Odyno gGroups</a>' . $contribCode . '</div>
           </div>';

    return $out;
}

function odyno_google_groups_page_shortcut_js(
    $id,
    $name,
    $domain,
    $showsearch,
    $showtabs,
    $hideforumtitle,
    $hidesubject,
    $showsearch)
{

    $out = '<script type="text/javascript">
             document.getElementById("' . $id . '_ogg_forum_embed").src ="https://groups.google.com/forum/embed/?place=forum/' . $name;
    $out .= ($domain == ODY_GOOGLE_GROUPS_NOS) ? '' : '&domain=' . $domain;
    $out .= "&theme=default";
    $out .= "&fragments=true";
    $out .= "&showsearch=" . $showsearch;
    $out .= "&showtabs=" . $showtabs;
    $out .= "&hideforumtitle=" . $hideforumtitle;
    $out .= "&hidesubject=" . $hidesubject;
    $out .= "&parenturl=\"+encodeURIComponent(window.location.href);";
    //NO// $out .= "&contenturl=" . urlencode(get_permalink());
    $out .= "\n</script>";
    return $out;
}


?>