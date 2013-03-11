<?php
/*
Plugin Name: Wordpress Session Enabler
Plugin URI: http://www.yourwordpresscoder.com
Description: This small plugin help you to enable for use PHP Sessions in Wordpress
Version: 1.0.0
Author: Yor Wordpress Coder
Author URI: http://www.yourwordpresscoder.com 
*/

add_action( 'init','wpcoder_session_enable',1);
if (!function_exists('wpcoder_session_enable')) {
	function wpcoder_session_enable(){
	 	if(!session_id()){
	    	session_start();
    	}
    }
}