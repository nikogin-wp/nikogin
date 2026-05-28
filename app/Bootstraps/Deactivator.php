<?php

namespace Nikogin\Bootstraps;


use Nikogin\Framework\Contracts\Bootable;

class Deactivator implements Bootable
{
    /**
     * Wire up WP deactivation hook.
     */
    public static function boot(): void
    {
        register_deactivation_hook(
            NIKOGIN_FILE,
            [ self::class, 'run' ]
        );
    }

    /**
     * What happens on plugin deactivation.
     */
    public static function run(): void
    {
        flush_rewrite_rules();
    }
}