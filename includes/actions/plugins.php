<?php
// -------------------------------------------- //
// PLUGIN PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_plugin_links", 1, 1);
function qs_default_plugin_links($actions) {

  $actions["plugins_all"] = [
    "label" => __("All plugins", "quicksearch"),
    "icon" => "dashicons-screenoptions",
    "tags" => qs_tags("archive", "plugins"),
    "type" => "url",
    "url" => admin_url() . "plugins.php",
  ];

  $actions["plugins_new"] = [
    "label" => __("Upload plugin", "quicksearch"),
    "icon" => "dashicons-plus",
    "tags" => qs_tags("upload", "create", "plugins"),
    "type" => "url",
    "url" => admin_url() . "plugin-install.php",
  ];

  return $actions;
};
