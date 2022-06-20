<?php
// -------------------------------------------- //
// TOOL PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_gravity_forms", 1, 1);
function qs_gravity_forms($actions) {
  $actions[] = [
    "label" => __("Gravityforms", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["forms", "all forms", "gravityforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_edit_forms",
  ];
  $actions[] = [
    "label" => __("New Gravityform", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["new form", "create form", "gravityforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_new_form",
  ];
  $actions[] = [
    "label" => __("Gravityform entries", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form entries", "gravityforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_entries",
  ];
  $actions[] = [
    "label" => __("Gravityform settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form settings", "form preferences", "gravityforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_settings",
  ];
  $actions[] = [
    "label" => __("Export Gravityform entries", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["export form entries", "gravityforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_export",
  ];
  $actions[] = [
    "label" => __("Export Gravityform", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["export form", "gravityforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_export&subview=export_form",
  ];
  $actions[] = [
    "label" => __("Import Gravityform", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["import form", "gravityforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_export&subview=import_form",
  ];
  $actions[] = [
    "label" => __("Gravityforms addons", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form addons", "gravityforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_export&subview=gf_addons",
  ];
  $actions[] = [
    "label" => __("Gravityforms system report", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form system report", "gravityforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_system_status&subview=report",
  ];
  $actions[] = [
    "label" => __("Gravityforms updates", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form updates", "gravityforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_system_status&subview=updates",
  ];
  $actions[] = [
    "label" => __("Gravityforms help", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form help", "gravityforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_help",
  ];
  return $actions;
};
