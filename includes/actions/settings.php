<?php

// -------------------------------------------- //
// SETTING PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_setting_pages", 1, 1);
function qs_default_setting_pages($actions) {
  $actions["settings_general"] = [
    "label" => __("General settings", "quicksearch"),
    "icon" => "dashicons-admin-generic",
    "tags" => ["general settings", "settings"],
    "type" => "url",
    "url" => admin_url() . "options-general.php",
  ];
  $actions["settings_write"] = [
    "label" => __("Write settings", "quicksearch"),
    "icon" => "dashicons-admin-generic",
    "tags" => ["write settings", "writing settings", "manage writing", "settings"],
    "type" => "url",
    "url" => admin_url() . "options-writing.php",
  ];
  $actions["settings_read"] = [
    "label" => __("Read settings", "quicksearch"),
    "icon" => "dashicons-admin-generic",
    "tags" => ["read settings", "reading settings", "manage reading", "settings"],
    "type" => "url",
    "url" => admin_url() . "options-writing.php",
  ];
  $actions["settings_discussion"] = [
    "label" => __("Discussion settings", "quicksearch"),
    "icon" => "dashicons-admin-generic",
    "tags" => ["discussion settings", "manage discussion", "settings"],
    "type" => "url",
    "url" => admin_url() . "options-discussion.php",
  ];
  $actions["settings_media"] = [
    "label" => __("Media settings", "quicksearch"),
    "icon" => "dashicons-admin-generic",
    "tags" => ["media settings", "manage media", "settings"],
    "type" => "url",
    "url" => admin_url() . "options-media.php",
  ];
  $actions["settings_permalinks"] = [
    "label" => __("Permalinks settings", "quicksearch"),
    "icon" => "dashicons-admin-generic",
    "tags" => ["permalinks settings", "manage permalinks", "settings"],
    "type" => "url",
    "url" => admin_url() . "options-permalink.php",
  ];
  $actions["settings_privacy"] = [
    "label" => __("Privacy settings", "quicksearch"),
    "icon" => "dashicons-admin-generic",
    "tags" => ["privacy settings", "manage privacy", "settings"],
    "type" => "url",
    "url" => admin_url() . "options-privacy.php",
  ];

  return $actions;
};
