<?php

defined('ABSPATH') || exit;

require_once __DIR__ . '/constants.php';

use Nikogin\Bootstrap;
use Nikogin\Framework\Support\Config;

Config::set(require NIKOGIN_CONFIG_DIR . 'config.php');

Bootstrap::init();