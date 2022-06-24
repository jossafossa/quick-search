<?php
// -------------------------------------------- //
// ACF
// -------------------------------------------- //
add_filter("qs_actions", "qs_acf", 1, 1);
function qs_acf($actions) {
  $actions[] = [
    "label" => __("ACF field groups", "quicksearch"),
    "icon" => "dashicons-welcome-widgets-menus",
    "tags" => ["ACF field groups", "acf"],
    "type" => "url",
    "url" => admin_url() . "edit.php?post_type=acf-field-group",
  ];
  $actions[] = [
    "label" => __("New ACF field group", "quicksearch"),
    "icon" => "dashicons-welcome-widgets-menus",
    "tags" => ["New ACF field group", "create field group", "acf"],
    "type" => "url",
    "url" => admin_url() . "post-new.php?post_type=acf-field-group",
  ];
  $actions[] = [
    "label" => __("ACF tools", "quicksearch"),
    "icon" => "dashicons-welcome-widgets-menus",
    "tags" => ["ACF tools", "acf"],
    "type" => "url",
    "url" => admin_url() . "edit.php?post_type=acf-field-group&page=acf-tools",
  ];
  $actions[] = [
    "label" => __("ACF updates", "quicksearch"),
    "icon" => "dashicons-welcome-widgets-menus",
    "tags" => ["ACF updates", "acf"],
    "type" => "url",
    "url" => admin_url() . "edit.php?post_type=acf-field-group&page=acf-settings-updates",
  ];


  return $actions;
};