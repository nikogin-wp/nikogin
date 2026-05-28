<?php

defined('ABSPATH') || exit;

if (!defined('NIKOGIN_FILE'))
    define('NIKOGIN_FILE', NIKOGIN_PLUGIN_FILE);

if (!defined('NIKOGIN_DIR'))
    define('NIKOGIN_DIR', plugin_dir_path(NIKOGIN_PLUGIN_FILE));

if (!defined('NIKOGIN_URL'))
    define('NIKOGIN_URL', plugin_dir_url(NIKOGIN_PLUGIN_FILE));

if (!defined('NIKOGIN_VERSION'))
    define('NIKOGIN_VERSION', '1.0.0');

if (!defined('NIKOGIN_SLUG'))
    define('NIKOGIN_SLUG', 'nikogin');

if (!defined('NIKOGIN_CONFIG_DIR'))
    define('NIKOGIN_CONFIG_DIR', NIKOGIN_DIR . 'config/');

if (!defined('NIKOGIN_NAMESPACE'))
    define('NIKOGIN_NAMESPACE', 'ng/v1');

