<?php

namespace Nikogin\Bootstraps;

use Nikogin\Framework\Contracts\Bootable;
use Nikogin\Managers\ListenerManager;
use Nikogin\Managers\ModuleManager;
use Nikogin\Managers\ProviderManager;

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
        (new ProviderManager())->register();
        (new ModuleManager())->register();
        (new ListenerManager())->register();
    }
}