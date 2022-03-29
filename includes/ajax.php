<?php



// -------------------------------------------- //
// qs_flush_permalinks
// -------------------------------------------- //
if (is_admin()) : // is admin
  add_action('wp_ajax_nopriv_qs_flush_permalinks', 'qs_flush_permalinks');
  add_action('wp_ajax_qs_flush_permalinks', 'qs_flush_permalinks');
  function qs_flush_permalinks() {

    // verify authenticity
    wp_verify_nonce($_POST['security'], 'qs_nonce');

    $results = [
      "action" => $_POST['action']
    ];

    flush_rewrite_rules();

    $error = new WP_Error('404', 'No user information was retrieved.');

    // wp_send_json_error($error);
    // wp_send_json_success("Your permalinks have been flushed");

    wp_send_json("Your permalinks have been flushed");

    wp_die();
  }

  // test error
  add_action('wp_ajax_nopriv_qs_test_error', 'qs_test_error');
  add_action('wp_ajax_qs_test_error', 'qs_test_error');
  function qs_test_error() {
    $error = new WP_Error('404', 'Ajax responded with error');
    wp_send_json_error($error);
    wp_die();
  }

  // test success
  add_action('wp_ajax_nopriv_qs_test_success', 'qs_test_success');
  add_action('wp_ajax_qs_test_success', 'qs_test_success');
  function qs_test_success() {
    wp_send_json_success([
      "custom_data" => "wow custom value",
    ]);
    wp_die();
  }


  // test generic
  add_action('wp_ajax_nopriv_qs_test_json', 'qs_test_json');
  add_action('wp_ajax_qs_test_json', 'qs_test_json');
  function qs_test_json() {
    wp_send_json("wow custom value");
    wp_die();
  }


  // test generic
  add_action('wp_ajax_nopriv_qs_test_wrong_json', 'qs_test_wrong_json');
  add_action('wp_ajax_qs_test_wrong_json', 'qs_test_wrong_json');
  function qs_test_wrong_json() {
    wp_send_json_success("wow direct data?");
    wp_die();
  }


endif; // end is admin