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
    "tags" => qs_tags("create", 'posttype', $post_type, ...$tags),
    "type" => "url",
    "url" => admin_url() . "post-new.php?post_type={$post_type}",
  ];
  $actions[sprintf("posttype_%s_all", $post_type)] = [
    "label" => sprintf(__("All %s", "quicksearch"), $labels->name),
    "icon" =>  $icon,
    "tags" => qs_tags("archive", 'posttype', $post_type, ...$tags),
    "type" => "url",
    "url" => admin_url() . "edit.php?post_type={$post_type}",
  ];
  $actions[sprintf("posttype_%s_thrash", $post_type)] = [
    "label" => sprintf(__("Trashed %s", "quicksearch"), $labels->name),
    "icon" =>  $icon,
    "tags" => qs_tags("removed", 'posttype', $post_type, ...$tags),
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
    "tags" => qs_tags("archive", $tax, ...$tags),
    "type" => "url",
    "url" => admin_url() . "edit-tags.php?taxonomy={$tax}",
  ];
  return $actions;
}

add_filter('qs_tags', function ($tags) {
  return [
    ['archive', 'list', 'all'],
    ['create', 'new', 'add'],
    ['removed', 'trash', 'bin', 'discard'],
    ['flush', 'clear', 'save'],
    ['log', 'print'],
    ['home', 'homepage', 'dashboard'],
    ['robots.txt', 'robots'],
    ['edit', 'change'],
    ['profile', 'account'],
    ['logout', 'quit'],
    ['settings', 'manage', 'preferences'],
    ['comments', 'discussion'],
    ['media', 'attachment', 'images'],
    ['advanced custom fields', 'acf'],
    ['contactform7', 'cf7'],
    ['addons', 'extensions', 'integration'],
    ['submissions', 'entries'],
    ['gravityforms', 'gf'],
    ["wpseo", "yoastseo"]
  ];
});

// adds synonyms to a list of tags
function qs_tags() {
  $tags = func_get_args();
  $synonyms = apply_filters('qs_tags', []);
  foreach ($tags as $tag) {
    foreach ($synonyms as $list) {
      $index = array_search($tag, $list);
      if ($index !== false) {
        array_unshift($tags, ...$list);
      };
    }
  }
  return [...array_unique($tags)];
}
