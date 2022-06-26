<?php

// -------------------------------------------- //
// SETTING PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_setting_pages", 1, 1);
function qs_default_setting_pages($actions) {
  $actions["settings_general"] = [
    "label" => __("General settings", "quicksearch"),
    "icon" => "dashicons-admin-generic",
    "tags" => qs_tags("general", "settings"),
    "type" => "url",
    "url" => admin_url() . "options-general.php",
  ];
  $actions["settings_write"] = [
    "label" => __("Write settings", "quicksearch"),
    "icon" => "dashicons-admin-generic",
    "tags" => qs_tags('writing', "settings"),
    "type" => "url",
    "url" => admin_url() . "options-writing.php",
  ];
  $actions["settings_read"] = [
    "label" => __("Read settings", "quicksearch"),
    "icon" => "dashicons-admin-generic",
    "tags" => qs_tags("reading", "settings"),
    "type" => "url",
    "url" => admin_url() . "options-writing.php",
  ];
  $actions["settings_discussion"] = [
    "label" => __("Discussion settings", "quicksearch"),
    "icon" => "dashicons-admin-generic",
    "tags" => qs_tags("discussion", "settings"),
    "type" => "url",
    "url" => admin_url() . "options-discussion.php",
  ];
  $actions["settings_media"] = [
    "label" => __("Media settings", "quicksearch"),
    "icon" => "dashicons-admin-generic",
    "tags" => qs_tags('media', "settings"),
    "type" => "url",
    "url" => admin_url() . "options-media.php",
  ];
  $actions["settings_permalinks"] = [
    "label" => __("Permalinks settings", "quicksearch"),
    "icon" => "dashicons-admin-generic",
    "tags" => qs_tags("permalinks", "settings"),
    "type" => "url",
    "url" => admin_url() . "options-permalink.php",
  ];
  $actions["settings_privacy"] = [
    "label" => __("Privacy settings", "quicksearch"),
    "icon" => "dashicons-admin-generic",
    "tags" => qs_tags("privacy", "settings"),
    "type" => "url",
    "url" => admin_url() . "options-privacy.php",
  ];

  return $actions;
};
