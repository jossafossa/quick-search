<?php
// -------------------------------------------- //
// MISC ACTIONS
// -------------------------------------------- //
add_filter("qs_actions", "qs_misc_actions", 1, 1);
function qs_misc_actions($actions) {
  $actions["misc_sitemap"] = [
    "label" => "View sitemap",
    "icon" => "dashicons-admin-generic",
    "tags" => ["view sitemap", "misc"],
    "type" => "url",
    "url" => home_url() . "/sitemap.xml",
  ];
  $actions["misc_robots"] = [
    "label" => "View robots.txt",
    "icon" => "dashicons-admin-generic",
    "tags" => ["view robots.txt", "view robots", "misc"],
    "type" => "url",
    "url" => home_url() . "/robots.txt",
  ];
  return $actions;
}
