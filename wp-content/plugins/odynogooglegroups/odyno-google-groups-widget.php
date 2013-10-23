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

add_action('widgets_init', 'odyno_add_wp_google_groups_widget');

function odyno_add_wp_google_groups_widget() {
  register_widget('ODYNO_Google_Groups_Widget');
}

class ODYNO_Google_Groups_Widget extends WP_Widget {

  function ODYNO_Google_Groups_Widget() {
    $widget_ops = array('classname' => 'wpGoogleGroups', 'description' => __('A widget that displays the last google groups message ', 'example'));
    $control_ops = array('width' => 300, 'height' => 350, 'id_base' => 'odyno-google-groups-widget');
    $this->WP_Widget('odyno-google-groups-widget', __('Google Group Widget', 'Google Group Widget'), $widget_ops, $control_ops);
  }

  function widget($args, $instance) {
    extract($args);
    $title = apply_filters('widget_title', $instance['title']);
    $name = $instance['name'];
    $num_field = $instance['num_field'];
    echo $before_widget;
    if ($title)
      echo $before_title . $title . $after_title;

    wp_widget_rss_output(array(
        'url' => 'https://groups.google.com/group/'.$name.'/feed/rss_v2_0_msgs.xml?num=7', //put your feed URL here
        'title' => $title, // Your feed title
        'items' => $num_field, //how many posts to show
        'show_summary' => 1, // 0 = false and 1 = true
        'show_author' => 1,
        'show_date' => 0
    ));
    echo $after_widget;
  }

  //Update the widget

  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    //Strip tags from title and name to remove HTML
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['name'] = strip_tags($new_instance['name']);
    $instance['num_field'] = strip_tags($new_instance['num_field']);
    return $instance;
  }

  function form($instance) {
    //Set up some default widget settings.
    $defaults = array('title' => 'Groups Message', 'name' => '','num_field'=>'3');
    $instance = wp_parse_args((array) $instance, $defaults);
?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'example'); ?></label><br>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>"  />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Google Group Name:', 'example'); ?></label><br>
      <input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" value="<?php echo $instance['name']; ?>"  />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('num_field'); ?>"><?php _e('Number of message:', 'example'); ?></label><br>
      <input class="widefat" id="<?php echo $this->get_field_id('num_field'); ?>" name="<?php echo $this->get_field_name('num_field'); ?>" value="<?php echo $instance['num_field']; ?>"  />
    </p>
<?php
  }
}
?>