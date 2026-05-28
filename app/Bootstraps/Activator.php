<?php

namespace Nikogin\Bootstraps;

use Nikogin\Framework\Contracts\Bootable;

class Activator implements Bootable
{
    /**
     * Wire up WP activation hook.
     */
    public static function boot(): void
    {
        register_activation_hook(
            NIKOGIN_FILE,
            [ self::class, 'run' ]
        );
    }

    /**
     * What happens on plugin activation.
     */
    public static function run(): void
    {
        // Rebuild rewrite rules for CTCs, endpoints, etc.
        flush_rewrite_rules();
    }
}