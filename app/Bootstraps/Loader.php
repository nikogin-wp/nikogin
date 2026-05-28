<?php

namespace Nikogin\Bootstraps;

use Nikogin\Framework\Contracts\Bootable;

class Loader implements Bootable
{
    /**
     * Wire up plugins_loaded hook.
     */
    public static function boot(): void
    {
        add_action(
            'plugins_loaded',
            [ self::class, 'run' ],
            20
        );
    }

    /**
     * What happens on every request after plugins are loaded.
     */
    public static function run(): void
    {
//        ServiceProviderManager::getInstance()->register();
    }
}