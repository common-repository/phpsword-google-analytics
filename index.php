<?php

/**
* Plugin Name: Pk Google Analytics
* Plugin URI: https://pkplugins.com/wordpress/pk-google-analytics-wordpress-plugin/
* Description: Insert Google Analytics code to your WordPress website. No need to connect your account, no verification or no complex setting. Just install and activate the WordPress plugin to add the Google Analytics code to your site. You can also completely enable or disable analytic code from your website.
* Version: 3.0
* Requires at least: 5.6
* Requires PHP: 7.0
* Author: Pradnyankur Nikam
* Author URI: https://pkplugins.com/
* Text Domain: phpsword-google-analytics
* Domain Path: /languages
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
**/

// Restrict direct access to the file
if(!defined('ABSPATH')){ exit; }

// Include class file	
require_once plugin_dir_path(__FILE__).'includes/class-pk-analytics.php';

// If admin area
if(is_admin()){
// Include admin menu	
require_once plugin_dir_path(__FILE__).'admin/admin-menu.php';
}

?>