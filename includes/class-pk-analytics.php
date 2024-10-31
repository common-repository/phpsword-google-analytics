<?php

// Restrict direct access to the file
if(!defined('ABSPATH')){ exit; }

// Start: Pk Google Analytics class
class Pk_Google_Analytics {

// Attribute to hold option values
public $pk_analytics_options;

// Constructor method
public function __construct() {
  $this->pk_analytics_options = get_option('phpsw_analytics_options');
  if(is_admin()){
	// Register settings & fields
	add_action('admin_init', array($this, 'register_settings_and_fields'));
  }
  add_action('wp_footer', array($this, 'display_pk_analytics'));
}

// Method to register form settings & fields
public function register_settings_and_fields() {
  register_setting('phpsw_analytics_options', 'phpsw_analytics_options');
  add_settings_section('phpsw_main_section', 'Pk Google Analytics', array($this, 'phpsw_main_section_cb'), 'phpsw_analytics');
  add_settings_field('phpsw_analytics_code', 'Analytics Code: ', array($this, 'phpsw_analytics_code_field'), 'phpsw_analytics', 'phpsw_main_section');
  add_settings_field('phpsw_analytics_option', 'Enable/Disable Analytics Code: ', array($this, 'phpsw_analytics_option_field'), 'phpsw_analytics', 'phpsw_main_section');
}

// Method main section
public function phpsw_main_section_cb(){
}

// Method to display Analytics code text-area
public function phpsw_analytics_code_field(){
  echo '<label for="phpsw_analytics_options[analytics_code]">Insert your google analytics code in the given box.</label>';
  echo "<textarea name=\"phpsw_analytics_options[analytics_code]\" class=\"large-text code\" rows=\"10\" clos=\"10\">";
  if(!empty($this->pk_analytics_options) && $this->pk_analytics_options['analytics_code']!=''){
	echo $this->pk_analytics_options['analytics_code'];
  }  
  echo "</textarea>";
}

// Method to display Enable/Disable options
public function phpsw_analytics_option_field() {
  echo "<select name=\"phpsw_analytics_options[phpsw_analytics_option]\">";
  echo "<option value=\"Enabled\"";
  if(!empty($this->pk_analytics_options) && $this->pk_analytics_options['phpsw_analytics_option']==='Enabled'){
	echo ' selected=\"selected\" ';
  }
  echo ">Enable</option>";
  echo "<option value=\"Disabled\"";
  if(!empty($this->pk_analytics_options) && $this->pk_analytics_options['phpsw_analytics_option']==='Disabled'){
	echo ' selected=\"selected\" ';
  }
  echo ">Disable</option>";
  echo "</select>";
}

// Method to Output Analytics code in the footer
public function display_pk_analytics(){
  $phpsw_analytics_opt = get_option('phpsw_analytics_options');
  // If option is enabled from settings, only then add analytics code in the footer
  if(!empty($phpsw_analytics_opt) && $phpsw_analytics_opt['phpsw_analytics_option']==='Enabled'){
	echo $phpsw_analytics_opt['analytics_code'];
  }
}

}
// End: Pk Google Analytics class

// Initialize the class
$phpsw_analytics = new Pk_Google_Analytics();
	
?>