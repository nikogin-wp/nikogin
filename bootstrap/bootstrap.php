<?php

defined('ABSPATH') || exit;

require_once __DIR__ . '/constants.php';

use Nikogin\Bootstrap;
use Nikogin\Framework\Support\Config;

foreach (glob(NIKOGIN_CONFIG_DIR . '*.php') as $configFile) {
    Config::set(require $configFile);
}

Bootstrap::init();