<?php
/*
Plugin Name:  Divi Page Builder for all Custom Post Types
Description:  <strong>Divi theme Extension for adding pagebuilder option for custom post type</strong>
Author: Brandon Shutter
Author Email: brandon@brandonshutter.com
Version: 1.1
Author URI: https://brandonshutter.com
*/

/********This function will be called when  plugin is activated**********/

function V_plugin_activate() {

	add_option( 'V_divi_activate', 'Plugin-Slug' );
	
	
}
register_activation_hook( __FILE__, 'V_plugin_activate');

function V_plugin_load() {

    if ( is_admin() && get_option( 'V_divi_activate' ) == 'Plugin-Slug' ) {
        delete_option( 'V_divi_activate' );
    }
		}
	add_action( 'admin_init', 'V_plugin_load' );
		
		/********This function is used to display the pagebuilder option on the CTP's**********/	

		add_filter( 'et_builder_post_types', 'V_divi_admin_display_pagebuilder' );
        function V_divi_admin_display_pagebuilder($V_post_types)
        {
		
		$V_getting_custom_post_types = get_post_types(array(
			'public'   => true,
			'_builtin' => false
		) );
		
		  $new_post_types = array_merge($V_post_types, $V_getting_custom_post_types);
		  return $new_post_types;
		}		
	