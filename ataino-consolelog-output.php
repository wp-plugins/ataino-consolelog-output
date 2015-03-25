<?php
/*
Plugin Name: Ataino Consolelog Output
Plugin URI: https://twitter.com/kyanetamaru
Description: Development support tool. (theme and plugin) Output valiable for your web browsers console.
Version: 1.0
Author: kanetamaru@ishii
Author URI: https://twitter.com/kyanetamaru
License: GPLv2
*/

class ataino_console {

 	private $plugin_value;

	function __construct() {
		add_action('wp_head', array(&$this, 'log'));
	}
 
	function log($args) {
		$this->plugin_value = $args;
			if ( $this->plugin_value ) {
			    if (is_array($this->plugin_value) || is_object($this->plugin_value)) {
			    	$this->plugin_value = print_r($this->plugin_value, true);
			    	$this->plugin_value = json_encode($this->plugin_value);
				}
				
				echo("<script>console.log('wp: " . $this->plugin_value . "')</script>");
			}
	}

}

?>
