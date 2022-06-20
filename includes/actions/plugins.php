<?php 
// -------------------------------------------- //
// PLUGIN PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_plugin_links", 1, 1);
function qs_default_plugin_links($actions) {

  $actions[] = [
    "label" => __("All plugins", "quicksearch"),
    "icon" => "dashicons-screenoptions",
    "tags" => ["all plugins", "archive plugins"],
    "type" => "url",
    "url" => admin_url() . "plugins.php",
  ];

  $actions[] = [
    "label" => __("Upload plugin", "quicksearch"),
    "icon" => "dashicons-plus",
    "tags" => ["upload plugin", "new plugin", "create plugin"],
    "type" => "url",
    "url" => admin_url() . "plugin-install.php",
  ];

  return $actions;
};
