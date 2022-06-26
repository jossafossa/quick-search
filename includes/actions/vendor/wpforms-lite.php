<?php
// -------------------------------------------- //
// TOOL PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_wpforms_lite", 1, 1);
function qs_wpforms_lite($actions) {

  // all forms
  $actions["wpforms_all"] = [
    "label" => __("All forms", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("all", "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-overview",
  ];

  // new form
  $actions["wpforms_new"] = [
    "label" => __("New form", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("create", "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-builder",
  ];

  // entries
  $actions["wpforms_entries"] = [
    "label" => __("Form entries", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("entries", "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-entries",
  ];

  // settings
  $actions["wpforms_settings"] = [
    "label" => __("Form settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("settings", "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings",
  ];
  $actions["wpforms_settings_email"] = [
    "label" => __("Form email settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("settings", "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=email",
  ];
  $actions["wpforms_settings_captcha"] = [
    "label" => __("Form captcha settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("settings", "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=captcha",
  ];
  $actions["wpforms_settings_validation"] = [
    "label" => __("Form validation settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("settings", "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=validation",
  ];
  $actions["wpforms_settings_intagrations"] = [
    "label" => __("Form integrations settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("settings",  "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=integrations",
  ];
  $actions["wpforms_settings_geolocation"] = [
    "label" => __("Form geolocation settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("settings", "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=geolocation",
  ];
  $actions["wpforms_settings_misc"] = [
    "label" => __("Form misc settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("settings",  "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=misc",
  ];
  $actions["wpforms_settings_access"] = [
    "label" => __("Form access settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("settings",  "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=access",
  ];

  // tools
  $actions["wpforms_tools_import"] = [
    "label" => __("Form import", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("tools", "import",  "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-tools",
  ];
  $actions["wpforms_tools_export"] = [
    "label" => __("Form export", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("tools", "export",  "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-tools&view=export",
  ];
  $actions["wpforms_tools_system"] = [
    "label" => __("Form system info", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("tools", "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-tools&view=system",
  ];
  $actions["wpforms_tools_logs"] = [
    "label" => __("Form logs", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("logs", "tools", "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-tools&view=logs",
  ];

  // addons
  $actions["wpforms_addons"] = [
    "label" => __("Form addons", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("addons", "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-addons",
  ];

  // analytics
  $actions["wpforms_analytics"] = [
    "label" => __("Form analytics", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("analytics", "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-analytics",
  ];

  // analytics
  $actions["wpforms_smtp"] = [
    "label" => __("Form smtp", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("email", "wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-smtp",
  ];

  // about
  $actions["wpforms_about"] = [
    "label" => __("Form about", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-about",
  ];

  // community
  $actions["wpforms_community"] = [
    "label" => __("Form community", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("wpforms"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-community",
  ];

  return $actions;
};
