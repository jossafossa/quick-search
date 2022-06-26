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

function qs_get_option($key) {
  $options = get_option('qs_options');
  return isset($options[$key]) ? $options[$key] : [];
}


function qs_get_post_type_actions($post_type, $default_icon = "dashicons-admin-post", $tags = []) {

  $post_type_obj = get_post_type_object($post_type);
  $labels = $post_type_obj->labels;
  $icon = $post_type_obj->menu_icon ?: $default_icon;
  $actions = [];
  $actions[sprintf("posttype_%s_create", $post_type)] = [
    "label" => sprintf(__("Create %s", "quicksearch"), $labels->singular_name),
    "icon" =>  $icon,
    "tags" => ["new", "create", "$post_type", ...$tags],
    "type" => "url",
    "url" => admin_url() . "post-new.php?post_type={$post_type}",
  ];
  $actions[sprintf("posttype_%s_all", $post_type)] = [
    "label" => sprintf(__("All %s", "quicksearch"), $labels->name),
    "icon" =>  $icon,
    "tags" => ["archive", "$post_type", ...$tags],
    "type" => "url",
    "url" => admin_url() . "edit.php?post_type={$post_type}",
  ];
  $actions[sprintf("posttype_%s_thrash", $post_type)] = [
    "label" => sprintf(__("Trashed %s", "quicksearch"), $labels->name),
    "icon" =>  $icon,
    "tags" => ["trashed", "removed", "recycled",  "bin", "$post_type", ...$tags],
    "type" => "url",
    "url" => admin_url() . "edit.php?post_status=trash&post_type={$post_type}",
  ];
  return $actions;
}


function qs_get_taxonomy_actions($tax, $default_icon = "dashicons-tag", $tags = []) {
  $tax_object = get_taxonomy($tax);
  $icon = $default_icon;
  $actions = [];
  $actions[sprintf("taxonomy_%s_all", $tax)] = [
    "label" => sprintf("All %s", $tax_object->labels->name),
    "icon" =>  $icon,
    "tags" => [$tax, ...$tags],
    "type" => "url",
    "url" => admin_url() . "edit-tags.php?taxonomy={$tax}",
  ];
  return $actions;
}
