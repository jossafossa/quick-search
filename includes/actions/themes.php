<?php

// -------------------------------------------- //
// THEME PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_theme_links", 1, 1);
function qs_default_theme_links($actions) {

  $actions["theme_upload"] = [
    "label" => __("Upload theme", "quicksearch"),
    "icon" => "dashicons-plus",
    "tags" => ["upload theme", "new theme", "create theme", "themes"],
    "type" => "url",
    "url" => admin_url() . "theme-install.php",
  ];

  $actions["theme_all"] = [
    "label" => __("All themes", "quicksearch"),
    "icon" => "dashicons-admin-appearance",
    "tags" => ["all themes", "archive themes", "change theme", "themes"],
    "type" => "url",
    "url" => admin_url() . "themes.php",
  ];

  $actions["theme_edit"] = [
    "label" => __("Edit theme", "quicksearch"),
    "icon" => "dashicons-admin-appearance",
    "tags" => ["edit theme", "themes"],
    "type" => "url",
    "url" => admin_url() . "theme-editor.php",
  ];

  $actions["theme_customizer"] = [
    "label" => __("Customizer", "quicksearch"),
    "icon" => "dashicons-admin-appearance",
    "tags" => ["customize", "themes"],
    "type" => "url",
    "url" => admin_url() . "customize.php",
  ];

  return $actions;
};
