<?php
$plugin_list =  apply_filters('active_plugins', get_option('active_plugins'));
define('QS_ACTIONS_VENDOR_PATH', QS_PLUGIN_PATH . 'includes/actions/vendor');


// qs_log($plugin_list);


foreach($plugin_list as $plugin) {
  $file = explode("/", $plugin)[0];
  $path = QS_ACTIONS_VENDOR_PATH . "/" . $file . ".php";

  if (file_exists($path)) include_once($path);
} 
