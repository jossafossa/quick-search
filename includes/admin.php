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

  $actions = apply_filters("qs_actions", []);
  wp_localize_script(
    'qs-scripts',
    'qsActions',
    $actions
  );
});


// -------------------------------------------- //
// ADD HTML TO ADMIN
// -------------------------------------------- //

add_action('admin_footer', function () {
  if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX)) {
    include_once QS_PLUGIN_PATH . 'template-parts/templates.php';
  }
});
