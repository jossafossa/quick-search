<?php

/**
 * @package QuickSearch
 */
/*
Plugin Name: QuickSearch
Plugin URI: https://jossafossa.nl/
Description: QuickSearch
Text Domain: QuickSearch
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

