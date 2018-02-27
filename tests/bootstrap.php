<?php

$_tests_dir = getenv('WP_TESTS_DIR');
if (! $_tests_dir) {
    $_tests_dir = '/tmp/wordpress-tests-lib';
}

define('PLUGIN_NAME', 'gc-page-cache.php');
define('PLUGIN_FOLDER', 'gc-page-cache');
define('PLUGIN_PATH', PLUGIN_FOLDER.'/'.PLUGIN_NAME);

// Activates this plugin in WordPress so it can be tested.
$GLOBALS['wp_tests_options'] = array(
  'active_plugins' => array( PLUGIN_PATH ),
);

require_once $_tests_dir . '/includes/functions.php';

function _manually_load_plugin()
{
    require dirname(__DIR__) . '/'.PLUGIN_NAME;
}

tests_add_filter('muplugins_loaded', '_manually_load_plugin');

require $_tests_dir . '/includes/bootstrap.php';
