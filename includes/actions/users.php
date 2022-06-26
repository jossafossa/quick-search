<?php
// -------------------------------------------- //
// USERS PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_users_links", 1, 1);
function qs_default_users_links($actions) {

  $actions["all_users"] = [
    "label" => __("All users", "quicksearch"),
    "icon" => "dashicons-admin-users",
    "tags" => qs_tags('archive', "users"),
    "type" => "url",
    "url" => admin_url() . "users.php",
  ];

  $actions["create_user"] = [
    "label" => __("Create user", "quicksearch"),
    "icon" => "dashicons-admin-users",
    "tags" => qs_tags('create', "users"),
    "type" => "url",
    "url" => admin_url() . "user-new.php",
  ];

  return $actions;
};
