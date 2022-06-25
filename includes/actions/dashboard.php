<?php

// -------------------------------------------- //
// DASHBOARD PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_dashboard_links", 1, 1);
function qs_default_dashboard_links($actions) {

  $actions["dashboard"] = [
    "label" => __("Wordpress dashboard", "quicksearch"),
    "icon" => "dashicons-dashboard",
    "tags" => ["wordpress dashboard", "home", "homepage"],
    "type" => "url",
    "url" => admin_url() . "index.php",
  ];

  $actions["dashboard_updates"] = [
    "label" => __("Wordpress updates", "quicksearch"),
    "icon" => "dashicons-dashboard",
    "tags" => ["wordpress updates"],
    "type" => "url",
    "url" => admin_url() . "update-core.php",
  ];

  return $actions;
};
