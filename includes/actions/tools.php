<?php
// -------------------------------------------- //
// TOOL PAGES
// -------------------------------------------- //
add_filter("qs_actions", "qs_default_tool_pages", 1, 1);
function qs_default_tool_pages($actions) {
  $default_actions = [
    [
      "label" => __("Tools", "quicksearch"),
      "icon" => "dashicons-admin-tools",
      "tags" => ["tools"],
      "type" => "url",
      "url" => admin_url() . "tools.php",
    ],
    [
      "label" => __("Import tools", "quicksearch"),
      "icon" => "dashicons-admin-tools",
      "tags" => ["import tools", "tools import"],
      "type" => "url",
      "url" => admin_url() . "import.php",
    ],
    [
      "label" => __("Export tools", "quicksearch"),
      "icon" => "dashicons-admin-tools",
      "tags" => ["export tools", "tools export"],
      "type" => "url",
      "url" => admin_url() . "export.php",
    ],
    [
      "label" => __("Site health tool", "quicksearch"),
      "icon" => "dashicons-admin-tools",
      "tags" => ["site health tool"],
      "type" => "url",
      "url" => admin_url() . "site-health.php",
    ],
    [
      "label" => __("Export personal data tool", "quicksearch"),
      "icon" => "dashicons-admin-tools",
      "tags" => ["export personal data tool"],
      "type" => "url",
      "url" => admin_url() . "export-personal-data.php",
    ],
    [
      "label" => __("Erase personal data tool", "quicksearch"),
      "icon" => "dashicons-admin-tools",
      "tags" => ["erase personal data tool"],
      "type" => "url",
      "url" => admin_url() . "erase-personal-data.php",
    ]
  ];

  return array_merge($actions, $default_actions);
};
