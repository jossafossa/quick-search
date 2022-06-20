<?php

if (is_admin()) :

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