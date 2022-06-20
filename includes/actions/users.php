<?php 
// -------------------------------------------- //
// USERS PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_users_links", 1, 1);
function qs_default_users_links($actions) {

  $actions[] = [
    "label" => __("All users", "quicksearch"),
    "icon" => "dashicons-admin-users",
    "tags" => ["all users", "archive users"],
    "type" => "url",
    "url" => admin_url() . "users.php",
  ];

  $actions[] = [
    "label" => __("Create user", "quicksearch"),
    "icon" => "dashicons-admin-users",
    "tags" => ["create user", "new user"],
    "type" => "url",
    "url" => admin_url() . "user-new.php",
  ];

  return $actions;
};
