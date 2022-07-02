<?php

/**
 * @package QuickSearch
 */
/*
Plugin Name: QuickSearch
Plugin URI: https://jossafossa.nl/
Description: QuickSearch
Text Domain: QuickSearch
Version: 1.0
*/

// CONSTANTS
define("QS_PLUGIN_PATH", plugin_dir_path(__FILE__));
define("QS_PLUGIN_URL", plugin_dir_url(__FILE__));

// Load all
include_once QS_PLUGIN_PATH . "/includes/helpers.php";
include_once QS_PLUGIN_PATH . "/includes/admin.php";
include_once QS_PLUGIN_PATH . "/includes/filters.php";
include_once QS_PLUGIN_PATH . "/includes/actions/_autoload.php";
include_once QS_PLUGIN_PATH . "/includes/settings.php";


require  QS_PLUGIN_PATH . "/includes/vendor/updater/plugin-update-checker.php";
$MyUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'http://jossafossanl.test/updates?action=get_metadata&slug=wp-quick-search', //Metadata URL.
	__FILE__, //Full path to the main plugin file.
	'wp-search-quick' //Plugin slug. Usually it's the same as the name of the directory.
);