<?php
// -------------------------------------------- //
// TOOL PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_wpforms_lite", 1, 1);
function qs_wpforms_lite($actions) {
  
  // all forms
  $actions[] = [
    "label" => __("WPForms", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["forms", "all forms", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-overview",
  ];
  
  // new form
  $actions[] = [
    "label" => __("New WPForm", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["new form", "create form", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-builder",
  ];

  // entries
  $actions[] = [
    "label" => __("WPForm entries", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form entries", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-entries",
  ];

  // settings
  $actions[] = [
    "label" => __("WPForm settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form settings", "form preferences", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings",
  ];
  $actions[] = [
    "label" => __("WPForm email settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form email settings", "form email preferences", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=email",
  ];
  $actions[] = [
    "label" => __("WPForm captcha settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form captcha settings", "form captcha preferences", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=captcha",
  ];
  $actions[] = [
    "label" => __("WPForm validation settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form validation settings", "form validation preferences", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=validation",
  ];
  $actions[] = [
    "label" => __("WPForm integrations settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form integrations settings", "form integrations preferences", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=integrations",
  ];
  $actions[] = [
    "label" => __("WPForm geolocation settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form geolocation settings", "form geolocation preferences", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=geolocation",
  ];
  $actions[] = [
    "label" => __("WPForm misc settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form misc settings", "form misc preferences", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=misc",
  ];
  $actions[] = [
    "label" => __("WPForm access settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form access settings", "form access preferences", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-settings&view=access",
  ];

  // tools
  $actions[] = [
    "label" => __("WPForm import", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form import tool", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-tools",
  ];
  $actions[] = [
    "label" => __("WPForm export", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form export tool", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-tools&view=export",
  ];
  $actions[] = [
    "label" => __("WPForm system info", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form system info tool", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-tools&view=system",
  ];
  $actions[] = [
    "label" => __("WPForm logs", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form logs", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-tools&view=logs",
  ];

  // addons
  $actions[] = [
    "label" => __("WPForm addons", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form addons", "form extensions", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-addons",
  ];

  // analytics
  $actions[] = [
    "label" => __("WPForm analytics", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form analytics", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-analytics",
  ];
  
  // analytics
  $actions[] = [
    "label" => __("WPForm smtp", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form smtp", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-smtp",
  ];

  // about
  $actions[] = [
    "label" => __("WPForm about", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form about", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-about",
  ];

  // community
  $actions[] = [
    "label" => __("WPForm community", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form community", "wpforms"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpforms-community",
  ];
  
  return $actions;
};
