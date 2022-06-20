<?php 

// -------------------------------------------- //
// SETTING PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_setting_pages", 1, 1);
function qs_default_setting_pages($actions) {
  $default_actions = [
    [
      "label" => __("General settings", "quicksearch"),
      "icon" => "dashicons-admin-generic",
      "tags" => ["general settings", "settings"],
      "type" => "url",
      "url" => admin_url() . "options-general.php",
    ],
    [
      "label" => __("Write settings", "quicksearch"),
      "icon" => "dashicons-admin-generic",
      "tags" => ["write settings", "writing settings", "manage writing"],
      "type" => "url",
      "url" => admin_url() . "options-writing.php",
    ],
    [
      "label" => __("Read settings", "quicksearch"),
      "icon" => "dashicons-admin-generic",
      "tags" => ["read settings", "reading settings", "manage reading"],
      "type" => "url",
      "url" => admin_url() . "options-writing.php",
    ],
    [
      "label" => __("Discussion settings", "quicksearch"),
      "icon" => "dashicons-admin-generic",
      "tags" => ["discussion settings", "manage discussion"],
      "type" => "url",
      "url" => admin_url() . "options-discussion.php",
    ],
    [
      "label" => __("Media settings", "quicksearch"),
      "icon" => "dashicons-admin-generic",
      "tags" => ["media settings", "manage media"],
      "type" => "url",
      "url" => admin_url() . "options-media.php",
    ],
    [
      "label" => __("Permalinks settings", "quicksearch"),
      "icon" => "dashicons-admin-generic",
      "tags" => ["permalinks settings", "manage permalinks"],
      "type" => "url",
      "url" => admin_url() . "options-permalink.php",
    ],
    [
      "label" => __("Privacy settings", "quicksearch"),
      "icon" => "dashicons-admin-generic",
      "tags" => ["privacy settings", "manage privacy"],
      "type" => "url",
      "url" => admin_url() . "options-privacy.php",
    ]
  ];

  return array_merge($actions, $default_actions);
};
