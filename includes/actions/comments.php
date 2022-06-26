<?php
// -------------------------------------------- //
// COMMENTS
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_comments_links", 1, 1);
function qs_default_comments_links($actions) {

  $actions["comments"] = [
    "label" => __("All comments", "quicksearch"),
    "icon" => "dashicons-admin-comments",
    "tags" => ["all comments", "archive comments", "comments"],
    "type" => "url",
    "url" => admin_url() . "edit-comments.php",
  ];

  return $actions;
};
