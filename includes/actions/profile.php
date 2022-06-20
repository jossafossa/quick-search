<?php 

// -------------------------------------------- //
// PROFILE ACTIONS
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_profile_actions", 1, 1);
function qs_default_profile_actions($actions) {
  $actions[] = [
    "label" => __("Edit my profile", "quicksearch"),
    "icon" => "dashicons-admin-users",
    "tags" => ["edit my profile", "my profile"],
    "type" => "url",
    "url" => admin_url() . "profile.php",
  ];

  $logout_url =  wp_nonce_url(home_url() . "/wp-login.php", "logout");
  qs_log([
    "url" => $logout_url
  ], false);
  $actions[] = [
    "label" => __("Logout", "quicksearch"),
    "tags" => ["logout", "quit"],
    "icon" => "dashicons-exit",
    "type" => "url",
    "url" =>  $logout_url
  ];
  return $actions;
}
