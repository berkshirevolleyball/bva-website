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
define('ODY_GOOGLE_GROUPS_SETTINGS_PAGE', 'OdynoGoogleGroupsPreference');
define('ODY_GG_SETTINGS', 'ody_gg_settings');



/**
 * DEFINE THE PAGE OPTIONS
 */
add_action('admin_menu', 'ody_gg_plugin_admin_menu');

function ody_gg_plugin_admin_menu() {

    // Add new admin menu and save     returned page hook

    $hook_suffix = add_options_page(
            'Odyno gGroups Preference', // page Title
            'Odyno gGroups Options', // menu Link
            'manage_options', //Capability
            ODY_GOOGLE_GROUPS_SETTINGS_PAGE, //ID
            'ody_gg_plugin_load_tools_page' // funzione
    );

    //ADD CSS
    add_action('admin_print_styles-' . $hook_suffix, 'ody_gg_plugin_load_stylesheet');
}

function ody_gg_plugin_load_tools_page() {
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    include(ODY_GOOGLE_GROUPS_DIR . '/admin/odgogrp-html-promote-bar.php');
}

/**
 * ADD STYLESCHEET
 */
add_action('admin_init', 'ody_gg_plugin_css_init');

function ody_gg_plugin_css_init() {
    wp_register_style('odyno-google-group-style', ODY_GOOGLE_GROUPS_URL . "/css/odyno-google-group-style.css");
}

function ody_gg_plugin_load_stylesheet() {
    wp_enqueue_style('odyno-google-group-style');
}


/**
 *  Settings link in plugin management screen
 */
add_filter('plugin_action_links', 'ody_gg_plugin_admin_menu_setting_link', 2, 2);
function ody_gg_plugin_admin_menu_setting_link($actions, $file) {
    if(false !== strpos($file, 'odynogooglegroups')){
        $actions['settings'] = '<a href="options-general.php?page='.ODY_GOOGLE_GROUPS_SETTINGS_PAGE.'">Settings</a>';
    }
    return $actions;
}




/**
 * ADD OPTIONS FIELDS
 */
add_action('admin_init', 'ody_gg_plugin_settings_fields');

function ody_gg_plugin_settings_fields() {

    //Build new Section
    add_settings_section(
        ODY_GG_SETTINGS . "_ADV",                 //String for use in the 'id' attribute of tags.
        "Advertise",                              //Title of the section
        'odygg_advertise_sections_descriptions',  //Function that fills the section with the desired content. The function should echo its output.
        ODY_GOOGLE_GROUPS_SETTINGS_PAGE           //The type of settings page on which to show the section
    );

    add_settings_field(
        ODY_GG_SHOW_SIGNE,                        //String for use in the 'id' attribute of tags.
        'Show a little and invisible sign of this plugin ( Thanks! )',           // Title of the field.
        'odygg_setting_show_signe_html',          //Function that fills the field with the desired inputs as part of the larger form. Name and id of the input should match the $id given to this function. The function should echo its output.
        ODY_GOOGLE_GROUPS_SETTINGS_PAGE,          //The type of settings page on which to show the field
        ODY_GG_SETTINGS . "_ADV"                  //The section of the settings page in which to show the box (default or a section you added with add_settings_section, look at the page in the source to see what the existing ones are.
    );

    add_settings_field(
        ODY_GG_ENABLED_ANALITYC,
        'Enable the tracking of this WordPress installation with anonymous data.',
        'odygg_setting_enable_analitycs_html',
        ODY_GOOGLE_GROUPS_SETTINGS_PAGE,
        ODY_GG_SETTINGS . "_ADV"
    );

    register_setting(ODY_GG_SETTINGS, ODY_GG_SHOW_SIGNE);
    register_setting(ODY_GG_SETTINGS, ODY_GG_ENABLED_ANALITYC);

}

/**
 * Description of option section
 */
function odygg_advertise_sections_descriptions() {
    echo '';
}

/**
 * Function that fills the field with the desired inputs as part of the larger form.
 * Name and id of the input should match the $id given to this function.
 * The function should echo its output.
 */
function odygg_setting_show_signe_html() {
   echo ' <input name="'.ODY_GG_SHOW_SIGNE.'" type="checkbox" value="1"  class="code" ' . checked( 1, get_option(ODY_GG_SHOW_SIGNE), false ) . ' />';
}

function odygg_setting_enable_analitycs_html() {
    echo ' <input name="'.ODY_GG_ENABLED_ANALITYC.'" type="checkbox" value="1"  class="code" ' . checked( 1, get_option(ODY_GG_ENABLED_ANALITYC), false ) . ' />';
}

?>