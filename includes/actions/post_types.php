<?php 
// -------------------------------------------- //
// PUBLIC POST TYPE PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_add_post_types", 1, 1);
function qs_default_add_post_types($actions) {

  // get post types
  $post_types = get_post_types([
    'public'   => true,
    '_builtin' => true
  ]);


  foreach ($post_types as $post_type) {
    $post_type_obj = get_post_type_object($post_type);
    $labels = $post_type_obj->labels;
    $actions[] = [
      "label" => sprintf(__("Create %s", "quicksearch"), $labels->singular_name),
      "icon" => $post_type_obj->menu_icon,
      "tags" => ["new $labels->singular_name", "create $post_type", "new $post_type"],
      "type" => "url",
      "url" => admin_url() . "post-new.php?post_type={$post_type}",
    ];
    $actions[] = [
      "label" => sprintf(__("All %s", "quicksearch"), $labels->name),
      "icon" => $post_type_obj->menu_icon,
      "tags" => ["archive $labels->singular_name", "all $post_type", "archive $post_type"],
      "type" => "url",
      "url" => admin_url() . "edit.php?post_type={$post_type}",
    ];
    $actions[] = [
      "label" => sprintf(__("Trashed %s", "quicksearch"), $labels->name),
      "icon" => $post_type_obj->menu_icon,
      "tags" => ["trashed $post_type", "removed $labels->name"],
      "type" => "url",
      "url" => admin_url() . "edit.php?post_status=trash&post_type={$post_type}",
    ];
  }

  return $actions;
};
