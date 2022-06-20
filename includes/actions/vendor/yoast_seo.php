<?php
// -------------------------------------------- //
// YOAST SEO
// -------------------------------------------- //
add_filter("qs_actions", "gs_yoast_seo", 1, 1);
function gs_yoast_seo($actions) {

  // general settings
  $actions[] = [
    "label" => __("Yoast general settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["Yoast dashboard", "Yoast general", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_dashboard",
  ];
  $actions[] = [
    "label" => __("Yoast features", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["Yoast features", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_dashboard#top#features",
  ];
  $actions[] = [
    "label" => __("Yoast integrations", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["Yoast integrations", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_dashboard#top#integrations",
  ];
  $actions[] = [
    "label" => __("Yoast webmaster tools", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast webmaster tools", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_dashboard#top#webmaster-tools",
  ];
  $actions[] = [
    "label" => __("Yoast crawl settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast crawl settings", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_dashboard#top#crawl-settings",
  ];


  // Search appearance
  $actions[] = [
    "label" => __("Yoast search appearance settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast search appearance", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_titles#top#general",
  ];
  $actions[] = [
    "label" => __("Yoast content types settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast content types", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_titles#top#post-types",
  ];
  $actions[] = [
    "label" => __("Yoast media settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast media", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_titles#top#media",
  ];
  $actions[] = [
    "label" => __("Yoast taxonomies settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast taxonomies", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_titles#top#taxonomies",
  ];
  $actions[] = [
    "label" => __("Yoast archives settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast archives", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_titles#top#archives",
  ];
  $actions[] = [
    "label" => __("Yoast breadcrumbs settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast breadcrumbs", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_titles#top#breadcrumbs",
  ];
  $actions[] = [
    "label" => __("Yoast rss settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast rss", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_titles#top#rss",
  ];

  // Social
  $actions[] = [
    "label" => __("Yoast social settings", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast social", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_social",
  ];

  // tools
  $actions[] = [
    "label" => __("Yoast tools", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast tools", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_tools",
  ];
  $actions[] = [
    "label" => __("Yoast import", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast import", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_tools&tool=import-export#top#wpseo-import",
  ];
  $actions[] = [
    "label" => __("Yoast export", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast export", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_tools&tool=import-export#top#wpseo-export",
  ];
  $actions[] = [
    "label" => __("Yoast import external", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast import external", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_tools&tool=import-export#top#import-seo",
  ];
  $actions[] = [
    "label" => __("Yoast file editor", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast file editor", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_tools&tool=file-editor",
  ];
  $actions[] = [
    "label" => __("Yoast bulk editor", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["yoast bulk editor", "yoastseo", "wpseo"],
    "type" => "url",
    "url" => admin_url() . "admin.php?page=wpseo_tools&tool=bulk-editor",
  ];


  return $actions;
};
