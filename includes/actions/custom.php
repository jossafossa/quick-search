<?php
add_filter("qs_actions", "qs_custom_urls", 1, 1);
function qs_custom_urls($actions) {
  $options = get_option('qs_options');
  $saved_urls = isset($options["custom_urls"]) ? $options["custom_urls"] : [];

  foreach ($saved_urls as $saved_url) {
    [
      "label" => $label,
      "icon" => $icon,
      "type" => $type,
      "url" => $url
    ] = $saved_url;
    $id = sanitize_title($label);
    if ($label && $icon && $type && $url) {
      $actions["custom_" . $id] = $saved_url;
    }
  }

  return $actions;
};
