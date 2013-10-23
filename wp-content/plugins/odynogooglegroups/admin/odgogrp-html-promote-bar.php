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
?>

<div class="wrap">

    <div id="icon-tools" class="icon32"><br> </div> <h2>Information</h2>

    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">

            <div id="postbox-container-1" class="postbox-container">
                <div id="side-sortables" class="meta-box-sortables">
                    <div class="postbox">
                        <div class="handlediv" title="Click to toggle"><br/><br/></div>
                        <h3 class="hndle">
                            <span><?php echo ODY_GOOGLE_GROUPS_NAME; ?> <small style="float: right">v<?php echo ODY_GOOGLE_GROUPS_VERSION; ?></small><br/></span>
                        </h3>
                        <div class="inside">
                            <div style="float: right; margin: -15px 0 10px 0"><a href="http://www.staniscia.net/odynogooglegroups" target="_blank"><img src="<?php echo ODY_GOOGLE_GROUPS_URL; ?>/images/logo.png" border="0" alt="logo" /></a></div>
                            <a class="sm_button sm_autor" href="http://www.staniscia.net/odynogooglegroups" target="_blank"><?php _e('Plugin Homepage', 'ast-ogg-lang') ?></a>
                            <a class="sm_button "  href="http://www.staniscia.net/demo-odyno-googlegroups/" target="_blank"><?php _e('Live demo', 'ast-ogg-lang') ?></a>

                            <a class="sm_button sm_code"  href="https://github.com/Odyno/OdynoGoogleGroups/issues" target="_blank"><?php _e('Suggest a Feature', 'ast-ogg-lang') ?></a>
                            <a class="sm_button sm_bug"   href="https://github.com/Odyno/OdynoGoogleGroups/issues" target="_blank"><?php _e('Report a Bug', 'ast-ogg-lang') ?></a>
                            <a class="sm_button sm_star"  href="http://wordpress.org/extend/plugins/odynogooglegroups/" target="_blank"><?php _e('Rate the plugin on WordPress.org', 'ast-ogg-lang') ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <p>
                You can add the group forum on your page with this shortcode, just swap “name-of-group” with your group name
            </p>
            <code>[google_groups name="name-of-groups"]</code>
            <p>
            and if you have your groups on private domain you can add the attribute "domain" to resolve your custom instance, for example:
            </p>
            <code>[google_groups name="..." domain="staniscia.net"]</code>
            <p>
                If you want to control the view, you can add these attributes on shortcode
            </p>
            <table  >
                <tr><td><b>Options</b></td><td><b>Description</b></td></tr>
                <tr><td><code>id</code></td><td>unique id of groups (default is random number)</td></tr>
                <tr><td><code>name</code></td><td>name of groups (default is random number)</td></tr>
                <tr><td><code>width</code></td><td>the width of page (default is 100%)</td></tr>
                <tr><td><code>height</code></td><td>the height of page (default is 800px)</td></tr>
                <tr><td><code>domain</code></td><td>the name of domain of groups (default none)</td></tr>
                <tr><td><code>showsearch</code></td><td>whether to show an embedded search box on destination forum pages. (default is false)</td></tr>
                <tr><td><code>hideforumtitle</code></td><td>if you want to show the forum title and description, false if you don't want to show the title or description (default is true)</td></tr>
                <tr><td><code>hidesubject</code></td><td> if you want to hide the subject of the last post in My Forums view, false if you want to leave the subject visible (default is true)</td></tr>
                <tr><td><code>showtabs</code></td><td>whether to show tabs for changing views (e.g., to the Members view), on destination forum pages (default is false)</td></tr>
            </table>

            <div class="clear"></div>
        </div>
    </div>

    <?php screen_icon(); ?><h2> Options</h2>
    <h3>For designers...</h3>
    <div >
        <p>If you want customize the style of view, you can add css and use the following hook</p>
        <table class="widefat"    >
            <tr><td><b>The short code</b></td><td>&#9658;</td><td><b>HTML</b></td></tr>
            <tr>
                <td>
                    <code>[google_groups id="my_id" name="my_groups"]</code>
                </td>
                <td>&#9658;</td>
                <td>
                    <code>
                        &lt;div&nbsp;id=&quot;my_id_odynoggroups_div&quot;&nbsp;class=&quot;odynoggroups_div&quot;&gt;
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&lt;iframe&nbsp;id=&quot;my_id_ogg_forum_embed&quot;&nbsp;class=&quot;odynoggroups_iframe&quot;&nbsp;[...]&nbsp;&gt;&lt;/iframe&gt;&nbsp;
                        <br>&lt;/div&gt;
                    </code>
                </td>
            </tr>
        </table>
        <div class="clear"></div>
    </div>

    <h3>For developer...</h3>
    <div>
        <p>You can use the Odyno Google Groups on your plugin! Otherwise you can use it on your current theme.
            In according to Codex, you can modify the current theme with  <a href="http://codex.wordpress.org/Child_Themes" target="new">Child Themes « WordPress Codex</a>,
            with a new <a href="http://codex.wordpress.org/Page_Templates" target="new">Page Templates « WordPress Codex </a> or simply modify directly the php file of theme.
            In any of this case you can add a invocation of function <code>do_odyno_google_groups()</code> and you will have same action of shortcode.
            Also the parameters of function are the same of shortcode and are shown below</p>
            <pre style="border: 1px dotted gray">
            /**
            * This function returns the html code used to embed the Google Groups
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
                        $showtabs = "false", $hideforumtitle = "true", $hidesubject = "true", $domain = null){...};
            </pre>
        <p>Example:</p><pre style="border: 1px dotted gray">
            <?php echo htmlentities('
                        [...]
                        <div class="entry">
                            <?php do_odyno_google_groups("selectivehedgingdiscussion"); ?>
                            <?php the_content(__(\'More...\', \'picolight\')); ?>
                            <?php wp_link_pages(); ?>
                        </div>
                        [...]
                   ');
            ?>
        </pre>

        <p>Otherwise on your plugin or on your <a href="http://codex.wordpress.org/Functions_File_Explained" target="new">function.php</a> you can add one hook to one of 4 action ( see <a href="http://codex.wordpress.org/Glossary#Action" target="new">Actions</a> ) and you can run your custom code.
            The allowed action are show below and all action have the same parameter of do_odyno_google_groups function: </p>
        <ol>
            <li><code>pre_ogg_show</code> action. It's called before do_odyno_google_groups() function</li>
            <li><code>post_ogg_show</code> action. It's called after do_odyno_google_groups()  function</li>
            <li><code>pre_ogg_shortcode</code> action. It's called before invocation of all shortcode [google_groups]</li>
            <li><code>post_ogg_shortcode</code> action. It's called after invocation of all shortcode [google_groups]</li>
        </ol>

        <p>Example:</p><pre style="border: 1px dotted gray">
            [...]
            add_action('pre_ogg_show','printMeFullArgs',10,9);
            add_action('post_ogg_show','printMe',10,2);

            function printMeFullArgs( $name, $id, $width, $height, $showsearch, $showtabs, $hideforumtitle, $hidesubject, $domain){
                echo "Action: pre_ogg_show  Argument: $name, $id, $width, $height, $showsearch, $showtabs, $hideforumtitle, $hidesubject, $domain";
            }

            function printMe( $name, $id){
                echo "Action: post_ogg_show  Argument:  $name, $id";
            }
            [...]
        </pre>

    </div>

    <form method="post" action="options.php">
        <?php
        settings_fields(ODY_GG_SETTINGS);
        do_settings_sections(ODY_GOOGLE_GROUPS_SETTINGS_PAGE);
        submit_button('Save options');
        ?>
    </form>

</div>



