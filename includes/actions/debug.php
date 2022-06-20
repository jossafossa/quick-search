<?php 
// -------------------------------------------- //
// DEBUG AJAX ACTIONS
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_debug_ajax_actions", 1, 1);
function qs_default_debug_ajax_actions($actions) {
  $actions[] = [
    "label" => "json_success",
    "icon" => "dashicons-controls-play",
    "type" => "ajax",
    "action" => "qs_test_success",
  ];
  $actions[] = [
    "label" => "json_error",
    "icon" => "dashicons-controls-play",
    "type" => "ajax",
    "action" => "qs_test_error",
  ];
  $actions[] = [
    "label" => "json",
    "icon" => "dashicons-controls-play",
    "type" => "ajax",
    "action" => "qs_test_json",
  ];
  $actions[] = [
    "label" => "json_wrong",
    "icon" => "dashicons-controls-play",
    "type" => "ajax",
    "action" => "qs_test_wrong_json",
  ];
  return $actions;
}
