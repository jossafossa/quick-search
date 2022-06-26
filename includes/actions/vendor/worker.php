<?php
// -------------------------------------------- //
// TOOL PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_managewp", 1, 1);
function qs_managewp($actions) {
  $actions["managewp_get_connection_key"] = [
    "label" => __("ManageWP get connection key", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("ManageWP get connection key", "managewp"),
    "type" => "ajax",
    "action" => "qs_managewp_get_connection_key",
  ];
  return $actions;
};


// -------------------------------------------- //
// qs_flush_permalinks
// -------------------------------------------- //
if (is_admin()) { // is admin
  add_action('wp_ajax_nopriv_qs_managewp_get_connection_key', 'qs_managewp_get_connection_key');
  add_action('wp_ajax_qs_managewp_get_connection_key', 'qs_managewp_get_connection_key');
  function qs_managewp_get_connection_key() {

    // verify authenticity
    wp_verify_nonce($_POST['security'], 'qs_nonce');

    if (function_exists('mwp_get_potential_key')) {
      wp_send_json(mwp_get_potential_key());
    } else {
      $error = new WP_Error('404', "Could not get connection key");
      wp_send_json_error($error);
    }
    wp_die();
  }
}
