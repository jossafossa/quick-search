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
    "icon" =>  $icon ,
    "tags" => ["new $labels->singular_name", "create $post_type", "new $post_type", ...$tags],
    "type" => "url",
    "url" => admin_url() . "post-new.php?post_type={$post_type}",
  ];
  $actions[sprintf("posttype_%s_all", $post_type)] = [
    "label" => sprintf(__("All %s", "quicksearch"), $labels->name),
    "icon" =>  $icon ,
    "tags" => ["archive $labels->singular_name", "all $post_type", "archive $post_type", ...$tags],
    "type" => "url",
    "url" => admin_url() . "edit.php?post_type={$post_type}",
  ];
  $actions[sprintf("posttype_%s_thrash", $post_type)] = [
    "label" => sprintf(__("Trashed %s", "quicksearch"), $labels->name),
    "icon" =>  $icon ,
    "tags" => ["trashed $post_type", "removed $labels->name", ...$tags],
    "type" => "url",
    "url" => admin_url() . "edit.php?post_status=trash&post_type={$post_type}",
  ];
  return $actions;
}