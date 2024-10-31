<?php

// Restrict direct access to the file
if(!defined('ABSPATH')){ exit; }

// Function to display Pk Google Analytics admin settings page
function pk_show_form_page(){
?>
<div class="wrap">
  <h2>Pk Google Analytics</h2>
  <p>Very simple and easy to use WordPress plugin to add Google Analytics codes to your WordPress website.</p>
  <form method="post" action="options.php">
  <?php
  // group name as attribute
  settings_fields('phpsw_analytics_options');
  do_settings_sections('phpsw_analytics');
  ?>
  <p class="submit"><input type="submit" name="submit" class="button-primary" value="Save Changes" /></p>
  </form>
</div>
<?php
}

// Display admin menu function
function pk_add_admin_menu(){
// Adds a main menu on left column.
add_menu_page(
'Pk Google Analytics', 'Pk Analytics',
'manage_options', 'phpsw_analytics', 'pk_show_form_page',
'dashicons-chart-line', null
);
}
// Call function to display admin menu
add_action('admin_menu','pk_add_admin_menu');

?>