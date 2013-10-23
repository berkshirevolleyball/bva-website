=== Odyno GoogleGroups ===
Contributors: Odyno
Tags: Google, google groups, ggroups, embed, fusion, bridge, rss, widget
Donate link: http://www.staniscia.net/donate
Requires at least: 3.4.2
Tested up to: 3.6.0
Stable tag: 0.0.5
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Yes, OdynoGoogleGroups embed the Google Groups on WordPress!

== Description ==

The [OdynoGoogleGroups](http://www.staniscia.net/odynogooglegroups/) embed the Google Groups on WordPress! You can see all discussion on your article or WordPress page. All you must do is to add a shortcode on your page editor!

 [Demo](http://www.staniscia.net/demo-odyno-googlegroups/)

= features =

* API for the extensions ( new )
* Embed your "custom domain" Google Group on WordPress page/post
* Embed public Google Group forum on WordPress page/post
* Widget with last messages of group.

= It's easy =

* To add gGroups on page/post add this shortcode,just swap “name-of-group” with your group name [google-groups name="my-group-name"]
* To add widgets into sidebar Go to Appearance -> Widgets -> Google Groups Widget

= It's opened to extensions =
You can use it on your plugin or into "Page Template" (see [Page Templates « WordPress Codex ](http://codex.wordpress.org/Page_Templates) ) with the function do_odyno_google_groups(...) or with 4 custom actions!! (see one example on [plugin Home Site](http://www.staniscia.net/projects/odynogooglegroups/) or on plugin admin section)

= How to use it? =

It’s very easy! You can add the group forum on your page in only three steps!

   * Add page
   * Set follow code on post editor [google_groups name="name-of-groups"] just swap “name-of-group” with your group name
   * And now.. that’s all… go to the preview!

= Configure it =

If you want to control the view, you can add these attributes on shortcode

* id: unique id of groups (default is random number)
* name: name of groups (default is random number)
* width: the width of page (default is 100%)
* height: the height of page (default is 800px)
* domain: the name of domain of groups (default none)
* showsearch: whether to show an embedded search box on destination forum pages. (default is false)
* hideforumtitle: if you want to show the forum title and description, false if you don't want to show the title or description (default is true)
* hidesubject:  if you want to hide the subject of the last post in My Forums view, false if you want to leave the subject visible (default is true)
* showtabs: whether to show tabs for changing views (e.g., to the Members view), on destination forum pages (default is false)

= For designers =
If you want customize the style of view, you can add css and use the hook!!

= For developer =

You can use the Odyno Google Groups on your plugin! Otherwise you can use it on your current theme. In according to Codex, you can modify the current theme with "Child Themes « WordPress Codex",
with a new "Page Templates « WordPress Codex" or simply modify directly the php file of theme. In any of this case you can add a invocation of function *do_odyno_google_groups()* and you will have same action of shortcode.
Also the parameters of function are the same of shortcode.
Otherwise on your plugin or on your function.php you can add one hook to one of 4 action and you can run your custom code.
The allowed action are show below and all action have the same parameter of do_odyno_google_groups() function:

* pre_ogg_show action. It's called before do_odyno_google_groups() function
* post_ogg_show action. It's called after do_odyno_google_groups() function
* pre_ogg_shortcode action. It's called before invocation of all shortcode [google_groups]
* post_ogg_shortcode action. It's called after invocation of all shortcode [google_groups]



== Installation ==
Odyno Google Groups can be installed using integrated WordPress plugin installer or manually.

= Integrated WordPress plugin installer method =

* Go to Plugins > Add New.
* Under Search, type in ’Odyno Google Group’.
* Click Install Now to install the WordPress Plugin.
* A popup window will ask you to confirm your wish to install the Plugin.
* If this is the first time you've installed a WordPress Plugin, enter the FTP login credential information. If you've installed a Plugin before, it will still have the login information.
* Click Proceed to continue with the installation. The resulting installation screen will list the installation as successful or note any problems during the install.
* If successful, click Activate Plugin to activate it, or Return to Plugin Installer for further actions.

= Manual method =

* Upload ’Odyno Google Group’ folder from odynogooglegroup.zip file downloaded from Odyno Google Group WordPress plugin directory page to the ’/wp-content/plugins/’ directory.
* Activate ’Odyno Google Group’ plugin through the ’Plugins’ menu in WordPress.

You are ready! For example I have embed the mixare-developement comunity on my test site adn you can see the effect on screenshots section.




== Screenshots ==

1. Screenshot Shortcode on page editor [thanks to mixare.org](http://www.mixare.org)
2. Screenshot Shortcode in action [thanks to mixare.org](http://www.mixare.org)
3. Screenshot Configuration of widget [thanks to mixare.org](http://www.mixare.org)
4. Screenshot Widget in action [thanks to mixare.org](http://www.mixare.org)


== Credits ==


Copyright 2012  Alessandro Staniscia  (email : alessandro@staniscia.net)

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


== Changelog ==

= ToDo =
* I18n

= 0.0.5 =
* Add public function do_odyno_google_groups()
* Add pre_ogg_show action. It's called before do_odyno_google_groups() function
* Add post_ogg_show action. It's called after do_odyno_google_groups()  function
* Add pre_ogg_shortcode action. It's called before invocation of all shortcode [google_groups]
* Add post_ogg_shortcode action. It's called after invocation of all shortcode [google_groups]


= 0.0.4 =
* Update google properties
* Fix X-Frame-Options errors (Issue#1)

= 0.0.3 =
* Add setting link on plugin page
* Add private groups supports
* Refresh code with new decupling
* Add multi groups on single page
* Add plugin sign
* Add plugin analytics

= 0.0.2 =
* Add help page on tools menu

= 0.0.1 =
* baseline to release

 == Upgrade Notice ==
None.
