<?php
// -------------------------------------------- //
// Woocommerce
// -------------------------------------------- //
add_filter("qs_actions", "qs_woocommerce", 1, 1);
function qs_woocommerce($actions) {

  // admin
  $actions["wc_admin"] = [
    "label" => __("Woocommerce Home", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("dashboard", "woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-admin",
  ];

  // post types
  $actions = array_merge($actions, qs_get_post_type_actions("shop_order", "dashicons-admin-post", ["woocommerce"]));
  $actions = array_merge($actions, qs_get_post_type_actions("shop_coupon", "dashicons-admin-post", ["woocommerce"]));


  // customers
  $actions["wc_customers"] = [
    "label" => __("Woocommerce all customers", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("archive", "woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-admin&path=%2Fcustomers",
  ];

  // reports
  $actions["wc_reports_orders"] = [
    "label" => __("Woocommerce order report", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("report", "woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-reports&tab=orders",
  ];
  $actions["wc_reports_customers"] = [
    "label" => __("Woocommerce customers report", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("report", "woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-reports&tab=customers",
  ];
  $actions["wc_reports_stock"] = [
    "label" => __("Woocommerce stock report", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("report", "woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-reports&tab=stock",
  ];

  // settings
  $actions["wc_settings_general"] = [
    "label" => __("Woocommerce general settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("settings", "woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-settings&tab=general",
  ];
  $actions["wc_settings_products"] = [
    "label" => __("Woocommerce products settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("settings", "woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-settings&tab=products",
  ];
  $actions["wc_settings_shipping"] = [
    "label" => __("Woocommerce shipping settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("settings", "woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-settings&tab=shipping",
  ];
  $actions["wc_settings_checkout"] = [
    "label" => __("Woocommerce payment settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("settings", "woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-settings&tab=checkout",
  ];
  $actions["wc_settings_account"] = [
    "label" => __("Woocommerce account settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("settings", "woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-settings&tab=account",
  ];
  $actions["wc_settings_email"] = [
    "label" => __("Woocommerce email settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("settings", "woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-settings&tab=email",
  ];
  $actions["wc_settings_integration"] = [
    "label" => __("Woocommerce integration settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("settings", 'integration', "woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-settings&tab=integration",
  ];
  $actions["wc_settings_advanced"] = [
    "label" => __("Woocommerce advanced settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("settings", "woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-settings&tab=advanced",
  ];

  // status
  $actions["wc_settings_status"] = [
    "label" => __("Woocommerce status", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("status", "woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-status&tab=status",
  ];
  $actions["wc_settings_status_tools"] = [
    "label" => __("Woocommerce tools", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("tools", "woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-status&tab=tools",
  ];
  $actions["wc_settings_status_tasks"] = [
    "label" => __("Woocommerce scheduled tasks", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-status&tab=action-scheduler",
  ];

  // addons
  $actions["wc_settings_addons"] = [
    "label" => __("Woocommerce addons", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("addons", "woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-addons",
  ];

  // marketing

  $actions["wc_marketing"] = [
    "label" => __("Woocommerce marketing", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("marketing", "woocommerce"),
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wc-admin&path=%2Fmarketing",
  ];


  return $actions;
};
