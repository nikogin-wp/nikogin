<?php

namespace Nikogin\Bootstraps;

use Nikogin\Framework\Contracts\Bootable;

class Router implements Bootable
{
    /**
     * Hook into the REST API initialization.
     */
    public static function boot(): void
    {
        add_action('rest_api_init', [self::class, 'run']);
    }

    /**
     * Load core routes.
     */
    public static function run(): void
    {
        foreach (glob(NIKOGIN_DIR . 'app/routes/*.php') as $routeFile) {
            require_once $routeFile;
        }
    }


}
