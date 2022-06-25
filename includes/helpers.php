<?php

function qs_log($data, $echo = true) {
  if ($echo) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
  }

  $json = json_encode($data);
  echo "<script>console.log($json);</script>";
}


function qs_get_settings_url() {
  return menu_page_url('qs_option_group', false);
}