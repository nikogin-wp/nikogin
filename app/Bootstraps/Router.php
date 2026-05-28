<?php

namespace Nikogin\Bootstraps;

use Nikogin\Framework\Contracts\Bootable;
use Nikogin\Framework\Support\View;

class Router implements Bootable
{
    public static function boot(): void
    {
        add_action('rest_api_init', [self::class, 'run']);
    }

    public static function run(): void
    {
        View::loadDir(NIKOGIN_DIR . 'routes');
    }
}
