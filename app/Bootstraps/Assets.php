<?php

namespace Nikogin\Bootstraps;

use Nikogin\Framework\Contracts\Bootable;
use Nikogin\Framework\Support\Assets as FrameworkAssets;

class Assets implements Bootable
{
    public static function boot(): void
    {
        add_action('wp_enqueue_scripts',    [self::class, 'enqueue']);
        add_action('admin_enqueue_scripts', [self::class, 'enqueue']);
    }

    public static function enqueue(): void
    {
        FrameworkAssets::enqueue('nikogin-css', 'resources/scss/app.scss');
        FrameworkAssets::enqueue('nikogin-js',  'resources/ts/app.ts');
    }
}
