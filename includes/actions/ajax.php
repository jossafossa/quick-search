<?php

// -------------------------------------------- //
// AJAX ACTIONS
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_ajax_actions", 1, 1);
function qs_default_ajax_actions($actions) {
  $actions["ajax_save_permalinks"] = [
    "label" => __("Save permalinks", "quicksearch"),
    "icon" => "dashicons-controls-play",
    "tags" => qs_tags("flush", "ajax"),
    "type" => "ajax",
    "action" => "qs_flush_permalinks",
  ];
  $actions["ajax_log_users"] = [
    "label" => __("Log current users", "quicksearch"),
    "icon" => "dashicons-controls-play",
    "tags" => qs_tags("log", "ajax"),
    "type" => "ajax",
    "action" => "qs_log_users",
  ];
  return $actions;
}



// -------------------------------------------- //
// qs_flush_permalinks
// -------------------------------------------- //
if (is_admin()) { // is admin

  add_action('wp_ajax_nopriv_qs_flush_permalinks', 'qs_flush_permalinks');
  add_action('wp_ajax_qs_flush_permalinks', 'qs_flush_permalinks');
  function qs_flush_permalinks() {

    // verify authenticity
    wp_verify_nonce($_POST['security'], 'qs_nonce');

    flush_rewrite_rules();

    // wp_send_json_error($error);
    // wp_send_json_success("Your permalinks have been flushed");

    wp_send_json("Your permalinks have been flushed");

    wp_die();
  };


  add_action('wp_ajax_nopriv_qs_log_users', 'qs_log_users');
  add_action('wp_ajax_qs_log_users', 'qs_log_users');
  function qs_log_users() {

    // verify authenticity
    wp_verify_nonce($_POST['security'], 'qs_nonce');

    $users = get_users([
      'meta_key' => 'session_tokens',
      'meta_compare' => 'EXISTS'
    ]);

    $usernames = [];
    foreach ($users as $user) {
      $usernames[] = $user->data->display_name;
    }

    // wp_send_json_error($error);
    // wp_send_json_success("Your permalinks have been flushed");

    wp_send_json_success(join(", ", $usernames));

    wp_die();
  }
}
