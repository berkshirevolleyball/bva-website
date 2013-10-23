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
define('ODY_GOOGLE_GROUPS_URL', plugins_url()."/odynogooglegroups");
define('ODY_GOOGLE_GROUPS_FILE', ABSPATH . PLUGINDIR . '/odynogooglegroups/odynogooglegroups.php');
define('ODY_GOOGLE_GROUPS_NOS', '____NULL___');

define('ODY_GG_SHOW_SIGNE', 'ody_gg_show_signe');
define('ODY_GG_ENABLED_ANALITYC', 'ody_gg_enabled_analityc');


register_activation_hook(ODY_GOOGLE_GROUPS_FILE, 'odyno_google_groups_install');
register_deactivation_hook(ODY_GOOGLE_GROUPS_FILE, 'odyno_google_groups_unintall');



function odyno_google_groups_install( ) {
    update_option(ODY_GG_SHOW_SIGNE, true);
    update_option(ODY_GG_ENABLED_ANALITYC, true);
}



function odyno_google_groups_unintall( ) {
    delete_option(ODY_GG_SHOW_SIGNE);
    delete_option(ODY_GOOGLE_GROUPS_ANALYTICS);
}




?>
