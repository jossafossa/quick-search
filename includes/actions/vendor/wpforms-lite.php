<?php
// -------------------------------------------- //
// TOOL PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_wpforms_lite", 1, 1);
function qs_wpforms_lite($actions) {
  
  // all forms
  $actions["wpforms_all"] = [
    "label" => __("WPForms", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["forms", "all forms", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-overview",
  ];
  
  // new form
  $actions["wpforms_new"] = [
    "label" => __("New WPForm", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["new form", "create form", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-builder",
  ];

  // entries
  $actions["wpforms_entries"] = [
    "label" => __("WPForm entries", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form entries", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-entries",
  ];

  // settings
  $actions["wpforms_settings"] = [
    "label" => __("WPForm settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form settings", "form preferences", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings",
  ];
  $actions["wpforms_settings_email"] = [
    "label" => __("WPForm email settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form email settings", "form email preferences", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=email",
  ];
  $actions["wpforms_settings_captcha"] = [
    "label" => __("WPForm captcha settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form captcha settings", "form captcha preferences", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=captcha",
  ];
  $actions["wpforms_settings_validation"] = [
    "label" => __("WPForm validation settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form validation settings", "form validation preferences", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=validation",
  ];
  $actions["wpforms_settings_intagrations"] = [
    "label" => __("WPForm integrations settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form integrations settings", "form integrations preferences", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=integrations",
  ];
  $actions["wpforms_settings_geolocation"] = [
    "label" => __("WPForm geolocation settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form geolocation settings", "form geolocation preferences", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=geolocation",
  ];
  $actions["wpforms_settings_misc"] = [
    "label" => __("WPForm misc settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form misc settings", "form misc preferences", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=misc",
  ];
  $actions["wpforms_settings_access"] = [
    "label" => __("WPForm access settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form access settings", "form access preferences", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=access",
  ];

  // tools
  $actions["wpforms_tools_import"] = [
    "label" => __("WPForm import", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form import tool", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-tools",
  ];
  $actions["wpforms_tools_export"] = [
    "label" => __("WPForm export", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form export tool", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-tools&view=export",
  ];
  $actions["wpforms_tools_system"] = [
    "label" => __("WPForm system info", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form system info tool", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-tools&view=system",
  ];
  $actions["wpforms_tools_logs"] = [
    "label" => __("WPForm logs", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form logs", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-tools&view=logs",
  ];

  // addons
  $actions["wpforms_addons"] = [
    "label" => __("WPForm addons", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form addons", "form extensions", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-addons",
  ];

  // analytics
  $actions["wpforms_analytics"] = [
    "label" => __("WPForm analytics", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form analytics", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-analytics",
  ];
  
  // analytics
  $actions["wpforms_smtp"] = [
    "label" => __("WPForm smtp", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form smtp", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-smtp",
  ];

  // about
  $actions["wpforms_about"] = [
    "label" => __("WPForm about", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form about", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-about",
  ];

  // community
  $actions["wpforms_community"] = [
    "label" => __("WPForm community", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form community", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-community",
  ];
  
  return $actions;
};
