<?php
// -------------------------------------------- //
// TOOL PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_wpforms_lite", 1, 1);
function qs_wpforms_lite($actions) {

  // all forms
  $actions["cf7_all"] = [
    "label" => __("Forms", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("all", "cf7"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpcf7",
  ];

  // new form
  $actions["cf7_new"] = [
    "label" => __("Create form", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("create", "cf7"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpcf7-new",
  ];

  // integration
  $actions["cf7_integration"] = [
    "label" => __("Form integration", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("addons", "cf7"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpcf7-integration",
  ];

  return $actions;
};
