<?php
// -------------------------------------------- //
// TOOL PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_wpforms_lite", 1, 1);
function qs_wpforms_lite($actions) {
  
  // all forms
  $actions[] = [
    "label" => __("Forms", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["forms", "all forms", "contactform7"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpcf7",
  ];

  // new form
  $actions[] = [
    "label" => __("New form", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["new form", "create forms", "contactform7"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpcf7-new",
  ];

  // integration
  $actions[] = [
    "label" => __("Form integration", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form integration", "form addon", "contactform7"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpcf7-integration",
  ];
  
  return $actions;
};
