<?php

namespace Nikogin\Bootstraps;


use Nikogin\Framework\Contracts\Bootable;

class Uninstaller implements Bootable
{
    /**
     * Wire up WP uninstall hook.
     */
    public static function boot(): void
    {
        register_uninstall_hook(
            NIKOGIN_FILE,
            [ self::class, 'run' ]
        );
    }

    /**
     * What happens when plugin is uninstalled.
     */
    public static function run(): void
    {
        // Clean up database entries, options, transients, etc.
    }
}