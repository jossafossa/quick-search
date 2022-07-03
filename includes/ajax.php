<?php 
add_action( 'wp_ajax_qs_validate_license', 'qs_validate_license' );
add_action( 'wp_ajax_nopriv_qs_validate_license', 'qs_validate_license' );

function qs_validate_license() {
  $key = $_POST['key'];

  $api_params = [
    'slm_action' => 'slm_check',
    'secret_key' => '62c0d9af1c2a27.21843953',
    'license_key' => $key,
  ];

  // Send query to the license manager server
  $api_response = wp_remote_get(add_query_arg($api_params, QS_LICENSE_URL), array('timeout' => 20, 'sslverify' => false));
  $body = json_decode($api_response["body"]);



  $invalid_response = [
    "message" => "licence not invalid", 
    "body" => $body,
    "success" => false 
  ];


  if ($api_response["response"]["code"] !== 200 || $body->result == "error") {
    wp_send_json_error($invalid_response);
  }

  wp_send_json( [
    "message" => "licence valid", 
    "body" => $body,
    "success" => true
    ] );
}
