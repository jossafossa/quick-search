<?php
add_filter("qs_actions", "qs_default_dashboard_links", 1, 1);
function qs_default_dashboard_links($actions) {



  return $actions;
};
