<?php
// -------------------------------------------- //
// Regenerate thumbnails
// -------------------------------------------- //
add_filter("qs_actions", "qs_regenerate_thumbnails", 1, 1);
function qs_regenerate_thumbnails($actions) {
  $actions["regenerate_thumbnails"] = [
    "label" => __("Regenerate thumbnails", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => ["Regenerate thumbnails"],
    "type" => "url",
    "url" => admin_url() . "tools.php?page=regenerate-thumbnails",
  ];


  return $actions;
};
