<?php
$plugin_list =  apply_filters('active_plugins', get_option('active_plugins'));
define('QS_ACTIONS_VENDOR_PATH', QS_PLUGIN_PATH . 'includes/actions/vendor');


// qs_log($plugin_list);

if (in_array('gravityforms/gravityforms.php', $plugin_list))
  include_once(QS_ACTIONS_VENDOR_PATH . '/gravity_forms.php');


if (in_array('wordpress-seo/wp-seo.php', $plugin_list))
  include_once(QS_ACTIONS_VENDOR_PATH . '/yoast_seo.php');


if (in_array('advanced-custom-fields-pro/acf.php', $plugin_list))
  include_once(QS_ACTIONS_VENDOR_PATH . '/acf.php');


if (in_array('worker/init.php', $plugin_list))
  include_once(QS_ACTIONS_VENDOR_PATH . '/managewp.php');
