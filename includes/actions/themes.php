<?php 

// -------------------------------------------- //
// THEME PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_theme_links", 1, 1);
function qs_default_theme_links($actions) {

  $actions[] = [
    "label" => __("Upload theme", "quicksearch"),
    "icon" => "dashicons-plus",
    "tags" => ["upload theme", "new theme", "create theme"],
    "type" => "url",
    "url" => admin_url() . "theme-install.php",
  ];

  $actions[] = [
    "label" => __("All themes", "quicksearch"),
    "icon" => "dashicons-admin-appearance",
    "tags" => ["all themes", "archive themes", "change theme"],
    "type" => "url",
    "url" => admin_url() . "themes.php",
  ];

  $actions[] = [
    "label" => __("Edit theme", "quicksearch"),
    "icon" => "dashicons-admin-appearance",
    "tags" => ["edit theme"],
    "type" => "url",
    "url" => admin_url() . "theme-editor.php",
  ];

  $actions[] = [
    "label" => __("Customizer", "quicksearch"),
    "icon" => "dashicons-admin-appearance",
    "tags" => ["customize"],
    "type" => "url",
    "url" => admin_url() . "customize.php",
  ];

  return $actions;
};
