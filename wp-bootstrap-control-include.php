<?php
/*
Plugin Name: WP bootstrap control include
Plugin URI: http://infoheap.com/
Description: Include bootstrap js/css for a specific post (using custom field bootstrap-include)
Author: infoheap team
Author URI: http://infoheap.com/
Version: 1.0
*/


function wbci_enqueue_js_css () {
  global $post;
  $post_bootstrap_include_value = get_post_meta($post->ID, 'bootstrap-include', true);
  if (in_array($post_bootstrap_include_value, array('true', 'on', 'yes')) ) {
    wp_register_style( 'bootstrap-css', plugins_url('bootstrap.css', __FILE__) );
    wp_register_style( 'bootstrap-responsive-css', plugins_url('bootstrap-responsive.css', __FILE__) );
    wp_enqueue_style('bootstrap-css');
    wp_enqueue_style('bootstrap-responsive-css');

    wp_register_script('bootstrap-js', plugins_url('bootstrap.js', __FILE__) );
    wp_enqueue_script('bootstrap-js', null, array('jquery'), null, true);
  }
}
add_action('wp_enqueue_scripts', 'wbci_enqueue_js_css', 1001);

?>
