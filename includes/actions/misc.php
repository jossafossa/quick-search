<?php
// -------------------------------------------- //
// MISC ACTIONS
// -------------------------------------------- //
add_filter("qs_actions", "qs_misc_actions", 1, 1);
function qs_misc_actions($actions) {
  $actions[] = [
    "label" => "View sitemap",
    "icon" => "dashicons-admin-generic",
    "tags" => ["view sitemap"],
    "type" => "url",
    "url" => home_url() . "/sitemap.xml",
  ];
  $actions[] = [
    "label" => "View robots.txt",
    "icon" => "dashicons-admin-generic",
    "tags" => ["view robots.txt", "view robots"],
    "type" => "url",
    "url" => home_url() . "/robots.txt",
  ];
  return $actions;
}
