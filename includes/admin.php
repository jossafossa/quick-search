<?php




// -------------------------------------------- //
// ENQUEUE SOURCES
// -------------------------------------------- //

add_action('admin_enqueue_scripts', function () {


  // enqueue scripts
  wp_enqueue_script('qs-scripts', QS_PLUGIN_URL . 'build/js/bundle.js');

  // enqueue styles
  wp_enqueue_style('qs-styles', QS_PLUGIN_URL . 'build/css/style.css');

  // nonce
  $qs_nonce = wp_create_nonce('qs_nonce');
  wp_localize_script(
    'qs-scripts',
    'qsData',
    [
      "nonce" => $qs_nonce
    ]
  );
});

add_action( 'admin_init', function() {
  
  // get actions
  $actions = apply_filters("qs_actions", []);
  
  // filter out disabled actions
  $disabled_actions = qs_get_option("disabled_actions");
  foreach($disabled_actions as $disabled_action) {
    unset($actions[$disabled_action]);
  }

  wp_register_script( 'qs-actions', '',);
  wp_enqueue_script( 'qs-actions' );
  wp_add_inline_script(
    'qs-actions',
    "let qsActions = " . json_encode($actions),
    "before"
  );
} );


// -------------------------------------------- //
// ADD HTML TO ADMIN
// -------------------------------------------- //

add_action('admin_footer', function () {
  if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX)) {
    include_once QS_PLUGIN_PATH . 'template-parts/templates.php';
  }
});
