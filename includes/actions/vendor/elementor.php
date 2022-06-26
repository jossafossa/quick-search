<?php
// -------------------------------------------- //
// ELEMENTOR
// -------------------------------------------- //
add_filter("qs_actions", "qs_elementor", 1, 1);
function qs_elementor($actions) {
  
  // settings
  $actions["elementor_settings"] = [
    "label" => __("Elementor settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["settings", "elementor"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=elementor#tab-general",
  ];

  // roles
  $actions["elementor_roles"] = [
    "label" => __("Elementor role manager", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["role manager", "elementor"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=elementor-role-manager",
  ];
  
  // tools
  $actions["elementor_tools"] = [
    "label" => __("Elementor tools", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["tools", "elementor"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=elementor-tools",
  ];

  // system info
  $actions["elementor_system_info"] = [
    "label" => __("Elementor system info", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["system info", "elementor"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=elementor-system-info",
  ];

  // getting started
  $actions["elementor_form_getting_started"] = [
    "label" => __("Elementor getting started", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["getting started", "form entries", "elementor"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=elementor-getting-started",
  ];
  
  // form submissions
  $actions["elementor_form_submissions"] = [
    "label" => __("Elementor form submissions", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["form submissions", "form entries", "elementor"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=e-form-submissions",
  ];

  // custom fonts
  $actions["elementor_custom_fonts"] = [
    "label" => __("Elementor custom fonts", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["custom fonts", "elementor"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=elementor_custom_fonts",
  ];

  // custom icons
  $actions["elementor_custom_icons"] = [
    "label" => __("Elementor custom icons", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["custom code", "elementor"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=elementor_custom_icons",
  ];

  // custom code
  $actions["elementor_custom_code"] = [
    "label" => __("Elementor custom code", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["custom code", "elementor"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=elementor_custom_custom_code",
  ];

  // theme builder
  $actions["elementor_theme_builder"] = [
    "label" => __("Elementor theme builder", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["theme builder", "elementor"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=elementor-app",
  ];

  // popups
  $actions["elementor_theme_builder"] = [
    "label" => __("Elementor popups", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["popups", "elementor"],
    "type" => "url",
    "url" => admin_url() . "edit.php?post_type=elementor_library&page=popup_templates",
  ];

  
  // template tax
  $actions = array_merge($actions, qs_get_taxonomy_actions("elementor_library_category"));

  return $actions;
};
