<?php
/*
Plugin Name: Print this page
Plugin URI: https://store.devilhunter.net/wordpress-plugin/print-this-page/
Description:  This Plugin will automatically match your Theme's style. Go to Appearance > Widgets, and drag 'Plugin' in sidebar or footer or into any widgetized area. Insert into page or post by Page Builder. There is no need to use any short-code or to edit settings. Theme must be non-block Theme. 
Version: 2.0
Author: Tawhidur Rahman Dear
Author URI: https://www.tawhidurrahmandear.com/
Text Domain: tawhidurrahmandeareight
License: GPLv2 or later 
 
 */
 
 // Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}
// 

class tawhidurrahmandeareightWidget extends WP_Widget {
  function tawhidurrahmandeareightWidget() {
    $widget_ops = array('classname' => 'tawhidurrahmandeareightWidget', 'description' => 'Drag the Plugin in sidebar or footer. Insert into page or post by Page Builder' );
    $this->WP_Widget('tawhidurrahmandeareightWidget', 'Print this page', $widget_ops);
  }
 
  function form($instance) {
    $instance = wp_parse_args((array) $instance, array( 'title' => '' ));
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title (optional) :<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance) {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
 ?>
<style>
.Print_this_page {
  display: block;
  width: 90%;
  border-radius: 20px;
  padding: 14px 28px;
  text-align: center;
  white-space: normal;
  word-wrap: break-word;
}

.Print_this_page:hover {
  box-shadow: 0 5px 5px 0 rgba(0,0,0,0.2), 0 5px 10px 0 rgba(0,0,0,0.2);
}
</style>



<center>
<script>
<!--
//from Tawhidur Rahman Dear

var message = "Print this page";

function printpage() {
window.print(); 
}

document.write("<form><input type=button class=Print_this_page "
+"value=\""+message+"\" onClick=\"printpage()\"></form>");

//-->
</script>
</center>
<?php
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("tawhidurrahmandeareightWidget");') );?>