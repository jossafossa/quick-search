<?php

// -------------------------------------------- //
// DASHBOARD PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_dashboard_links", 1, 1);
function qs_default_dashboard_links($actions) {

  $actions[] = [
    "label" => __("Wordpress dashboard", "quicksearch"),
    "icon" => "dashicons-dashboard",
    "tags" => "wordpress dashboard, home, homepage",
    "type" => "url",
    "url" => admin_url() . "index.php",
  ];

  $actions[] = [
    "label" => __("Wordpress updates", "quicksearch"),
    "icon" => "dashicons-dashboard",
    "tags" => "wordpress updates",
    "type" => "url",
    "url" => admin_url() . "update-core.php",
  ];

  return $actions;
};

// -------------------------------------------- //
// SETTING PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_setting_pages", 1, 1);
function qs_default_setting_pages($actions) {
  $default_actions = [
    [
      "label" => __("General settings", "quicksearch"),
      "icon" => "dashicons-admin-generic",
      "tags" => "general settings, settings",
      "type" => "url",
      "url" => admin_url() . "options-general.php",
    ],
    [
      "label" => __("Write settings", "quicksearch"),
      "icon" => "dashicons-admin-generic",
      "tags" => "write settings, writing settings, manage writing",
      "type" => "url",
      "url" => admin_url() . "options-writing.php",
    ],
    [
      "label" => __("Read settings", "quicksearch"),
      "icon" => "dashicons-admin-generic",
      "tags" => "read settings, reading settings, manage reading",
      "type" => "url",
      "url" => admin_url() . "options-writing.php",
    ],
    [
      "label" => __("Discussion settings", "quicksearch"),
      "icon" => "dashicons-admin-generic",
      "tags" => "discussion settings, manage discussion",
      "type" => "url",
      "url" => admin_url() . "options-discussion.php",
    ],
    [
      "label" => __("Media settings", "quicksearch"),
      "icon" => "dashicons-admin-generic",
      "tags" => "media settings, manage media",
      "type" => "url",
      "url" => admin_url() . "options-media.php",
    ],
    [
      "label" => __("Permalinks settings", "quicksearch"),
      "icon" => "dashicons-admin-generic",
      "tags" => "permalinks settings, manage permalinks",
      "type" => "url",
      "url" => admin_url() . "options-permalink.php",
    ],
    [
      "label" => __("Privacy settings", "quicksearch"),
      "icon" => "dashicons-admin-generic",
      "tags" => "privacy settings, manage privacy",
      "type" => "url",
      "url" => admin_url() . "options-privacy.php",
    ]
  ];

  return array_merge($actions, $default_actions);
};


// -------------------------------------------- //
// TOOL PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_tool_pages", 1, 1);
function qs_default_tool_pages($actions) {
  $default_actions = [
    [
      "label" => __("Tools", "quicksearch"),
      "icon" => "dashicons-admin-tools",
      "tags" => "tools",
      "type" => "url",
      "url" => admin_url() . "tools.php",
    ],
    [
      "label" => __("Import tools", "quicksearch"),
      "icon" => "dashicons-admin-tools",
      "tags" => "import tools, tools import",
      "type" => "url",
      "url" => admin_url() . "import.php",
    ],
    [
      "label" => __("Export tools", "quicksearch"),
      "icon" => "dashicons-admin-tools",
      "tags" => "export tools, tools export",
      "type" => "url",
      "url" => admin_url() . "export.php",
    ],
    [
      "label" => __("Site health tool", "quicksearch"),
      "icon" => "dashicons-admin-tools",
      "tags" => "site health tool",
      "type" => "url",
      "url" => admin_url() . "site-health.php",
    ],
    [
      "label" => __("Export personal data tool", "quicksearch"),
      "icon" => "dashicons-admin-tools",
      "tags" => "export personal data tool",
      "type" => "url",
      "url" => admin_url() . "export-personal-data.php",
    ],
    [
      "label" => __("Erase personal data tool", "quicksearch"),
      "icon" => "dashicons-admin-tools",
      "tags" => "erase personal data tool",
      "type" => "url",
      "url" => admin_url() . "erase-personal-data.php",
    ]
  ];

  return array_merge($actions, $default_actions);
};


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
      "tags" => "new $labels->singular_name, create $post_type, new $post_type",
      "type" => "url",
      "url" => admin_url() . "post-new.php?post_type={$post_type}",
    ];
    $actions[] = [
      "label" => sprintf(__("All %s", "quicksearch"), $labels->name),
      "icon" => $post_type_obj->menu_icon,
      "tags" => "archive $labels->singular_name, all $post_type, archive $post_type",
      "type" => "url",
      "url" => admin_url() . "edit.php?post_type={$post_type}",
    ];
    $actions[] = [
      "label" => sprintf(__("Trashed %s", "quicksearch"), $labels->name),
      "icon" => $post_type_obj->menu_icon,
      "tags" => "trashed $post_type, removed $labels->name",
      "type" => "url",
      "url" => admin_url() . "edit.php?post_status=trash&post_type={$post_type}",
    ];
  }

  return $actions;
};


// -------------------------------------------- //
// COMMENTS
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_comments_links", 1, 1);
function qs_default_comments_links($actions) {

  $actions[] = [
    "label" => __("All comments", "quicksearch"),
    "icon" => "dashicons-admin-comments",
    "tags" => "all comments, archive comments",
    "type" => "url",
    "url" => admin_url() . "edit-comments.php",
  ];

  return $actions;
};



// -------------------------------------------- //
// USERS PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_users_links", 1, 1);
function qs_default_users_links($actions) {

  $actions[] = [
    "label" => __("All users", "quicksearch"),
    "icon" => "dashicons-admin-users",
    "tags" => "all users, archive users",
    "type" => "url",
    "url" => admin_url() . "users.php",
  ];

  $actions[] = [
    "label" => __("Create user", "quicksearch"),
    "icon" => "dashicons-admin-users",
    "tags" => "create user, new user",
    "type" => "url",
    "url" => admin_url() . "user-new.php",
  ];

  return $actions;
};



// -------------------------------------------- //
// PLUGIN PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_plugin_links", 1, 1);
function qs_default_plugin_links($actions) {

  $actions[] = [
    "label" => __("All plugins", "quicksearch"),
    "icon" => "dashicons-screenoptions",
    "tags" => "all plugins, archive plugins",
    "type" => "url",
    "url" => admin_url() . "plugins.php",
  ];

  $actions[] = [
    "label" => __("Upload plugin", "quicksearch"),
    "icon" => "dashicons-plus",
    "tags" => "upload plugin, new plugin, create plugin",
    "type" => "url",
    "url" => admin_url() . "plugin-install.php",
  ];

  return $actions;
};



// -------------------------------------------- //
// THEME PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_theme_links", 1, 1);
function qs_default_theme_links($actions) {

  $actions[] = [
    "label" => __("Upload theme", "quicksearch"),
    "icon" => "dashicons-plus",
    "tags" => "upload theme, new theme, create theme",
    "type" => "url",
    "url" => admin_url() . "theme-install.php",
  ];

  $actions[] = [
    "label" => __("All themes", "quicksearch"),
    "icon" => "dashicons-admin-appearance",
    "tags" => "all themes, archive themes, change theme",
    "type" => "url",
    "url" => admin_url() . "themes.php",
  ];

  $actions[] = [
    "label" => __("Edit theme", "quicksearch"),
    "icon" => "dashicons-admin-appearance",
    "tags" => "edit theme",
    "type" => "url",
    "url" => admin_url() . "theme-editor.php",
  ];

  $actions[] = [
    "label" => __("Customizer", "quicksearch"),
    "icon" => "dashicons-admin-appearance",
    "tags" => "customize",
    "type" => "url",
    "url" => admin_url() . "customize.php",
  ];

  return $actions;
};


// -------------------------------------------- //
// PROFILE ACTIONS
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_profile_actions", 1, 1);
function qs_default_profile_actions($actions) {
  $actions[] = [
    "label" => __("Edit my profile", "quicksearch"),
    "icon" => "dashicons-admin-users",
    "tags" => "edit my profile, my profile",
    "type" => "url",
    "url" => admin_url() . "profile.php",
  ];

  $logout_url =  wp_nonce_url(home_url() . "/wp-login.php", "logout");
  qs_log([
    "url" => $logout_url
  ], false);
  $actions[] = [
    "label" => __("Logout", "quicksearch"),
    "tags" => "logout",
    "icon" => "dashicons-exit",
    "type" => "url",
    "url" =>  $logout_url
  ];
  return $actions;
}


// -------------------------------------------- //
// AJAX ACTIONS
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_ajax_actions", 1, 1);
function qs_default_ajax_actions($actions) {
  $actions[] = [
    "label" => __("save permalinks", "quicksearch"),
    "icon" => "dashicons-controls-play",
    "tags" => "save permalinks, flush permalinks",
    "type" => "ajax",
    "action" => "qs_flush_permalinks",
  ];
  $actions[] = [
    "label" => __("clear cache", "quicksearch"),
    "icon" => "dashicons-controls-play",
    "tags" => "clear cache, flush cache",
    "type" => "ajax",
    "action" => "clear_cache",
  ];
  return $actions;
}


// -------------------------------------------- //
// DEBUG AJAX ACTIONS
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_debug_ajax_actions", 1, 1);
function qs_default_debug_ajax_actions($actions) {
  $actions[] = [
    "label" => "json_success",
    "icon" => "dashicons-controls-play",
    "type" => "ajax",
    "action" => "qs_test_success",
  ];
  $actions[] = [
    "label" => "json_error",
    "icon" => "dashicons-controls-play",
    "type" => "ajax",
    "action" => "qs_test_error",
  ];
  $actions[] = [
    "label" => "json",
    "icon" => "dashicons-controls-play",
    "type" => "ajax",
    "action" => "qs_test_json",
  ];
  $actions[] = [
    "label" => "json_wrong",
    "icon" => "dashicons-controls-play",
    "type" => "ajax",
    "action" => "qs_test_wrong_json",
  ];
  return $actions;
}
