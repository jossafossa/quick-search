<?php
// -------------------------------------------- //
// TOOL PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_gravity_forms", 1, 1);
function qs_gravity_forms($actions) {
  $actions["gf_all"] = [
    "label" => __("Forms", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("archive", "gravityforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_edit_forms",
  ];
  $actions["gf_new"] = [
    "label" => __("Create form", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("create", "gravityforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_new_form",
  ];
  $actions["gf_entries"] = [
    "label" => __("Form entries", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("entries", "gravityforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_entries",
  ];
  $actions["gf_settings"] = [
    "label" => __("Gravityform settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("settings", "gravityforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_settings",
  ];
  $actions["gf_tools_export_entries"] = [
    "label" => __("Export form entries", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("export", 'entries', "gravityforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_export",
  ];
  $actions["gf_tools_export_forms"] = [
    "label" => __("Export form", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("export",  "gravityforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_export&subview=export_form",
  ];
  $actions["gf_tools_import_form"] = [
    "label" => __("Import form", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("import", "gravityforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_export&subview=import_form",
  ];
  $actions["gf_addons"] = [
    "label" => __("Form addons", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("addons", "gravityforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_export&subview=gf_addons",
  ];
  $actions["gf_system_report"] = [
    "label" => __("Form system report", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("report", "gravityforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_system_status&subview=report",
  ];
  $actions["gf_updates"] = [
    "label" => __("Form updates", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("updates", "gravityforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_system_status&subview=updates",
  ];
  $actions["gf_help"] = [
    "label" => __("Form help", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("help", "gravityforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=gf_help",
  ];
  return $actions;
};
