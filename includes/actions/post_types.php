<?php 
// -------------------------------------------- //
// PUBLIC POST TYPE PAGES
// -------------------------------------------- //




add_filter("qs_actions", "qs_default_add_post_types", 1, 1);
function qs_default_add_post_types($actions) {

  // get post types
  $post_types = get_post_types([
    'public'   => true,
  ]);
  
  foreach ($post_types as $post_type) {
    $actions = array_merge($actions, qs_get_post_type_actions($post_type));
  }


  // get taxonomies
  $taxonomies = get_taxonomies([
    'public'   => true,
  ]);
  foreach ($taxonomies as $tax) {
    $actions = array_merge($actions, qs_get_taxonomy_actions($tax));
  }

  return $actions;
};

