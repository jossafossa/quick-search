<?php


// -------------------------------------------- //
// REGISTER MENU
// -------------------------------------------- //
function qs_options_page() {
  add_submenu_page(
    'options-general.php',
    'Quick search',
    'Quick search Options',
    'manage_options',
    'qs_settings',
    'qs_options_page_html'
  );
}
add_action('admin_menu', 'qs_options_page');


// -------------------------------------------- //
// INIT SETTINGS
// -------------------------------------------- //
function qs_settings_init() {

  // REGISTER OPTION GROUPS
  register_setting('qs_settings', 'qs_options');

  // REGISTER SETTINGS
  add_settings_section(
    'qs_general_section',
    __('', 'quicksearch'),
    'qs_general_section_callback',
    'qs_settings'
  );
}
add_action('admin_init', 'qs_settings_init');


// -------------------------------------------- //
// ENQUEUE SCRIPTS
// -------------------------------------------- //
function qs_enqueue_settings_scripts($hook_suffix) {

  // bail early if the settings page is not correct
  if ($hook_suffix != 'settings_page_qs_settings') return;

  // scripts
  wp_register_script("qs_settings", QS_PLUGIN_URL . 'build/js/settings.js');
  wp_enqueue_script('qs_settings');

  wp_register_script("qs_settings_vue", QS_PLUGIN_URL . 'settings/dist/app.js', [], 1, true);
  wp_enqueue_script('qs_settings_vue');

  // styles
  wp_register_style("qs_settings", QS_PLUGIN_URL . 'build/css/settings.css');
  wp_enqueue_style('qs_settings');

  wp_register_style("qs_settings_vue", QS_PLUGIN_URL . 'settings/dist/app.css');
  wp_enqueue_style('qs_settings_vue');
}
add_action('admin_enqueue_scripts', 'qs_enqueue_settings_scripts');



// -------------------------------------------- //
// SECTION HEADINGS
// -------------------------------------------- //
function qs_general_section_callback($args) { ?>
  <!-- <p id="<?= esc_attr($args['id']); ?>"><?php esc_html_e('Follow the white rabbit.', 'quicksearch'); ?></p> -->
<?php }


// -------------------------------------------- //
// RENDER PAGE
// -------------------------------------------- //
function qs_options_page_html() {

  // HANDLE ROLE
  if (!current_user_can('manage_options')) {
    return;
  }
?>
  <div class="wrap">
    <h1><?= esc_html(get_admin_page_title()); ?></h1>
    <form action="options.php" method="post">
      <?php settings_fields('qs_settings'); ?>
      <?php 
        // Get the value of the setting we've registered with register_setting()
        $saved_urls = qs_get_option("custom_urls");
        $disabled_actions = qs_get_option("disabled_actions");
        $actions = apply_filters( 'qs_actions', [] );

        // enabled actions
        $enabled_actions = [];
        foreach($actions as $id => $value) {
          if (!in_array($id, $disabled_actions)) {
            $enabled_actions[] = $id;
          }
        }
      ?>
      <script>
        window.qsCustomURLs = <?= json_encode($saved_urls); ?>;
        window.qsAllActions = <?= json_encode($actions); ?>;
        window.qsEnabledActions = <?= json_encode($enabled_actions); ?>;
        window.qsDisabledActions = <?= json_encode($disabled_actions); ?>;
      </script>

      <div id="app"></div>

      <?php submit_button('Save Settings');?>
    </form>
  </div>
<?php
}

/*

// -------------------------------------------- //
// SETTINGS
// -------------------------------------------- //

// CUSTOM QUICK SEARCH
function qs_custom_items() {
  add_settings_field(
    'custom_urls',
    __('Custom Shortcuts', 'quicksearch'),
    'qs_custom_urls_callback',
    'qs_settings',
    'qs_general_section',
    array(
      // 'label_for'         => 'qs_field_pill',
      // 'class'             => 'wporg_row',
    )
  );
}
add_action('admin_init', 'qs_custom_items');

// CUSTOM QUICK SEARCH CALLBACK
function qs_custom_urls_callback($args) {
  // Get the value of the setting we've registered with register_setting()
  $options = get_option('qs_options');
  $saved_urls = isset($options["custom_urls"]) ? $options["custom_urls"] : []; ?>

  <script>
    window.qsShortcuts = <?= json_encode($saved_urls); ?>;
  </script>

  <div id="app"></div>

  <!-- <textarea name="qs_options[value]" id="" cols="30" rows="10"><?= $value; ?></textarea> -->
  <!-- <select id="<?= esc_attr($args['label_for']); ?>" data-custom="<?= esc_attr($args['wporg_custom_data']); ?>" name="f[<?= esc_attr($args['label_for']); ?>]">
    <option value="red" <?= isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'red', false)) : (''); ?>>
      <?php esc_html_e('red pill', 'quicksearch'); ?>
    </option>
    <option value="blue" <?= isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'blue', false)) : (''); ?>>
      <?php esc_html_e('blue pill', 'quicksearch'); ?>
    </option>
  </select> -->
<?php
}

*/