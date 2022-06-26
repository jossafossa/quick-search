<?php
// -------------------------------------------- //
// TOOL PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_tool_pages", 1, 1);
function qs_default_tool_pages($actions) {
  $default_actions["tools"] = [
    "label" => __("Tools", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("tools"),
    "type" => "url",
    "url" => admin_url() . "tools.php",
  ];
  $default_actions["tools_import"] = [
    "label" => __("Import tools", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("import", "tools"),
    "type" => "url",
    "url" => admin_url() . "import.php",
  ];
  $default_actions["tools_export"] = [
    "label" => __("Export tools", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("export", "tools"),
    "type" => "url",
    "url" => admin_url() . "export.php",
  ];
  $default_actions["tools_site_health"] = [
    "label" => __("Site health tool", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("tools"),
    "type" => "url",
    "url" => admin_url() . "site-health.php",
  ];
  $default_actions["tools_export_personal_data"] = [
    "label" => __("Export personal data tool", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("export", "tools"),
    "type" => "url",
    "url" => admin_url() . "export-personal-data.php",
  ];
  $default_actions["tools_erase_personal_data"] = [
    "label" => __("Erase personal data tool", "quicksearch"),
    "icon" => "dashicons-admin-tools",
    "tags" => qs_tags("remove", "tools"),
    "type" => "url",
    "url" => admin_url() . "erase-personal-data.php",
  ];

  return array_merge($actions, $default_actions);
};
