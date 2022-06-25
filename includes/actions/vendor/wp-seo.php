<?php
// -------------------------------------------- //
// YOAST SEO
// -------------------------------------------- //
add_filter("qs_actions", "gs_yoast_seo", 1, 1);
function gs_yoast_seo($actions) {

  // general settings
  $actions["wpseo_settings_general"] = [
    "label" => __("Yoast general settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["Yoast dashboard", "Yoast general", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_dashboard",
  ];
  $actions["wpseo_settings_general_features"] = [
    "label" => __("Yoast features", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["Yoast features", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_dashboard#top#features",
  ];
  $actions["wpseo_settings_general_integrations"] = [
    "label" => __("Yoast integrations", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["Yoast integrations", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_dashboard#top#integrations",
  ];
  $actions["wpseo_settings_general_webmaster"] = [
    "label" => __("Yoast webmaster tools", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast webmaster tools", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_dashboard#top#webmaster-tools",
  ];
  $actions["wpseo_settings_general_crawl"] = [
    "label" => __("Yoast crawl settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast crawl settings", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_dashboard#top#crawl-settings",
  ];


  // Search appearance
  $actions["wpseo_settings_appearance"] = [
    "label" => __("Yoast search appearance settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast search appearance", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_titles#top#general",
  ];
  $actions["wpseo_settings_appearance_types"] = [
    "label" => __("Yoast content types settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast content types", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_titles#top#post-types",
  ];
  $actions["wpseo_settings_appearance_media"] = [
    "label" => __("Yoast media settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast media", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_titles#top#media",
  ];
  $actions["wpseo_settings_appearance_taxonomies"] = [
    "label" => __("Yoast taxonomies settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast taxonomies", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_titles#top#taxonomies",
  ];
  $actions["wpseo_settings_appearance_archives"] = [
    "label" => __("Yoast archives settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast archives", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_titles#top#archives",
  ];
  $actions["wpseo_settings_appearance_breadcrumbs"] = [
    "label" => __("Yoast breadcrumbs settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast breadcrumbs", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_titles#top#breadcrumbs",
  ];
  $actions["wpseo_settings_appearance_rss"] = [
    "label" => __("Yoast rss settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast rss", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_titles#top#rss",
  ];

  // Social
  $actions["wpseo_settings_social"] = [
    "label" => __("Yoast social settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast social", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_social",
  ];

  // tools
  $actions["wpseo_tools"] = [
    "label" => __("Yoast tools", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast tools", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_tools",
  ];
  $actions["wpseo_tools_import"] = [
    "label" => __("Yoast import", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast import", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_tools&tool=import-export#top#wpseo-import",
  ];
  $actions["wpseo_tools_export"] = [
    "label" => __("Yoast export", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast export", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_tools&tool=import-export#top#wpseo-export",
  ];
  $actions["wpseo_tools_import_external"] = [
    "label" => __("Yoast import external", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast import external", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_tools&tool=import-export#top#import-seo",
  ];
  $actions["wpseo_tools_file_editor"] = [
    "label" => __("Yoast file editor", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast file editor", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_tools&tool=file-editor",
  ];
  $actions["wpseo_tools_bulk_editor"] = [
    "label" => __("Yoast bulk editor", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast bulk editor", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_tools&tool=bulk-editor",
  ];


  return $actions;
};
